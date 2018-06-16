<?php
require_once realpath(__DIR__."/../src/class/database.php");

define( 'DB_HOST', 'localhost' ); // set database host
define( 'DB_USER', 'root' ); // set database user
define( 'DB_PASS', 'asdx32' ); // set database password
define( 'DB_NAME', 'drawinpixels' ); // set database name
define( 'DISPLAY_DEBUG', true ); //display db errors?

/** @var ../src/class/database.php $database */
$database = DB::getInstance();

if( isset( $_POST ) )
{
    foreach( $_POST as $key => $value )
    {
        $_POST[$key] = $database->filter( $value );
    }
}

if( isset( $_GET ) )
{
    foreach( $_GET as $key => $value )
    {
        $_GET[$key] = $database->filter( $value );
    }
}
