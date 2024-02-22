<?php 

require_once("../../config.inc.php");
require_once("../../session.php");

require_once(RP_MODELS . "profil_menu.class.php");


$profil_menu = new profil_menu();

$prf_code = $_POST["prf_code"];

unset($_POST["prf_code"]);


$profil_menu->supprimer($prf_code);

foreach ($_POST as $key => $value) {
	
	if (is_numeric($value)) {
		
		$profil_menu->ajouter($prf_code,$value,"");

	} else {
		$profil_menu->ajouter($prf_code,"",$value);		
	}
	
}

$var_url = "prf_code=$prf_code";

header("location:" . HTTP_PAGE_ADMIN . "habilitationMenu.php?" . $var_url ) ;
    
exit();
