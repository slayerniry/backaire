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
//Niry 14/07/2011
 */
require_once("connect.php");

class referentielle extends connect
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
                    referentielle AS r 
                WHERE
                    (deleted is null or deleted = 0 )

				 ";
        if (isset($critere['tpr_code']) && $critere['tpr_code'] != '') {
            $sql .=  " AND r.tpr_code = '" . $critere['tpr_code'] . "'";
        }

        if (isset($critere['NOT_tpr_code']) && $critere['NOT_tpr_code'] != '') {
            $sql .=  " AND r.tpr_code <> '" . $critere['NOT_tpr_code'] . "'";
        }

        if (isset($critere['ref_code']) && $critere['ref_code'] != '') {
            $sql .=  " AND r.ref_code = '" . $critere['ref_code'] . "'";
        }

        if (isset($critere['ann_code']) && $critere['ann_code'] != '') {
            $sql .=  " AND r.ann_code = '" . $critere['ann_code'] . "'";
        }

        if (isset($critere['per_code']) && $critere['per_code'] != '') {
            $sql .=  " AND r.per_code = '" . $critere['per_code'] . "'";
        }


        $res =  $this->connect->execute_req_pdo($sql);

        return $res;
    }

    function ajouter($tab)
    {

        $ann_code = 'NULL';
        if (isset($tab['ann_code']) && $tab['ann_code'] != '') {
            $ann_code = $tab['ann_code'];
        }

        $per_code = 'NULL';
        if (isset($tab['per_code']) && $tab['per_code'] != '') {
            $per_code = $tab['per_code'];
        }

        $sql = "INSERT INTO referentielle 
				SET tpr_code   = '" . htmlentities(addslashes($tab['tpr_code']))    . "' ,
                    ref_abrev =  '" . htmlentities(addslashes($tab['ref_abrev']))    . "' ,
					ref_champ1 = '" . htmlentities(addslashes($tab['ref_champ1']))    . "' ,
					ref_champ2 = '" . htmlentities(addslashes($tab['ref_champ2']))    . "' ,
					ref_champ3 = '" . htmlentities(addslashes($tab['ref_champ3']))    . "' ,
					ref_champ4 = '" . htmlentities(addslashes($tab['ref_champ4']))    . "' ,
					ref_champ5 = '" . htmlentities(addslashes($tab['ref_champ5']))    . "' ,
                    
                    ann_code =  $ann_code ,
                    per_code =  $per_code ,
                    
                    updated = CURDATE() ,
                    user_code_upd = " . $_SESSION["user_code"] . "
				";



        $this->connect->execute_req($sql);
    }

    function modifier($tab)
    {

        $ann_code = 'NULL';
        if (isset($tab['ann_code']) && $tab['ann_code'] != '') {
            $ann_code = $tab['ann_code'];
        }

        $per_code = 'NULL';
        if (isset($tab['per_code']) && $tab['per_code'] != '') {
            $per_code = $tab['per_code'];
        }

        $sql = "UPDATE referentielle 
				SET tpr_code   = '" . htmlentities(addslashes($tab['tpr_code']))    . "' ,
                    ref_abrev =  '" . htmlentities(addslashes($tab['ref_abrev']))    . "' ,
					ref_champ1 = '" . htmlentities(addslashes($tab['ref_champ1'] ?? ""))    . "' ,
					ref_champ2 = '" . htmlentities(addslashes($tab['ref_champ2'] ?? ""))    . "' ,
					ref_champ3 = '" . htmlentities(addslashes($tab['ref_champ3'] ?? ""))    . "' ,
					ref_champ4 = '" . htmlentities(addslashes($tab['ref_champ4'] ?? ""))    . "' ,
					ref_champ5 = '" . htmlentities(addslashes($tab['ref_champ5'] ?? ""))    . "' ,
                    
                    ann_code =  $ann_code ,
                    per_code =  $per_code ,
                    
                    updated = CURDATE() ,
                    user_code_upd = " . $_SESSION["user_code"] . "
                WHERE ref_code = " . $tab['ref_code'];

        $this->connect->execute_req($sql);
    }

    function supprimer($tab)
    {

        $sql = "UPDATE referentielle SET deleted = 1 , 
                    updated = CURDATE() ,
                    user_code_upd = " . $tab["user_code"] . "
				WHERE ref_code	 =  " . $tab["ref_code"];

        $this->connect->execute_req($sql);
    }

    function insert_table_destination($tab)
    {

        $tab_tpr_champ = explode("|", $tab["tpr_champ"]);

        $champ = "";

        for ($j = 0; $j < count($tab_tpr_champ); $j++) {

            $champ .= $tab_tpr_champ[$j] . " = '" . htmlentities(addslashes($tab["ref_champ" . ($j + 1)]))  . "',";
        }


        if ($tab["tpr_annee_scolaire"]  != '') {

            $champ .= " ann_code = " .  $tab["ann_code"] . " ,";
        }

        if ($tab["tpr_periode"]  != '') {

            $champ .= " per_code = " .  $tab["per_code"] . " ,";
        }

        $sql = " INSERT INTO " . $tab["tpr_table"] . "
                    SET " . $champ . "
                    ref_abrev = '" . addslashes($tab["ref_abrev"]) . "' ,
                    updated = CURDATE() ,
                    user_code_upd = " . $_SESSION["user_code"] . " ";



        $this->connect->execute_req($sql);
    }

    function update_table_destination($tab)
    {

        $tab_tpr_champ = explode("|", $tab["tpr_champ"]);

        $champ = "";

        for ($j = 0; $j < count($tab_tpr_champ); $j++) {

            $champ .= $tab_tpr_champ[$j] . " = '" . htmlentities(addslashes($tab["ref_champ" . ($j + 1)]))  . "',";
        }



        $sql = " UPDATE " . $tab["tpr_table"] . "
                    SET " . $champ . "
                    updated = CURDATE() ,
                    user_code_upd = " . $_SESSION["user_code"] . " 
                WHERE ref_abrev = '" . htmlentities(addslashes($tab["ref_abrev"])) . "' ";

        $this->connect->execute_req($sql);
    }

    function delete_table_destination($tab)
    {

        $sql = "UPDATE " . $tab["tpr_table"] . "
                    SET deleted = 1 ,
                    updated = CURDATE() ,
                    user_code_upd = " . $tab["user_code"] . " 
                WHERE ref_abrev = '" . htmlentities(addslashes($tab["ref_abrev"])) . "' ";

        $this->connect->execute_req($sql);
    }
} //fin class
