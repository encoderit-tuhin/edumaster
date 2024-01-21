<?php

namespace Modules\Sms\Interfaces;

interface SmsInterface
{
    public function getPhoneNumbers(): array;
    public function setPhoneNumbers(array $phoneNumbers): self;
    public function getMessage(): string;
    public function setMessage(string $message): self;
    public function sendSms(): bool;
}
