<?php 

require_once("../../config.inc.php");
require_once("../../session.php");

require_once(RP_MODELS . "mvtdetail.class.php");

$mvtdetail = new mvtdetail();

$tab = array();
$tabKey = array();
 
unset($_POST["table_length"]);



$tab["dtmvt_code"] = 0;

foreach ($_POST as $key => $value) {
	
	$tabKey = explode("|", $key);

	switch ($tabKey[0]) {
		case 'dtmvt_prix_achat':
			$tab["dtmvt_prix_achat"] = $value ;
			break;
		case 'dtmvt_code':
			$tab["dtmvt_code"] = $value ;
			break;
		case 'tau_code':
			$tab["tau_code"] = $value   ;
			break;	
		case 'dtmvt_taux':
			$tab["dtmvt_taux"] = $value ;
			break;
		case 'prix_vente_estimatif':
			$tab["prix_vente_estimatif"] = str_replace(" ", "", $value)   ;
			break;		
		case 'dtmvt_prix_vente':
			$tab["dtmvt_prix_vente"] = $value   ;
			break;		


		default:
			# code...
			break;

	}// fin switch

	if ($tab["dtmvt_code"] > 0) {

		$mvtdetail->modifierPrix($tab) ;

		$tab["dtmvt_code"] = 0;

	}

}// fin for

$var_url = "mvt_code=" . $_POST["mvt_code"];

header("location:" . HTTP_PAGE_ADMIN . "majPrix.php?" . $var_url ) ;
    
exit();


?>

