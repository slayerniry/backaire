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

	
} //fin class
