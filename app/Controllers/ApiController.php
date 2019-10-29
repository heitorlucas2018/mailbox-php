<?php

namespace App\Controllers;

use App\Model\Api;
use Exception;

class ApiController extends Api
{
    public function __construct( $data = [], $toconnect = true )
    {
        $this->setSocket($ENV->api->socket);
        $this->setURL($ENV->api->ulr);
        $this->setToken($ENV->api->token);
        $this->setbody($data->body);
        return $toconnect ? $this->Conection() : null;
    }
    
    public function __destruct()
    {
        // curl_close($this->getStream());
    }

    public function Conection()
    {
        try {
            $stream = curl_init();
            $this->setStream( $stream );
            curl_setopt_array($stream,
                            array(
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
                            ));
            $response = curl_exec( $this->getStream() );
            return $response ?: ["Response" => "No answer"];
        } catch ( \Throwable $th ) {
            throw $th->getMessage();
        }
    }
}