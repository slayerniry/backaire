<?php 
session_start();

$tab_php_self = explode("/", $_SERVER['PHP_SELF']);


if(!isset($_SESSION["user_code"])){
    
	
    header("location:" . "http://" . $_SERVER["HTTP_HOST"] . "/" . $tab_php_self[1]  . "/index.php" );
    
    exit();
	
}

?>