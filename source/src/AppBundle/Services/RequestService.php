<?php

namespace AppBundle\Services;
use Symfony\Component\HttpFoundation\Request;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Client;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class RequestService
{
    /**
     * Client.
     *
     * @var ClientInterface
     */
    private $Client;

    /**
     * Const.
     *
     * @var URI
     */
    const URI = 'https://restcountries.eu/rest/v2/';

    /**
     * CountryAPIs constructor.
     *
     */
    public function __construct()
    {
        $this->Client = new \GuzzleHttp\Client();
    }

    /**
     * Get Country information by country name.
     *
     * @param string $path, string $param
     * @return object
     * @throws BadRequestHttpException
     */
    public function get(string $path, string $param): object
    {  
        try {
          $response = $this->Client->request('GET', self::URI.$path.'/'.$param.'?fullText=true');
        } catch (\GuzzleHttp\Exception\ClientException $e) {
          throw new BadRequestHttpException($path." $param country not found !" . $e->getResponse()->getStatusCode());
        }
        return $response;
    }
    
}
