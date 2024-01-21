<?php

namespace App\Helpers\sms;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Helpers\sms\Interfaces\SmsGatewayInterface;

class BdBulkSmsGateway extends SmsGateway implements SmsGatewayInterface
{
    public function setUrl(): static
    {
        if (request()->isSecure()) {
            $this->url = 'https://api.greenweb.com.bd/api.php';
        } else {
            $this->url = 'http://api.greenweb.com.bd/api.php';
        }

        return $this;
    }

    public function send(): bool
    {
        try {
            $requestBody = [
                'token' => env('SMS_API_KEY'),
                'to' => $this->number,
                'message' => $this->message
            ];

            Http::asForm()->post($this->url, $requestBody);

            return true;
        } catch (Exception $e) {
            Log::error('SMS Sending failed Via gateway. Error: ' . $e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
}
