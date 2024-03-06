<?php
/*
	Nom 				: t_event.class.php
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
class t_event extends connect
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
                    vw_t_event AS p 
                WHERE 1 = 1
                ";
        if (isset($critere['id_event']) && $critere['id_event'] != '') {
            $sql .=  " AND p.id_event = '" . $critere['id_event'] . "'";
        }
        $sql .= " ORDER BY updated DESC ";
        $res =  $this->connect->execute_req_pdo($sql);
        return $res;
    }
    function recupNumeroMaxCode()
    {
        $sql = "SELECT CASE WHEN MAX(id_event) IS NULL THEN 1 ELSE MAX(id_event) + 1 END AS maxi FROM t_event ";
        $res =  $this->connect->execute_req_pdo($sql);
        foreach ($res as $key => $value) {
            return $value["maxi"];
        }
    }
    function ajouter($tab, $t)
    {
        unset($tab["id_event"]);
        if (trim($tab["photo_event"]) == "") {
            unset($tab["photo_event"]);
        }
        $tab["titre"] =  $this->connect->my_htmlencode($tab["titre"], 1);
        $tab["contenu"] = $this->connect->my_htmlencode( $tab["contenu"] , 1) ;
        $this->connect->execute_insert("t_event", $tab);
    }
    function modifier($tab, $t)
    {
        if (trim($tab["photo_event"]) == "") {
            unset($tab["photo_event"]);
        }
        $tab["titre"] =  $this->connect->my_htmlencode($tab["titre"], 1);
        $tab["contenu"] =  $this->connect->my_htmlencode($tab["contenu"],1)  ;
        $this->connect->execute_update("t_event", $tab, " id_event = '" . $tab['id_event'] . "' ");
        // $this->connect->execute_req($sql);
    }
    function supprimer($tab)
    {
        $sql = "UPDATE t_event
                    SET deleted = 1 ,
                    updated = CURRENT_TIMESTAMP() ,
                    user_code_upd = " . $tab["user_code"] . " 
                WHERE id_event = '" . $tab["id_event"] . "' ";
        $this->connect->execute_req($sql);
    }
} //fin class
