<?php

namespace App\Controllers;

use App\Model\Mailbox;

class MailboxController extends Mailbox
{
    public function __construct( $data = null)
    {
        try 
        {
            parent::__construct($data);
        } catch (\Exception $e) {
            printf("ERROR: ".$e->getMessage() );
        }

    }
}
