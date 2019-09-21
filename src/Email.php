<?php

declare(strict_types=1);

namespace Baghayi\Value;

class Email
{
    private $email;

    public function __construct($email)
    {
        $this->validateEmail($email);
        $this->email = $email;
    }

    private function validateEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception\InvalidEmail;
        }
    }

    public function __toString(): string
    {
        return $this->email;
    }
}
