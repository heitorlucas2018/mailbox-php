<?php

namespace App\Controllers;

use App\Model\Api;
use Exception;

class ApiController extends Api
{
    public function __construct( $data = [] )
    {
        $this->setSocket($_ENV->api->socket);
        $this->setURL($_ENV->api->url);
        $this->setToken($_ENV->api->token);
        $this->setbody($data);
    }
    
    public function __destruct()
    {
         curl_close($this->getResource());
    }

    public function Conection()
    {
        try {
            $this->setResource(curl_init());
            
            $options  = array(
                CURLOPT_PORT => $this->getSocket(),
                CURLOPT_URL => $this->getURL(),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "UTF-8",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $this->getBody(),
                CURLOPT_HTTPHEADER => $this->getHeader()
            );

            curl_setopt_array($this->getResource(), $options );

            if( ! $response = curl_exec( $this->getResource() )) 
                throw new Exception("Error { ".__CLASS__.DS.__FUNCTION__." } :: ".curl_error($this->getResource()));

        } catch ( \Exception $e ) {
            throw $e->getMessage();
        }
        return $response ?: ["Response" => "No answer"];
    }
}