<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Builder\Country as CountryBuilder;

class ApiClientFactory
{
    
    public function __construct()
    {
        $this->builder = CountryBuilder::class;
    }
    /**
     * @Route("/country")
     * @param Request $request
     * @return View
     */
    public function postAction()
    {
    
       $countryName = 'France';
    
       $code = $this->builder::buildRequestCountry($countryName);

       echo $countryName; 
       echo 'Code Country is '.$code;

       echo '<br/>';

       echo 'speaks same language with these countries:'.$this->builder::buildRequestCode($code);
       
       
      
       echo $country;
       
       die('dd');

        
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $kernel = $this->get('kernel');
        $application = new Application($kernel);
        $application->setAutoExit(false);

        $input = new ArrayInput(array(
            'command' => 'index.php',
            '--country1' => "Hello",
            '--country2' => "World"
        ));

        $output = new BufferedOutput();

        $application->run($input, $output);


        // return the output
        $content = $output->fetch();

        // Send the output of the console command as response
        return new Response($content);
    }

}
