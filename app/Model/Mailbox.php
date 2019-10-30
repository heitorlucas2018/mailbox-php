<?php

namespace App\Model;

use App\Model\Mail;
use Exception;

class Mailbox extends Mail
{
    protected $stream;
    private $mailboxlist = Array( );
    
    public function __construct( $data = null )
    {
        if( $data != null )
        {
          $data = ( object ) $data;
          $this->setHost( $data->host );
          $this->setProtocol( $data->protocol );
          $this->setSocket( $data->socket );
          $this->setUser( $data->user );
          $this->setPassword( $data->password );
        }else{
          $this->setHost( $_ENV->data_mailbox->host );
          $this->setProtocol( $_ENV->data_mailbox->protocol );
          $this->setSocket( $_ENV->data_mailbox->socket );
          $this->setUser( $_ENV->data_mailbox->user );
          $this->setPassword( $_ENV->data_mailbox->password );
        }
        if( $this->mailbox_open( ) )
            $this->mailbox_search( $_ENV->search_filter->data, $_ENV->search_filter->criterion );
    }

    public function __destruct( )
    {
       imap_close( $this->stream );
    }

    public function mailbox_open()
    {
        if( !$stream = imap_open( $this->getProtocolConnection( ),$this->getUser( ),$this->getPassword( ) ) )
                throw new Exception("Unable to open mailbox, please check connection data in config.json file. { ".__CLASS__.DS.__FUNCTION__." }");
        else
           return $this->stream = $stream;
    }

    public function mailbox_search( $datasearch = '',$criterion = null )
    {
        if( ! $this->stream ) return;
        
        if( ! is_array( $datasearch ) )
        {   
            if( $criterion != null )
                $criterion = "$criterion \"$datasearch\" ";

            $array_num = imap_search( $this->stream, "$criterion UNSEEN ", SE_FREE, 'UTF-8' );
            if( ! $array_num ) return printf( 'No data Found!!' );

              foreach ( $array_num as $key => $msg_number )
                $this->setmailbox_list( $msg_number );
        }
        else
        {
            foreach( $datasearch as $k => $value )
                $this->search( $value, $criterion );
        }
    }

    public function getMailbox_list( )
    {
        return ( object ) $this->mailboxlist ?: [null];
    }

    public function setMailbox_list( $msg_number = null )
    {
        if( $msg_number == null ) return false;
            
            imap_gc( $this->stream, IMAP_GC_ELT );
            $from   = imap_header( $this->stream,$msg_number )->from[0]->personal;
            $struct = imap_fetchstructure( $this->stream,$msg_number );
            imap_setflag_full( $this->stream, $msg_number, "\\Seen", ST_UID);

        if( !$struct->parts[1]->ifdparameters )
            $body   = imap_qprint( imap_fetchbody( $this->stream, $msg_number,1 ) );
        else
        {
            $body     = imap_qprint( imap_fetchbody( $this->stream, $msg_number,1.1 ) );
            $handle   = imap_base64( imap_fetchbody( $this->stream, $msg_number,2 ) );
            $filedata = $struct->parts[1]->dparameters[0]->value;
            $this->mailbox_anexo( $from, $filedata, $handle );
        }

        array_push( $this->mailboxlist,['Name'=>$from, 'Data'=> $this->readBody( $body )] );
    }

    public function readBody( $data ){
        $array_param = $_ENV->listparam;
        $array_data  = preg_split( '/[\n|\r|\n\r|\r\n]/', $data );
        $array_rs    = Array( );
        foreach ( $array_data as $key => $value )
         {
                 $var = preg_split( '/[:]/',$value );
             if( in_array( $var[0], $array_param ) )
                 $array_rs[ $var[0] ] = $var[1];
         }
        return $array_rs ?: [null];
    }

    public function mailbox_anexo( $folder = './',$filedata,$handle )
    {
        $path = STORAGE . $folder . DS . Date( 'dmy' );
        $datafile =['name'      => strtolower( pathinfo( $filedata, PATHINFO_FILENAME ) ),
                    'ext'       => strtolower( pathinfo( $filedata, PATHINFO_EXTENSION ) ),
                    'handle'    => $handle,
                    'path'      => $path ];
        $file = new File( $datafile );
    }

}
