<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\PaymentService;
use App\PayrollAccountingMapping;
use App\Services\SalaryHeadService;
use Illuminate\Contracts\View\View;
use App\Exceptions\PayrollException;
use App\Services\UserPayrollService;
use Illuminate\Http\RedirectResponse;
use App\Services\PayslipSalaryService;
use Illuminate\Contracts\View\Factory;

class PayrollController extends Controller
{
    public const USER_TYPE = 'Student';

    public function __construct(
        private readonly SalaryHeadService $salaryHeadService,
        private readonly UserPayrollService $userPayrollService,
        private readonly UserService $userService,
        private readonly PaymentService $paymentService,
        private readonly PayslipSalaryService $salaryPaymentService,
    ) {
    }

    public function index(): View|Factory
    {
        list($users, $salaryHeads, $salaryHeadUserPayrolls) = $this->commonData();

        return view('backend.payroll.users-list', compact('users', 'salaryHeads', 'salaryHeadUserPayrolls'));
    }

    public function create(Request $request): RedirectResponse
    {
        $result = $this->salaryHeadService->updatePayrolls($request->all());

        if (!$result['success']) {
            return back()->with('error', _lang($result['message']));
        }

        return back()->with('success', _lang($result['message']));
    }

    public function salaryCreateGet(Request $request): View|Factory
    {
        $year = $request->input('year');
        $month = $request->input('month');

        list($users, $salaryHeads, $salaryHeadUserPayrolls) = $this->commonData();

        if ($request->isMethod('post')) {
            return view('backend.payroll.salary-create', compact('users', 'salaryHeads', 'salaryHeadUserPayrolls', 'year', 'month'));
        } else {
            return view('backend.payroll.salary-create');
        }
    }

    public function salaryCreate(Request $request): RedirectResponse
    {
        $result = $this->userPayrollService->createPayslipSalariesAndHeads($request->all());

        if (!$result['success']) {
            return back()->with('error', _lang($result['message']));
        }

        return back()->with('success', _lang($result['message']));
    }

    public function salaryPaymentProcess(Request $request): View|Factory
    {
        $year = $request->input('year');
        $month = $request->input('month');

        list($users, $salaryHeads, $salaryHeadUserPayrolls) = $this->commonData();

        if ($request->isMethod('post')) {
            return view('backend.payroll.salary-payment', compact('users', 'salaryHeads', 'salaryHeadUserPayrolls', 'year', 'month'));
        } else {
            return view('backend.payroll.salary-payment');
        }
    }

    public function salaryPayment(Request $request): RedirectResponse
    {
        $result = $this->salaryPaymentService->processSalaryPayment($request);

        if (!$result['success']) {
            return back()->with('error', _lang($result['message']));
        }

        return back()->with('success', _lang($result['message']));
    }

    public function advanceSalaryPayment(Request $request): View|Factory|RedirectResponse
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'user_id' => 'required'
            ]);

            list($user, $userPayroll) = $this->getUserAndUserPayroll($request->user_id);

            if ($user && $userPayroll) {
                return view('backend.payroll.advance-salary-payment', compact('user', 'userPayroll'));
            }

            return back()->with('error', _lang('HR Not Found!'));
        } else {
            return view('backend.payroll.advance-salary-payment');
        }
    }

    public function advanceSalaryPay(Request $request): RedirectResponse
    {
        $result = $this->paymentService->processPayment($request->all());

        return back()->with($result);
    }

    public function dueSalaryPayment(Request $request): View|Factory|RedirectResponse
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'user_id' => 'required'
            ]);

            list($user, $userPayroll) = $this->getUserAndUserPayroll($request->user_id);

            if ($user && $userPayroll) {
                return view('backend.payroll.due-salary-payment', compact('user', 'userPayroll'));
            }

            return back()->with('error', _lang('HR Not Found!'));
        } else {
            return view('backend.payroll.due-salary-payment');
        }
    }

    public function dueSalaryPay(Request $request): RedirectResponse
    {
        $result = $this->paymentService->processPayment($request->all());

        return back()->with($result);
    }

    public function returnSalaryPayment(Request $request): View|Factory|RedirectResponse
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'user_id' => 'required'
            ]);

            list($user, $userPayroll) = $this->getUserAndUserPayroll($request->user_id);

            if ($user && $userPayroll) {
                return view('backend.payroll.return-salary-payment', compact('user', 'userPayroll'));
            }

            return back()->with('error', _lang('HR Not Found!'));
        } else {
            return view('backend.payroll.return-salary-payment');
        }
    }

    public function returnSalaryPay(Request $request): RedirectResponse
    {
        $result = $this->paymentService->processPayment($request->all());

        return back()->with($result);
    }

    private function commonData()
    {
        $users = $this->userService->getUsersByExcludedType(self::USER_TYPE);
        $salaryHeadUserPayrolls = $this->salaryHeadService->getSalaryHeadUserPayrollsForUsers($users->pluck('id')->toArray());
        $salaryHeads = $this->salaryHeadService->getSalaryHeads();

        return [$users, $salaryHeads, $salaryHeadUserPayrolls];
    }

    private function getUserAndUserPayroll(int $userId)
    {
        $user = $this->userService->findUserById(intval($userId));
        $userPayroll = $this->userPayrollService->findByUserId(intval($userId));

        return [$user, $userPayroll];
    }

    public function mapping()
    {
        $data = PayrollAccountingMapping::get();

        return view('backend.payroll.payroll-mapping', compact('data'));
    }

    public function mappingStore(Request $request)
    {
        $data = PayrollAccountingMapping::first();

        if ($request->ledger_id != null && $request->fund_id != null) {
            if (isset($data)) {
                $mapping = PayrollAccountingMapping::where('id', $data->id)->update([
                    'ledger_id' => $request->ledger_id,
                    'fund_id' => $request->fund_id
                ]);
            } else {
                $mapping = PayrollAccountingMapping::create([
                    'ledger_id' => $request->ledger_id,
                    'fund_id' => $request->fund_id
                ]);
            }
        }

        if (isset($mapping)) {
            return back()->with('success', _lang('Payroll Configured'));
        } else {
            return back()->with('error', _lang('Something Went Wrong'));
        }
    }
}
