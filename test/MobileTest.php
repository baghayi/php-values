<?php

declare(strict_types=1);

namespace Test;

use Baghayi\Value\Exception\InvalidMobilePhoneNumber;
use PHPUnit\Framework\TestCase;
use Baghayi\Value\Mobile;

class MobileTest extends TestCase
{

    /**
     * @test
     */
    public function invalid_mobile_throws()
    {
        $this->expectException(InvalidMobilePhoneNumber::Class);
        $invalidMobile = "147830000";
        new Mobile($invalidMobile);
    }

    public function validMobilePhoneNumbers(): array
    {
        return [
            ["+989140000000"],
            ["00989140000000"],
            ["9140000000"],
            ["09140000000"],
        ];
    }

    /**
     * @test
     * @dataProvider validMobilePhoneNumbers
     */
    public function valid_mobile_should_not_throw_anything(string $validMobile)
    {
        $this->assertInstanceOf(Mobile::class, new Mobile($validMobile));
    }

    public function validMobilePhoneNumbersAndTheirCorrespondingConvertedForamet(): array
    {
        return [
            ["+989140000000", "+989140000000"],
            ["00989140000000", "+989140000000"],
            ["9140000000", "+989140000000"],
            ["09140000000", "+989140000000"],
        ];
    }

    /**
     * @test
     * @dataProvider validMobilePhoneNumbersAndTheirCorrespondingConvertedForamet
     */
    public function mobile_phone_numbers_are_all_converted_to_one_format(string $validMobile, string $convertedFormat)
    {
        $this->assertSame((string) new Mobile($validMobile), $convertedFormat);
    }
}
