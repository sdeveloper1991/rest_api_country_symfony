<?php

namespace Tests\AppBundle\Services;

use AppBundle\Services\Country as serviceApi;
use FOS\RestBundle\Tests\Functional\WebTestCase;

class ServiceTest extends WebTestCase
{
    /**
     * @var serviceApi
     */
    private $serviceApi;


    public function setUp()
    {
        $this->serviceApi = new serviceApi();
    }

    public function testgetCountryByNameValueReturnsArray()
    {
        $this->assertArrayHasKey('name',$this->serviceApi->getCountryByName('France')[0]);
    }

    public function testgetCountryByCodeValueReturnsArray()
    {
        $this->assertArrayHasKey('name',$this->serviceApi->getCountryByCode('EN')[0]);
    }
    
}
