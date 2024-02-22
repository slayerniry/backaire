<?php

/*
	
	Nom 				: societe.class.php
	Emplacement 		: /Garatie_pi/modele
	Description 		: Script de mise � jour de la table �tape
	Date cr�ation		: 11/07/2011
	Auteur 				: Niry
	Version 			: 1.0
	Date mise � jour	: 11/07/2011

	Historique des modifications	
*/

/**

 */
require_once("connect.php");

class societe extends connect
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
		$ret = array();

		$sql = "SELECT
                   p.*
                FROM
                    t_societe AS p 
                WHERE
                    ( p.deleted IS NULL OR p.deleted = 0 ) 
                ";
		if (isset($critere['ref_abrev']) && $critere['ref_abrev'] != '') {
			$sql .=  " AND p.ref_abrev = '" . $critere['ref_abrev'] . "'";
		}

		$sql .= " ORDER BY detail_societe ASC ";

		$res =  $this->connect->execute_req_pdo($sql);

		return $res;
	}


	function recupNumeroMaxCode()
	{

		$sql = "SELECT CASE WHEN MAX(id_info_societe) IS NULL THEN 1 ELSE MAX(id_info_societe) + 1 END AS maxi FROM t_societe ";

		$res =  $this->connect->execute_req_pdo($sql);

		foreach ($res as $key => $value) {

			return $value["maxi"];
		}
	}

	function lireTable($code, $table, $champ)
	{
		$ret = array();

		$sql = "SELECT *
                FROM $table  as e
                WHERE $champ = '$code' ";

		$res =  $this->connect->execute_req_pdo($sql);


		foreach ($res as $key => $value) {
			return $value;
		}
	}

	function lireTable2($code, $table, $champ)
	{
		$ret = array();

		$sql = "SELECT *
                FROM $table  as e
                WHERE $champ = '$code' ";

		$ret =  $this->connect->execute_req_pdo($sql);

		return $ret;
	}

	function ajouter($tab, $t)
	{

		$sql = "INSERT INTO t_societe 
				SET user_code_upd = " . $_SESSION["user_code"] . " ,
                    detail_societe = '" . $this->connect->my_htmlencode($tab['detail_societe'], $t)  . "' , ";

		if (isset($tab['logo_societe']) && $tab['logo_societe'] != "") {
			$sql .=  " logo_societe = '" . $tab['logo_societe']  . "' , ";
		}

		$sql .=   " tel_societe = '" . $this->connect->my_htmlencode($tab['tel_societe'], $t)  . "' , 
                    mail_societe = '" . $this->connect->my_htmlencode($tab['mail_societe'], $t)  . "' , 
                    adresse_societe = '" . $this->connect->my_htmlencode($tab['adresse_societe'], $t)  . "' , 
                    compte_fb = '" . $this->connect->my_htmlencode($tab['compte_fb'], $t)  . "' , 
                    compte_tweet = '" . $this->connect->my_htmlencode($tab['compte_tweet'], $t)  . "' , 
                    compte_linkedin = '" . $this->connect->my_htmlencode($tab['compte_linkedin'], $t)  . "' ,";

		$sql .= " updated = CURRENT_TIMESTAMP() ";

		$this->connect->execute_req($sql);
	}

	function modifier($tab, $t)
	{

		$sql = "UPDATE t_societe 
        SET user_code_upd = " . $_SESSION["user_code"] . " ,
                    detail_societe = '" . $this->connect->my_htmlencode($tab['detail_societe'], $t)  . "' , ";

		if (isset($tab['logo_societe']) && $tab['logo_societe'] != "") {
			$sql .=  " logo_societe = '" . $tab['logo_societe']  . "' , ";
		}

		$sql .=   " tel_societe = '" . $this->connect->my_htmlencode($tab['tel_societe'], $t)  . "' , 
                    mail_societe = '" . $this->connect->my_htmlencode($tab['mail_societe'], $t)  . "' , 
                    adresse_societe = '" . $this->connect->my_htmlencode($tab['adresse_societe'], $t)  . "' , 
                    compte_fb = '" . $this->connect->my_htmlencode($tab['compte_fb'], $t)  . "' , 
                    compte_tweet = '" . $this->connect->my_htmlencode($tab['compte_tweet'], $t)  . "' , 
                    compte_linkedin = '" . $this->connect->my_htmlencode($tab['compte_linkedin'], $t)  . "' ,";

		$sql .= "  updated = CURRENT_TIMESTAMP() 
				    
				WHERE id_info_societe = '" . $tab['id_info_societe'] . "'";

		$this->connect->execute_req($sql);
	}

	function supprimer($tab)
	{

		$sql = "UPDATE t_societe
                    SET deleted = 1 ,
                    updated = CURRENT_TIMESTAMP() ,
                    user_code_upd = " . $tab["user_code"] . " 
                WHERE id_info_societe = '" . $this->connect->my_htmlencode($tab["id_info_societe"], 1) . "' ";

		$this->connect->execute_req($sql);
	}
} //fin class
