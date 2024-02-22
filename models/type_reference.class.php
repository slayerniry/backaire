<?php

/*
	
	Nom 				: client.class.php
	Emplacement 		: /Garatie_pi/modele
	Description 		: Script de mise � jour de la table �tape
	Date cr�ation		: 11/07/2011
	Auteur 				: Niry
	Version 			: 1.0
	Date mise � jour	: 11/07/2011

	Historique des modifications	
*/

/**
//Niry
 */
require_once("connect.php");

class type_reference extends connect
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
                    *
                FROM
                    type_reference AS t 
                WHERE
                    1 = 1

				 ";
		if (isset($critere['tpr_code']) && $critere['tpr_code'] != '') {
			$sql .=  " AND tpr_code = '" . $critere['tpr_code'] . "'";
		}

		if (isset($critere['prf_code']) && $critere['prf_code'] != '') {
			$sql .=  " AND tpr_code IN (SELECT tpr_code FROM profil_autre WHERE prf_code = " . $critere['prf_code'] . " )  ";
		}


		$res =  $this->connect->execute_req_pdo($sql);

		return $res;
	}
} //fin class
