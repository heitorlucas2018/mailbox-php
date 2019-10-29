<?php

    $file = fopen(__DIR__.'\\teste.log','w+');
    fwrite($file,getallheaders());
    fwrite($file,file_get_contents('php://input'));
    fclose( $file );

    echo 'hello word';