<?php

/*

Nom 				: tarif.class.php
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

class tarif extends connect
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

    function lireParCritere($critere)
    {
        $ret = array();
        $sql = "SELECT
                    c.cat_nom,
                    t.* 
                FROM
                    tarif AS t
                    INNER JOIN categorie AS c ON t.cat_code = c.cat_code 
                WHERE 1 = 1 
                AND ( t.deleted IS NULL OR t.deleted = 0) ";

        $ret =  $this->connect->execute_req_pdo($sql);

        return $ret;
    }

    function ajouter($tab, $t)
    {

        $sql = "INSERT INTO tarif 
				SET user_code_upd = " . $_SESSION["user_code"] . " ,
                    cat_code = '" . $this->connect->my_htmlencode($tab['cat_code'], $t)  . "' , 
                    tar_nom = '" . $this->connect->my_htmlencode($tab['tar_nom'], $t)  . "' , 
                    tar_unite = '" . $this->connect->my_htmlencode($tab['tar_unite'], $t)  . "' , 
                    tar_prix1 = '" . $this->connect->my_htmlencode($tab['tar_prix1'], $t)  . "' , 
                    tar_prix2 = '" . $this->connect->my_htmlencode($tab['tar_prix2'], $t)  . "' , 
                    tar_prix3 = '" . $this->connect->my_htmlencode($tab['tar_prix3'], $t)  . "' , 
                    tar_prix4 = '" . $this->connect->my_htmlencode($tab['tar_prix4'], $t)  . "' , 
                    tar_prix5 = '" . $this->connect->my_htmlencode($tab['tar_prix5'], $t)  . "' , 
                    tar_prix6 = '" . $this->connect->my_htmlencode($tab['tar_prix6'], $t)  . "' , 
                    tar_prix7 = '" . $this->connect->my_htmlencode($tab['tar_prix7'], $t)  . "' , 
                    tar_prix8 = '" . $this->connect->my_htmlencode($tab['tar_prix8'], $t)  . "' , 
                    tar_prix9 = '" . $this->connect->my_htmlencode($tab['tar_prix9'], $t)  . "' , 
                    tar_prix10 = '" . $this->connect->my_htmlencode($tab['tar_prix10'], $t)  . "' ,";

        $sql .= " updated = CURRENT_TIMESTAMP() ";

        $this->connect->execute_req($sql);
    }

    function modifier($tab, $t)
    {

        $sql = "UPDATE tarif 
        SET user_code_upd = " . $_SESSION["user_code"] . " ,
            cat_code = '" . $this->connect->my_htmlencode($tab['cat_code'], $t)  . "' , 
            tar_nom = '" . $this->connect->my_htmlencode($tab['tar_nom'], $t)  . "' , 
            tar_unite = '" . $this->connect->my_htmlencode($tab['tar_unite'], $t)  . "' , 
            tar_prix1 = '" . $this->connect->my_htmlencode($tab['tar_prix1'], $t)  . "' , 
            tar_prix2 = '" . $this->connect->my_htmlencode($tab['tar_prix2'], $t)  . "' , 
            tar_prix3 = '" . $this->connect->my_htmlencode($tab['tar_prix3'], $t)  . "' , 
            tar_prix4 = '" . $this->connect->my_htmlencode($tab['tar_prix4'], $t)  . "' , 
            tar_prix5 = '" . $this->connect->my_htmlencode($tab['tar_prix5'], $t)  . "' , 
            tar_prix6 = '" . $this->connect->my_htmlencode($tab['tar_prix6'], $t)  . "' , 
            tar_prix7 = '" . $this->connect->my_htmlencode($tab['tar_prix7'], $t)  . "' , 
            tar_prix8 = '" . $this->connect->my_htmlencode($tab['tar_prix8'], $t)  . "' , 
            tar_prix9 = '" . $this->connect->my_htmlencode($tab['tar_prix9'], $t)  . "' , 
            tar_prix10 = '" . $this->connect->my_htmlencode($tab['tar_prix10'], $t)  . "' , ";

        $sql .= "  updated = CURRENT_TIMESTAMP() 
				    
				WHERE tar_code = '" . $tab['tar_code'] . "'";

        $this->connect->execute_req($sql);
    }

    function supprimer($tab)
    {

        $sql = "UPDATE tarif
                    SET deleted = 1 ,
                    updated = CURRENT_TIMESTAMP() ,
                    user_code_upd = " . $tab["user_code"] . " 
                WHERE tar_code = '" . $this->connect->my_htmlencode($tab["tar_code"], 1) . "' ";

        $this->connect->execute_req($sql);
    }
}
//fin class
