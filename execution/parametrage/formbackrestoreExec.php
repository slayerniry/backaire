<?php

require_once("../../config.inc.php");
require_once("../../session.php");

require_once(RP_MODELS . "parametre.class.php");

use Carbon\Carbon;

$parametre = new parametre();
$dossier_sauvegarde = $parametre->lireParKey("DOSSIER_SAUVEGARDE");

/***
 * 
 * Date long pour nom de fichier
 * 
 */
$date_long = (Carbon::now()->locale('fr_FR')->isoFormat('LLLL'));

$tab = explode(" ", $date_long);

$txt =  dateTimestamp();
foreach ($tab as $key => $value) {
	$txt .= "_" . $value . "";
}

$txt = str_replace(":", "_", $txt);
/** fin date long */

$secure = new clsSecureDatabase('I');

$secure->set_m_fileName($txt);

$secure->set_m_dossier_sauvegardre($dossier_sauvegarde);

if ($_POST["choix"] == "S") {

	if ($secure->backupDatabase("")) {
		header("location:" . HTTP_PAGE_PARAM . "backrestore.php?code=1");
	}
} else {

	// Nom du fichier à restaurer
	$file_to_restore = $_SERVER['DOCUMENT_ROOT'] . BACKUP_DIR . DB_NAME . ".sql";
	copy($_FILES['db_file']['tmp_name'], $file_to_restore);

	if ($secure->restoreDatabase($file_to_restore, "")) {

		header("location:" . HTTP_PAGE_PARAM . "backrestore.php?code=1");
	}
}
