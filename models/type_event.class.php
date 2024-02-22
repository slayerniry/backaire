<?php

/*
	
	Nom 				: type_event.class.php
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

class type_event extends connect
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
                    t_type_event AS p 
                WHERE
                    ( p.deleted IS NULL OR p.deleted = 0 ) 
                ";
        if (isset($critere['ref_abrev']) && $critere['ref_abrev'] != '') {
            $sql .=  " AND p.ref_abrev = '" . $critere['ref_abrev'] . "'";
        }

        $sql .= " ORDER BY type_event ASC ";

        $res =  $this->connect->execute_req_pdo($sql);

        return $res;
    }


    function recupNumeroMaxCode()
    {

        $sql = "SELECT CASE WHEN MAX(id_type_event) IS NULL THEN 1 ELSE MAX(id_type_event) + 1 END AS maxi FROM t_type_event ";

        $res =  $this->connect->execute_req_pdo($sql);

        foreach ($res as $key => $value) {

            return $value["maxi"];
        }
    }
} //fin class
