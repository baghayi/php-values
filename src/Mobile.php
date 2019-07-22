<?php

declare(strict_types=1);

namespace Baghayi\Value;

use Baghayi\Value\Exception\InvalidMobilePhoneNumber;

class Mobile
{
    const MOBILE_REGEX = '/^(\+98|0098|0)?(9[0-9]{9})$/';
    private const MOBILE_STORAGE_FORMAT = "+989%s";

    private $mobile;

    public function __construct(string $mobile)
    {
        if (!$this->isMobileValid($mobile)) {
            throw new InvalidMobilePhoneNumber();
        }

        $this->mobile = $this->convertToFamiliarFormat($mobile);
    }

    private function isMobileValid($mobile): bool
    {
        return (bool) preg_match(self::MOBILE_REGEX, $mobile);
    }

    private function convertToFamiliarFormat(string $mobile): string
    {
        return sprintf(self::MOBILE_STORAGE_FORMAT, substr($mobile, -9));
    }

    public function __toString()
    {
        return $this->mobile;
    }
}
