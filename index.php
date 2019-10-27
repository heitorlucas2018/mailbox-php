<?php

define( 'DS'  , DIRECTORY_SEPARATOR );
define( 'ROOT', dirname( __FILE__ ) );
define( 'APP' , ROOT . DS );

/*
|--------------------------------------------------------------------------
| Define Time Zone
|--------------------------------------------------------------------------
|
|   'AC' => 'America/Rio_branco', | 'AL' => 'America/Maceio',
|   'AP' => 'America/Belem',      | 'AM' => 'America/Manaus',
|   'BA' => 'America/Bahia',      | 'CE' => 'America/Fortaleza',
|   'DF' => 'America/Sao_Paulo',  | 'ES' => 'America/Sao_Paulo',
|   'GO' => 'America/Sao_Paulo',  | 'MA' => 'America/Fortaleza',
|   'MT' => 'America/Cuiaba',     | 'MS' => 'America/Campo_Grande',
|   'MG' => 'America/Sao_Paulo',  | 'PR' => 'America/Sao_Paulo',
|   'PB' => 'America/Fortaleza',  | 'PA' => 'America/Belem',
|   'PE' => 'America/Recife',     | 'PI' => 'America/Fortaleza',
|   'RJ' => 'America/Sao_Paulo',  | 'RN' => 'America/Fortaleza',
|   'RS' => 'America/Sao_Paulo',  | 'RO' => 'America/Porto_Velho',
|   'RR' => 'America/Boa_Vista',  | 'SC' => 'America/Sao_Paulo',
|   'SE' => 'America/Maceio',     | 'SP' => 'America/Sao_Paulo',
|   'TO' => 'America/Araguaia',   |
|
*/

date_default_timezone_set('America/Sao_Paulo');

/*
|--------------------------------------------------------------------------
| Register The File Auto Loader
|--------------------------------------------------------------------------
|
| Description
|
*/

require_once __DIR__.'/config/autoload.php';

/*
|--------------------------------------------------------------------------
| Register and Init The File Configuration
|--------------------------------------------------------------------------
|
| Description
|
*/

require_once __DIR__.'/Config/App.php';
__config(ROOT.'/config.json');

/**
 *  Register storage location of downloaded files
 */
define( 'STORAGE', __DIR__ . DS . $_ENV->storage->path );

/*
|--------------------------------------------------------------------------
| Register Init
|--------------------------------------------------------------------------
|
| Description
|
*/

require_once __DIR__.'/init.php';



