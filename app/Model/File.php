<?php
 namespace App\Model;

 class File
 {
     private const MODE = 'w+';
     private $path;
     private $file;

     /**
      * Undocumented function
      *
      * @param [object|array] $data
      * @param [string] $option
      *
      * @example $data ['name'=>'filename','ext'=>'extencion File','handle'=>'handle file', 'path'=>'path']
      *
      * @return void
      */
     public function __construct( $data = null, $option  = self::MODE )
     {
        if( $data == null ) return;
         $data = (object) $data;
         $filename = $data->name . '.' . $data->ext;
         $filepath = $data->path . DS . $filename;
         $this->setpath( $data->path );
         $this->setFile( $filepath );
         $this->createFile( $data->handle, $option );
     }

     /**
      * Undocumented function
      *
      * @param [object|array] $data
      * @param [string] $option
      *
      * @example $data ['name'=>'filename','ext'=>'extencion File']
      *
      * @return void
      */
     public function createFile($data = null ,$option = self::MODE )
     {
        $stream = fopen( $this->getFile(), $option );
        fwrite( $stream, $data );
        fclose( $stream );
     }

     public function setPath( $path )
     {
       if( ! is_dir( $path ))
       {
           $path = mkdir( $path, '0777', true ) ? $path : Exception('Error of create folder in path.');
       }
       $this->path = str_replace( '/', DS, $path );
     }

     public function setFile( $filename  )
     {
       if( file_exists( $filename ))
         {
           $newname = "$filename.old.".strtolower( pathinfo( $filename, PATHINFO_EXTENSION ) );
           $filename = rename( $filename, $newname ) ? $filename : Exception("Error of rename file { $filename}.");
         }
       $this->file = $filename ;
     }

     public function getFile( )
     {
        return $this->file ;
     }

     public function getPath( )
     {
        $path = $this->path;
        return is_dir( $path ) ? $path : null;
     }

 }