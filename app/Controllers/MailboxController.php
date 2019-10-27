<?php

namespace App\Controllers;

use App\Model\Mailbox;

class MailboxController extends Mailbox
{
    public function __construct( $data = null)
    {
        parent::__construct($data);
    }
}
