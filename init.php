<?php

namespace ROOT\init;

use App\Controllers\MailboxController;
use App\Controllers\ApiController;



try {
   $app = new MailboxController();
    //var_dump($app->getMailbox_list());
    $api = new ApiController( $app->getMailbox_list() );
    $api->Conection();
   
} catch (\Throwable $th) {
    print($th->getMessage());
}
