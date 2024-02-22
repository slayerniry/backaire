<?php

/*
	
	Nom 				: profil.class.php
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
	
class profil extends connect {

	var $connect ;
	
	function __construct(){	
	
		
		$this->connect = new connect();
		
	}

	/**		modif 		
	* Lire un enregistrement.
	* @access	public
	*/
	function lireParCritere($critere) {
		$ret = array() ;
		
		$sql = "SELECT
                    p.prf_code,
                    p.prf_nom,
                    p.ref_abrev,
                    p.deleted,
                    p.updated,
                    p.user_code_upd 
                FROM
                    profil AS p 
                WHERE
                    ( p.deleted IS NULL OR p.deleted = 0 ) 
                ";
		if( isset($critere['prf_code']) && $critere['prf_code'] != ''){		
			$sql .=  " AND p.prf_code = '". $critere['prf_code'] ."'";		
        }
        
		$sql .= " ORDER BY prf_nom ";

		
		
		$res =  $this->connect->execute_req_pdo($sql);
    
		return $res ;
		
	}

} //fin class
?>
