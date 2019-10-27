<?php

namespace App\Model;

class Mail{

    private $host    ;
    private $protocol;
    private $socket  ;
    private $user    ;
    private $password;

    public function setHost( $host )
    {
        $this->host = $host;
    }
    public function setProtocol( $protocol )
    {
        $this->protocol = $protocol;
    }
    public function setSocket( $socket )
    {
        $this->socket = $socket;
    }
    public function setUser( $user )
    {
        $this->user = $user;
    }
    public function setPassword( $password )
    {
        $this->password = $password;
    }
    public function getHost()
    {
        return $this->host;
    }
    public function getProtocol()
    {
        return $this->protocol;
    }
    public function getSocket()
    {
        return $this->socket;
    }
    public function getUser()
    {
        return $this->user;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getProtocolConnection()
    {
        $p = $this->getProtocol();
        $h = $this->getHost();
        $s = $this->getSocket();
        return '{'. $p .'.'. $h .':'. $s .'/novalidate-cert}INBOX';
    }

}
