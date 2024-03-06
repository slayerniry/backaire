<?php

/*
	
	Nom 				: parametre.class.php
	Emplacement 		: /bazar_mada/models
	Description 		: Script de mise � jour de la table parametre
	Date cr�ation		: 19/09/2014
	Auteur 				: AND
	Version 			: 1.0
	Date mise � jour	: 

	Historique des modifications	
*/

require_once("connect.php");

class parametre
{

	var $connect;
	/**
	 * Constructeur.
	 * @access	public
	 */
	function __construct()
	{
		$this->connect = new connect();
	}



	public function lireParCritere($critere)
	{
		$ret = array();

		$sSQL = "SELECT *
                 FROM parametre 
                 WHERE 1 = 1  ";

		if (isset($critere['param_key']) && $critere['param_key'] != "")
			$sSQL .= " AND param_key = '" . ($critere['param_key']) . "'";

		if (isset($critere['param_visible']) && $critere['param_visible'] != "")
			$sSQL .= " AND param_visible = '" . ($critere['param_visible']) . "'";

		$sSQL .= " ORDER BY param_key";

		$res =  $this->connect->execute_req_pdo($sSQL);

		return $res;
	}


	function lireParKey($param_key)
	{
		$ret = array();

		$sSQL = "SELECT *
                 FROM parametre 
                 WHERE 1 = 1  ";


		$sSQL .= " AND param_key = '" . $param_key . "'";

		$res =  $this->connect->execute_req_pdo($sSQL);

		if ($res["cnt"] > 0) {

			return $res[0]["param_value"];
		} else {

			return "ND->" . $param_key;
		}
	}

	function ajouter($tab)
	{

		$sql = "INSERT INTO parametre 
				SET 
					param_key = '" .  $this->connect->my_htmlencode($tab['param_key'],1) . "' ,
					param_value = '" .  $this->connect->my_htmlencode($tab['param_value'],1)  . "' ,
					param_desc = '" .  $this->connect->my_htmlencode($tab['param_desc'],1) . "' ,
					param_comment = '" .  $this->connect->my_htmlencode($tab['param_comment'],1) . "' 
				";

		$this->connect->execute_req($sql);
	}

	function modifier($tab)
	{

		$sql = "UPDATE parametre 
				SET 
					param_value = '" .  $this->connect->my_htmlencode($tab['param_value'],1)  . "' ,
					param_desc = '" . $this->connect->my_htmlencode($tab['param_desc'],1) . "' ,
					param_comment = '" . $this->connect->my_htmlencode($tab['param_comment'], 1)  . "' 
				WHERE param_key	 = '" .  $this->connect->my_htmlencode($tab['param_key'],1) . "' "; 

		$this->connect->execute_req($sql);
	}

	function supprimer($tab)
	{

		$sql = "DELETE parametre 
				WHERE param_value	 = " . addslashes($tab["param_value"]);

		$this->connect->execute_req($sql);
	}
} //fin class
