<?php 
session_start();

if(!isset($_SESSION["user_code"])){
    
	
    header("location:" . "https://" . $_SERVER["HTTP_HOST"] . "/admin/index.php" );
    
    exit();
	
}

?>