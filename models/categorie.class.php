<?php

/*
	
	Nom 				: categorie.class.php
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
	
class categorie extends connect {

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
                   p.*
                FROM
                    categorie AS p 
                WHERE
                    ( p.deleted IS NULL OR p.deleted = 0 ) 
                ";
		if( isset($critere['ref_abrev']) && $critere['ref_abrev'] != ''){		
			$sql .=  " AND p.ref_abrev = '". $critere['ref_abrev'] ."'";		
        }

        if( isset($critere['cat_code']) && $critere['cat_code'] != ''){		
			$sql .=  " AND p.cat_code = '". $critere['cat_code'] ."'";		
        }
        
		$sql .= " ORDER BY cat_nom ";

	
		
		$res =  $this->connect->execute_req_pdo($sql);
    
		return $res ;
		
	}

} //fin class
?>
