<?php

namespace AppBundle\Builder;

interface BuilderInterface
{
    public static function buildRequestCountry(string $countryWord): string;

    public static function buildRequestCode(string $code): string;
}
