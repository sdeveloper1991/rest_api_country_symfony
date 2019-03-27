<?php

namespace AppBundle\Services;

class Country 
{
    /**
     * guzzleClient.
     *
     * @var ClientInterface
     */
    private $request;

    /**
     * Countryconstructor.
     *
     */
    public function __construct()
    {
        $this->request = new RequestService();
    }

    /**
     * Get Country information by country name.
     *
     * @param string $countryName
     * @return array
     */
    public function getCountryByName(string $countryName): array
    {  
        $response = $this->request->get("name", $countryName);
        $country = json_decode($response->getBody(), 1);

        return $country;
    }
    /**
     * Get List of countries that speaks the same 
     * language with the given country code.
     *
     * @param string $languageCode
     * @return array
     */
    public function getCountryByCode(string $languageCode): array
    {
        $response = $this->request->get("lang", $languageCode);
        $countries = json_decode($response->getBody(), 1);

        return $countries;
    }

}
