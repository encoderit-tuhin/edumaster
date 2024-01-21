<?php

namespace App\Helpers\sms;

// use Exception;
use App\Helpers\sms\BulkSmsGateway;
use Illuminate\Support\Facades\Log;
use App\Helpers\sms\BdBulkSmsGateway;
use App\Helpers\sms\OnnorokomSmsGateway;

class SmsGateway
{
    public string $url = '';
    public string $number;
    public string $message;
    public string $messageType;
    public string $masking;
    public string $activeGateway;
    protected string $username;
    protected string $password;

    public function __construct(string $number, string $message)
    {
        $this->setSmsGateway()
            ->setSmsCredentials();

        $this->number = $number;
        $this->message = $message;
    }

    private function setSmsCredentials(): self
    {
        $this->masking = 'masking';
        $this->messageType = 'TEXT';
        $this->username = get_option('sender_id');
        $this->password = get_option('api_key');

        return $this;
    }

    public function setSmsGateway(): self
    {
        // dd( get_option('default_sms_gateway'));
        $this->activeGateway = get_option('default_sms_gateway');

        return $this;
    }

    /**
     * @throws Exception
     */
    public function send(): bool
    {
        if (SmsHelper::isTestSms()) {
            Log::debug('SMS does not sent as SMS test environment enabled.');
            session()->flash('error', _lang('You are in Test Mode'));


            return true;
        }
        return $this->sendSmsViaGateway($this->activeGateway);
    }

    /**
     * @throws Exception
     */
    public function sendSmsViaGateway($gateway): bool
    {
        // dd($gateway);
        switch ($gateway) {
            case 'bulkSMSBD':
                $smsGateway = new BulkSmsGateway($this->number, $this->message);
                return $smsGateway->setUrl()->send();

            case 'onnorokom':
                $smsGateway = new OnnorokomSmsGateway($this->number, $this->message);
                return $smsGateway->setUrl()->send();

            case 'bdbulksms':
                $smsGateway = new BdBulkSmsGateway($this->number, $this->message);
                return $smsGateway->setUrl()->send();

            default:
                break;
        }

        return false;
    }
}
