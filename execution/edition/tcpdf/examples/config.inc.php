<?php

define("CHAMP","CC");

require_once(RP_MAIN_CONF . "include/constant.php");
require_once(RP_MAIN_CONF . "classes/debug.php");
require_once(RP_MAIN_CONF . "classes/datetime.lib.php");
require_once(RP_MAIN_CONF . "classes/XLSXReader.php");
require_once(RP_MAIN_CONF . "classes/base.php");
//require_once(RP_MAIN_CONF . "classes/do_Csv.class.php");


function loadRessource($langue) {
	global $_TEXT ;
	
	// Prise en compte du répertoire de localisation ($_SESSION[RESS_DIR])
	$ressource_dir = RP_RESSOURCES .$langue.'/langue.res';
	if ( file_exists($ressource_dir)) {
		$content = file($ressource_dir) ;
		$nb = count($content) ;
		for($i=0;$i<$nb;$i++) {
			$pos=strrpos("#",$content[$i]);
			if ( strlen(trim($content[$i]))>0 ) {				
				if ($pos===false) {
					// SRR - Ajout test sur = pour supprimer les erreurs dans le fichier log - 27/10/2006
					$pos = strrpos($content[$i], "=");
					if ($pos === false) null;
					else {
						$tab = explode("=", $content[$i]);
						if (isset($tab[1]))
							$_TEXT[trim($tab[0])]= trim($tab[1]) ;
						else
							$_TEXT[trim($tab[0])]= "" ;
					}
				}
			}		
		}
	} else {
		die(" Le fichier $ressource_dir est introuvable !");
	}
}


/**
* Initialisation de la session
* @access	public
*/
function _getText($key , $encode = 0) {
	global $_TEXT ;
	if ( isset($_TEXT[$key]) ) {
		return ($_TEXT[$key]) ;
	}
	return "[". ($encode==0 ? ($key) : ($key))  ."]" ;
}


@ini_alter('error_log', RP_MAIN . 'log/error.log');
@ini_alter('max_execution_time', '-1');
@ini_alter('max_input_time', '512');
@ini_alter('memory_limit', '1024M');
@ini_alter('upload_max_filesize', '5M');
@ini_alter('display_errors', 'Off');
@ini_alter('output_buffering', '4096');
@ini_alter('default_charset', 'iso-8859-1');
 

$sql_details = array(
   'user' => DB_USER,
   'pass' => DB_PWD,
   'db'   => DB_NAME,
   'host' => DB_HOST
);


?>