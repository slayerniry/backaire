<?php 
session_start();

if(!isset($_SESSION["user_code"])){
	
	die("error");
	exit();
	
}

?>