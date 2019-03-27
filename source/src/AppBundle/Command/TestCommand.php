<?php

namespace AppBundle\Command;

use AppBundle\Builder\Country as CountryBuilder;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputOption;


class TestCommand extends Command
{
    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('index.php')
            // the short description shown while running "php bin/console list"
            ->setHelp("This command allows you to print some text in the console")
            // the full command description shown when running the command with
            ->setDescription('Prints some text into the console with given parameters.')
            // Set options
            ->setDefinition(
                new InputDefinition(array(
                    new InputOption('country1', 'a', InputOption::VALUE_REQUIRED,"The first line to be printed",""),
                    new InputOption('country2', 'b', InputOption::VALUE_OPTIONAL,"The second line to be printed",""),
                ))
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
       
        $this->builder = CountryBuilder::class;
        $firstCountry = $input->getOption('country1');
        $secondCountry = $input->getOption('country2');

        $countryNameFirst = $firstCountry;
        $countryCodeFirst = $this->builder::buildRequestCountry($countryNameFirst);

        if(empty($secondCountry)){

            $output->writeln("$firstCountry Code country is : $countryCodeFirst");

            $output->writeln("Speaks same language with these countries:".$this->builder::buildRequestCode($countryCodeFirst));
        }else{

             $countryNameSecond = $secondCountry;
             $countryCodeSecond = $this->builder::buildRequestCountry($countryNameSecond);
             
             if ( $countryCodeFirst == $countryCodeSecond ){
               $output->writeln("$countryNameFirst and $countryNameSecond speak the same language");
             } else{
               $output->writeln("$countryNameFirst and $countryNameSecond do not speak the same language");
             }
            
        }
    
    }
}