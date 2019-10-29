<?php

    $file = fopen(__DIR__.'\\teste.log','w+');
    fwrite($file,999);
    fclose( $file );