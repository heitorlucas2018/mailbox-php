<?php

    if( !function_exists( '__loadConfig' ) )
    {
        function __config( $path = __DIR__.'/config.json')
        {
            if( ! extension_loaded('imap') )
                throw new Exception(" Extension { extension=imap } is not enabled in php.ini.");
            if( ! file_exists( $path ) )
                throw new Exception(" Error - {$path}  not found");
                
            $handle = fopen($path,'r+');
            $data   = fread($handle,999); 
            fclose($handle);
            $_ENV = json_decode($data);
        }
    }
