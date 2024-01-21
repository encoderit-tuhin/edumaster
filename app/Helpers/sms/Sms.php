<?php

namespace Modules\Sms\Entities;

use Exception;
use Illuminate\Support\Facades\Log;
use Modules\Sms\Interfaces\SmsInterface;

class Sms implements SmsInterface
{
    private array $phoneNumbers = [];
    private string $message = '';

    /**
     * @throws Exception
     */
    public function sendSms(): bool
    {
        try {
            $smsSent = (new SmsGateway(
                implode(',', $this->getPhoneNumbers()),
                $this->getMessage())
            )->send();

            if ($smsSent) {
                Log::debug('SMS has sent to ' . implode(',', $this->getPhoneNumbers()) . '. Message: ' . $this->getMessage());
            }

            return $smsSent;
        } catch (Exception $exception) {
            Log::error('SMS not send. Error: ' . $exception->getMessage());
            return false;
        }
    }

    public function getPhoneNumbers(): array
    {
        return $this->phoneNumbers;
    }

    public function setPhoneNumbers(array $phoneNumbers): self
    {
        $this->phoneNumbers = $phoneNumbers;

        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
