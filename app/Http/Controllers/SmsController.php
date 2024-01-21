<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use App\SmsLog;
use App\SmsBalance;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use App\Services\PhoneBookService;
use App\Services\SmsTemplateService;
use Illuminate\Support\Facades\Auth;
use App\Services\StudentSessionService;

class SmsController extends Controller
{

	public function __construct(
		private readonly SmsTemplateService $smsTemplateService,
		private readonly StudentSessionService $studentSessionService,
		private readonly PhoneBookService $phoneBookService
	) {
	}

	public function index()
	{
		$messages = SmsLog::join("users", "sms_logs.sender_id", "=", "users.id")
			->select('sms_logs.*', 'users.name as sender')
			->orderBy("sms_logs.id", "DESC")->paginate(15);
		return view('backend.sms.list', compact('messages'));
	}
	public function create()
	{

		// return $this->smsTemplateService->getSmsTemplates();
		return view('backend.sms.create', [
			'smsTemplates' => $this->smsTemplateService->getSmsTemplates()
		]);
	}

	public function logs()
	{
		$messages = SmsLog::join("users", "sms_logs.sender_id", "=", "users.id")
			->select('sms_logs.*', 'users.name as sender')
			->orderBy("sms_logs.id", "DESC")->paginate(15);
		return view('backend.sms.logs', compact('messages'));
	}

	public function send(Request $request)
	{
		@ini_set('max_execution_time', 0);
		@set_time_limit(0);
		$this->validate($request, [
			'body' => 'required|max:318',
			'user_type' => 'required',
			'users' => 'required_without:individual_number',
			'individual_number' => 'required_without:users',

		]);
		$smsType = get_option('sms_type');

		$body = strip_tags($request->input("body"));
		$length = $this->calculateSmsLength($body);

		try {
			if ($request->input('users') != "") {
				foreach ($request->input('users') as $user_id => $mobile_number) {
					$response = (new SmsLog())->setPhoneNumbers([$mobile_number])->setMessage($body)->sendSms();
					// dd($response);
					if ($response) {
						$log = new SmsLog();
						$log->receiver = $mobile_number;
						$log->message = $body;
						$log->user_id = $user_id ?? 0;
						$log->user_type = $request->user_type;
						$log->sender_id = Auth::user()->id;
						$log->save();
						$this->updateSmsBalance($smsType, $length);
					}
				}
			} elseif ($request->input('individual_number') != "") {
				$response = (new SmsLog())->setPhoneNumbers([$request->individual_number])->setMessage($body)->sendSms();
				if ($response) {
					$log = new SmsLog();
					$log->receiver = $request->individual_number;
					$log->message = $body;
					$log->user_id = 0;
					$log->user_type = 'Individual';
					$log->sender_id = Auth::user()->id;
					$log->save();
					$this->updateSmsBalance('nonmasking', $length);
				}
			} else {
				return redirect('sms/compose')->with('error', _lang('Invalid mobile number Or Illegal Operation !'))->withInput();
			}
			return redirect()->back()->with('success', _lang('Message Send Successfully.'));
		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
	}

	function phoneBook()
	{
		$users = $this->phoneBookService->getPhoneBooks();
		return view('backend.sms.others-filter-data', compact('users'));
	}

	public function getStudentByClassId(Request $request)
	{
		return $this->studentSessionService->getStudentByClassId(1);
	}
	public function summaryReport()
	{
		$smsSummary = SmsLog::selectRaw('count(*) as total, user_type')
			->groupBy('user_type')
			->get();
		// dd('sms re');
		return view('backend.sms.report.summary', compact('smsSummary'));
	}
	public function sendReport(Request $request)
	{
		$userTypes = User::select('user_type')->groupBy('user_type')->get()->pluck('user_type')->toArray();
		$userTypes[] = 'Individual';
		$smsReports = SmsLog::latest();

		if ($request->filled('from') && $request->filled('to') && $request->filled('user_type')) {
			$smsReports->whereBetween('created_at', [date($request->from), date($request->to)])
				->where('user_type', $request->user_type);
		}

		$smsReports = $smsReports->with('user')->get();

		return view('backend.sms.report.send', compact('smsReports', 'userTypes'));
	}

	function calculateSmsLength($message)
	{
		// Count the number of characters in the message
		$messageLength = strlen($message);

		// Check if the message length is within the SMS limit
		if ($messageLength <= 160) {
			// The message fits in a single SMS
			return 1;
		} else {
			// The message needs to be split into multiple SMS messages
			$numberOfSms = ceil($messageLength / 160);
			return $numberOfSms;
		}
	}
	public function updateSmsBalance($type, $amount)
	{
		$balance = SmsBalance::first();
		if ($balance) {
			if ($type == 'masking') {
				$newBalance = $balance->masking_balance - $amount;
				$balance->masking_balance = $newBalance;
			} elseif ($type == 'nonmasking') {
				$newBalance = $balance->non_masking_balance - $amount;
				$balance->non_masking_balance = $newBalance;
			} else {
				return back()->with('error', "Something went wrong...");
			}

			$balance->save();
		}
	}

	function compose2()
	{
		return view(
			'backend.sms.sms2',
			[
				'smsTemplates' => $this->smsTemplateService->getSmsTemplates()
			]
		);
	}
}
