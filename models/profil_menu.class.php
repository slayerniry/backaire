<?php

/*
	
	Nom 				: profil_menu.class.php
	Emplacement 		: /Garatie_pi/modele
	Description 		: Script de mise à jour de la table étape
	Date création		: 11/07/2011
	Auteur 				: Niry
	Version 			: 1.0
	Date mise à jour	: 11/07/2011

	Historique des modifications	
*/

/**

 */
require_once("connect.php");

class profil_menu extends connect
{

	var $connect;

	function __construct()
	{


		$this->connect = new connect();
	}

	/**		modif 		
	 * Lire un enregistrement.
	 * @access	public
	 */
	function lireParCritere($critere)
	{

		$res = array();

		$sql = "SELECT
                   *
                FROM
                    vw_profil_menu AS u  
                WHERE 1 = 1 ";

		if (isset($critere['prf_code']) && $critere['prf_code'] != '') {
			$sql .=  " AND prf_code = '" . $critere['prf_code'] . "'";
		}

		if (isset($critere['men_id']) && $critere['men_id'] != '') {
			$sql .=  " AND men_id = '" . $critere['men_id'] . "'";
		}

		$sql .= " ORDER BY prf_code , rang  ";

		$res = $this->connect->execute_req_pdo($sql);

		return $res;
	}


	function lireViewParCritere($critere)
	{

		$res = array();

		$sql = "SELECT
                   *
                FROM
                    vw_profil_menu AS u  
                WHERE 1 = 1 ";

		if (isset($critere['prf_code']) && $critere['prf_code'] != '') {
			$sql .=  " AND prf_code = '" . $critere['prf_code'] . "'";
		}

		if (isset($critere['men_id']) && $critere['men_id'] != '') {
			$sql .=  " AND men_id = '" . $critere['men_id'] . "'";
		}

		if (isset($critere['deleted']) && $critere['deleted'] != '') {
			$sql .=  " AND deleted = '" . $critere['deleted'] . "'";
		}

		if (isset($critere['men_restaure']) && $critere['men_restaure'] != '') {
			$sql .=  " AND men_restaure = '" . $critere['men_restaure'] . "'";
		}

		if (isset($critere['men_parent']) && $critere['men_parent'] != '') {
			$sql .=  " AND men_parent = '" . $critere['men_parent'] . "'";
		}

		if (isset($critere['men_parent_not_null']) && $critere['men_parent_not_null'] == 0) {
			$sql .=  " AND men_parent IS NOT NULL ";
		}

		if (isset($critere['men_parent_not_null']) && $critere['men_parent_not_null'] == 1) {
			$sql .=  " AND men_parent IS NULL ";
		}


		$sql .= " ORDER BY men_parent DESC , rang ASC ";



		$res = $this->connect->execute_req_pdo($sql);

		return $res;
	}


	function lireMenuParent($prf_code)
	{

		$res = array();

		$sql = "SELECT DISTINCT men_parent
				FROM vw_profil_menu
				WHERE men_parent IS NOT NULL 
				AND prf_code = $prf_code ";

		$res = $this->connect->execute_req_pdo($sql);

		return $res;
	}


	function ajouter($prf_code, $men_id, $menu_principale)
	{

		$sql = "INSERT INTO profil_menu 
				SET 
					prf_code = $prf_code ";

		if ($menu_principale != "")
			$sql .= " , menu_principale = '$menu_principale'";
		else
			$sql .= " , men_id = $men_id";

		$this->connect->execute_req($sql);
	}


	function supprimer($prf_code)
	{
		$sql = "DELETE FROM profil_menu WHERE prf_code = $prf_code";

		$this->connect->execute_req($sql);
	}

	function supprimerAutre($prf_code)
	{
		$sql = "DELETE FROM profil_autre WHERE prf_code = $prf_code";

		$this->connect->execute_req($sql);
	}

	function ajouterAutre($prf_code, $tpr_code)
	{

		$sql = "INSERT INTO profil_autre
				SET prf_code = $prf_code ";

		$sql .= " , tpr_code = '$tpr_code'";

		$this->connect->execute_req($sql);
	}
} //fin class
