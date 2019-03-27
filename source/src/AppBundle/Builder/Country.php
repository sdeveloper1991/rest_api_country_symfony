<?php

namespace AppBundle\Builder;
use AppBundle\Services\Country as ApiCountry;

class Country implements BuilderInterface
{
    /**
     * This function builds the request Country
     *
     * @param string $countryWord
     * @return string
     */
    public static function buildRequestCountry(string $countryWord): string
    {
        $Api = new ApiCountry();
        $country = $Api->getCountryByName($countryWord);

        return $country[0]['alpha2Code'];
    }

    /**
     * This function builds the request code
     *
     * @param string $code
     * @return string
     */
    public static function buildRequestCode(string $code): string
    {
        $Api = new ApiCountry();
        $country = $Api->getCountryByCode($code);
        $country = implode(', ', array_column($country, 'name'));
       
        return $country;
    }
}
