<?php

namespace App\Model;

class Api
{
    private $stream;
    private $socket = $_ENV->api->socket;
    private $url    = $_ENV->api->ulr;
    private $header;
    private $body;
    private $request;
    
    public function setURL( $url )
    {
        $this->url = $url;
    }
    public function setHeader( $token = null )
    {
        $this->header = array(
                                "Content-Type: application/json",
                                "cache-control: no-cache",
                                "token: $token"
                            );
    }
    public function setBody( $body )
    {
        $this->body = json_encode($body);
    }
    public function setRequest( $request )
    {
        $this->request = $request;
    }
    public function setStream( $stream )
    {
        $this->request = $stream;
    }
    public function setSocket( $socket )
    {
        $this->socket = $socket;
    }
    public function getSocket()
    {
        return $this->socket;
    }
    public function getStream()
    {
        return $this->stream;
    }
    public function getURL()
    {
        return $this->url;
    }
    public function getHeader()
    {
        return $this->header;
    }
    public function getBody()
    {
        return $this->body;
    }
    public function getRequest()
    {
        return $this->request;
    }
}
