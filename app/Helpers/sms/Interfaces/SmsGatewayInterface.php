<?php

namespace App\Helpers\sms\Interfaces;

use Exception;

interface SmsGatewayInterface
{
    /**
     * Set HTTP Client URL.
     *
     * Set URL for any gateway to hit HTTP client
     *
     * @return static set the url
     */
    public function setUrl(): static;

    /**
     * Send SMS through any gateway.
     *
     * It will send sms to any number with a message from this gateway
     *
     * @return boolean
     *
     * @throws Exception True if valid, else set an exception with the message
     */
    public function send(): bool;
}
