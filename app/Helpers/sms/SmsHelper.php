<?php

namespace App\Helpers\sms;

class SmsHelper
{
    public static function isTestSms(): bool
    {
        return get_option('sms_test_mode') == 'true' ?true :false;
    }

    public static function getTestSmsOTP(): string
    {
        return self::isTestSms() ? '123456' : rand(100000, 999999);
    }
}
