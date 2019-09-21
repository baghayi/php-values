<?php

declare(strict_types=1);

namespace Test;

use Baghayi\Value\Email;
use Baghayi\Value\Exception\InvalidEmail;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{

    /**
    * @test
    */
    public function throws_on_invalid_email_input()
    {
        $this->expectException(InvalidEmail::Class);
        $invalidEmail = "hosseingmail.com";
        new Email($invalidEmail);
    }

    /**
     * @test
     */
    public function read_back_provided_email()
    {
        $validEmail = "hossein@gmail.com";
        $object = new Email($validEmail);
        $this->assertEquals($validEmail, (string) $object);
    }
}
