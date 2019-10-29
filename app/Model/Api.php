<?php

namespace App\Model;

class Api
{
    private $stream;
    private $socket;
    private $url;
    private $token;
    private $header;
    private $body;
    private $request;
    
    public function setURL( $url )
    {
        $this->url = $url;
    }
    public function setHeader( $header = null )
    {
        $this->header = $header;
    }
    public function setBody( $body )
    {
        if( is_array( $body ))
            $this->body = json_encode($body);
        else
            $this->body = $body;
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
    public function setToken( $token )
    {
        $this->token = $token;
    }
    public function getTokent()
    {
        return $this->token;
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
        return $this->header ?: array(
                                        "Content-Type: application/json",
                                        "cache-control: no-cache",
                                        "token: ".$this->token.""
                                    );
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
