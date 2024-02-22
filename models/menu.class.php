<?php

/*
	
	Nom 				: menu.class.php
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
	
class menu extends connect {

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
                   *
                FROM
                    menu AS m 
                WHERE
                    ( m.deleted IS NULL OR m.deleted = 0 ) 
                ";

		if( isset($critere['men_parent']) && $critere['men_parent'] != ''){		
			$sql .=  " AND m.men_parent = '". $critere['men_parent'] ."'";		
        }

        if( isset($critere['men_parent2']) && $critere['men_parent2'] != ''){		
			$sql .=  " AND m.men_parent2 = '". $critere['men_parent2'] ."'";		
        }

        if( isset($critere['men_parent3']) && $critere['men_parent3'] != ''){		
			$sql .=  " AND m.men_parent3 = '". $critere['men_parent3'] ."'";		
        }
        
        //echo $sql . "<br> " ;

		$sql .= " ORDER BY rang ";

		
		
		$res =  $this->connect->execute_req_pdo($sql);
    
		return $res ;
		
	}

	function liretmp($tab){

		$res = array();

		$sql = "SELECT
                   *
                FROM
                    imp_article_init_3 AS m 
                WHERE
                  1 = 1
                ";

		$res =  $this->connect->execute_req_pdo($sql);
    
		return $res ;
	}

	function modifierArt_code( $art_abrev , $art_code ) {

        $sql = "UPDATE imp_article_init_3
				SET art_code = $art_code   
				WHERE art_abrev = '$art_abrev' " ;

        $this->connect->execute_req( $sql );

    }

} //fin class
