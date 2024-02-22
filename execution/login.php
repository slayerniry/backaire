<?php

//$tab_php_self = explode("/", $_SERVER['PHP_SELF']);

//require_once($_SERVER["DOCUMENT_ROOT"] . "/" .  $tab_php_self[1] . "/" . "config.inc.php");

require_once("../config.inc.php");

if (isset($_POST["user_login"])) {

	require_once(RP_MODELS . "utilisateur.class.php");
	require_once(RP_MODELS . "profil_menu.class.php");


	$critere = array();
	$tab = array();

	$critere["user_login"] = $_POST["user_login"];
	$critere["user_pwd"] = md5($_POST["user_pwd"]);

	$utilisateur = new utilisateur();
	$profil_menu = new profil_menu();

	$tab["utilisateur"] = $utilisateur->lireParCritere($critere);

	//$utilisateur->lireParCritere($critere); 

	if ($tab["utilisateur"]["cnt"] > 0) {

		session_start();
		//utilisateur
		$_SESSION["user_code"] = $tab["utilisateur"][0]["user_code"];
		$_SESSION["user_nom"] = $tab["utilisateur"][0]["user_nom"];
		$_SESSION["user_prenom"] = $tab["utilisateur"][0]["user_prenom"];
		$_SESSION["user_matricule"] = $tab["utilisateur"][0]["user_matricule"];
		$_SESSION["user_profil"] = $tab["utilisateur"][0]["ref_abrev"];


		$criterePF["prf_code"] = $tab["utilisateur"][0]["prf_code"];

		$criterePF["men_parent_not_null"] = 0;
		$_SESSION["menu"] = $profil_menu->lireViewParCritere($criterePF);

		$criterePF["men_parent_not_null"] = 1;
		$_SESSION["profil_menu_bouton"] = $profil_menu->lireViewParCritere($criterePF);

		$_SESSION["menuParent"] = $profil_menu->lireMenuParent($criterePF["prf_code"]);

		$_SESSION["prf_code"] = $criterePF["prf_code"];

		//annee scolaire
		$_SESSION["ann_code"] = "";
		$_SESSION["ann_nom"] = "";

		$_SESSION["eta_code"] = "";
		$_SESSION["eta_nom"] = "";

		header('Location: ' . HTTP_PAGE . 'index.php');
		exit();
	} else {


		header('Location: ' . HTTP_MAIN . 'index.php?err=1&l=' .  $_POST["user_login"]);
		exit();
	}
} else { // deconnect

	if (isset($_GET["dec"])) {

		session_start();

		if ($_SESSION["user_profil"] == "ADMIN") {

			$files = glob(RP_XLSX  . '*');

			// Deleting all the files in the list
			foreach ($files as $file) {

				if (is_file($file))

					// Delete the given file
					unlink($file);
			}
		}


		// remove all session variables
		session_unset();

		// destroy the session 
		session_destroy();

		header('Location: ' . HTTP_MAIN . 'index.php?err=0');
		exit();
	}
}
