<?php

namespace App\Helpers\sms;

use Exception;
use App\Helpers\sms\SmsGateway;
use Illuminate\Support\Facades\Http;
use App\Helpers\sms\Interfaces\SmsGatewayInterface;
use GuzzleHttp\Client;


class BulkSmsGateway extends SmsGateway implements SmsGatewayInterface
{
    public function setUrl(): static
    {
        $this->url = 'http://bulksmsbd.net/api/smsapi';

        return $this;
    }

    public function send(): bool
    {
        //         try {
//             $requestBody = [
//                 'senderid' => $this->username,
//                 'api_key' => $this->password,
//                 'number' => $this->number,
//                 'message' => $this->message,
//                 "type"=> "text"
//             ];
//            $res= Http::asForm()->post($this->url, $requestBody);
//         //    http://bulksmsbd.net/api/smsapi?api_key=n5nb14dd57pJEbn6LajJ&type=text&number=Receiver&senderid=8809617613411&message=TestSMS 
// // dd($res);
//             return true;
//         } catch (Exception $e) {
//             throw new Exception($e->getMessage());
//         }

        // Initialize Guzzle client
        $client = new Client();
        $apiKey = $this->password;
        $number = $this->number;
        $senderId = $this->username;
        $message = $this->message;
        try {
            // Make a GET request
            $response = $client->request('GET', "http://bulksmsbd.net/api/smsapi?api_key=$apiKey&type=text&number=$number&senderid=$senderId&message=$message");

            $body = $response->getBody()->getContents();

            $responseData = json_decode($body, true);
            if ($responseData['response_code'] == 202) {
                session()->flash('success', _lang($responseData['error_message']));

                return true;
            } else {
                // dd($responseData['error_message']);
                session()->flash('error', _lang($responseData['error_message']));

                return false;
            }

        } catch (\GuzzleHttp\Exception\RequestException $e) {

            return "Error: " . $e->getMessage();
        }
    }
}
