<?php

namespace TDD\test;

require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."vendor".DIRECTORY_SEPARATOR."autoload.php";

use PHPUnit\Framework\TesteCase;
use  App\Controllers\TDD\MailboxController;

class Malboxtest
{
    private $mailBox = new MailboxController();
    
    public function testConecBoxMail(){
        $data = null;
        $this->$this->assertEquals(
                true,
                $this->mailBox->mailbox_open( $data ),
                "Resulte true"
        );
    }
}


