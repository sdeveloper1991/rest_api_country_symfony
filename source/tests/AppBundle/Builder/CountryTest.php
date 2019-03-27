<?php

namespace Tests\AppBundle\Builder;

use AppBundle\Builder\Country as CountryBuilder;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @group functional
 */
class CountryTest extends WebTestCase
{
    /**
     * @var builder
     */
    private $builder;

    /**
     * Set-up CountryTest
    */
    public function setUp()
    {
         $this->builder = CountryBuilder::class;
    }
    
    /**
     * This function test if buildRequestCountry return code country
    */
    public function testBuildRequestCountry()
    {
        $countryName = 'France';
        $code = $this->builder::buildRequestCountry($countryName);
        $this->assertEquals('FR', $code);
    }

    /**
     * This function test if buildRequestCode return countries
    */
    public function testBuildRequestCode()
    {
        $code = 'FR';
        $result = $this->builder::buildRequestCode($code);
        $this->assertContains("Belgium, Benin", $result);
    }

    /**
     * This function test if buildRequestCountry return and expection
       when country not found

     * @expectedException Symfony\Component\HttpKernel\Exception\BadRequestHttpException
     * @expectedExceptionMessage name France1 country not found !404
     */
    public function testBuildRequestCountryFailed()
    {
        $countryName = 'France1';
        $code = $this->builder::buildRequestCountry($countryName);

    }

    /**
     * This function test if testBuildRequestCodeFailed return and expection
       when lang not found
       
     * @expectedException Symfony\Component\HttpKernel\Exception\BadRequestHttpException
     * @expectedExceptionMessage lang Fr1 country not found !404
     */
    public function testBuildRequestCodeFailed()
    {
        $countryName = 'Fr1';
        $code = $this->builder::buildRequestCode($countryName);
    }

    
}
