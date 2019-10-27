<?php

    function __autoload( $classname )
    {
        $classname  = ROOT . DS . str_replace('\\',DS,$classname).'.php';
        if( ! file_exists($classname) ){
            throw new Exception("File path {$classname} not found");
        }
        require_once( $classname );
    }
