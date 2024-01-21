<?php

namespace App\Helpers\sms;

use Exception;
use App\Helpers\sms\Interfaces\SmsGatewayInterface;
use SoapClient;
use Symfony\Component\HttpFoundation\Response;

class OnnorokomSmsGateway extends SmsGateway implements SmsGatewayInterface
{
    public function setUrl(): static
    {
        $this->url = 'https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl';

        return $this;
    }

    public function send(): bool
    {
        try {
            $soapClient = new SoapClient($this->url);

            $params = [
                'userName' => $this->username,
                'userPassword' => $this->password,
                'mobileNumber' => $this->number,
                'smsText' => $this->message,
                'type' => "TEXT",
                'maskName' => '',
                'campaignName' => '',
            ];

            $soapClient->__call("OneToOne", [$params]);

            return true;
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
