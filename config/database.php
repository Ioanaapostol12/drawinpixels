<?php
require_once realpath(__DIR__."/../src/class/database.php");

define( 'DB_HOST', 'localhost' ); // set database host
define( 'DB_USER', 'root' ); // set database user
define( 'DB_PASS', 'asdx32' ); // set database password
define( 'DB_NAME', 'drawinpixels' ); // set database name
define( 'DISPLAY_DEBUG', true ); //display db errors?

//Initiate the class
$database = new DB();
//OR...
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
