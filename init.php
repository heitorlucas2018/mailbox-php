<?php

namespace ROOT\init;

use App\Controllers\MailboxController;
use App\Controllers\ApiController;

$app = new MailboxController();

var_dump($app->getMailbox_list());
try {
    new ApiController( "teste de envio de daods");
} catch (\Throwable $th) {
    print($th->getMessage());
}
