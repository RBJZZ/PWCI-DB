<?php

namespace Models;

require_once __DIR__ . '/../vendor/autoload.php';

use PaypalServerSdkLib\PaypalServerSdkClientBuilder;
use PaypalServerSdkLib\Authentication\ClientCredentialsAuthCredentialsBuilder;
use PaypalServerSdkLib\Environment;

class PayPalModel
{
    private $client;

    public function __construct()
    {
        
        $clientId = '';
        $clientSecret = '';

        
        $authCredentials = ClientCredentialsAuthCredentialsBuilder::init($clientId, $clientSecret);

        
        $this->client = PaypalServerSdkClientBuilder::init()
            ->clientCredentialsAuthCredentials($authCredentials)
            ->environment(Environment::SANDBOX) 
            ->build();
    }

    public function getClient()
    {
        return $this->client;

    }


    
}

