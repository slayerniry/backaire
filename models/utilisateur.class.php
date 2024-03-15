<?php
/*
	Nom 				: utilisateur.class.php
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
class utilisateur extends connect
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
		$res = array();
		$sql = "SELECT
                    u.*,
                    p.prf_nom,
                    p.ref_abrev 
                FROM
                    utilisateur AS u
                    INNER JOIN profil AS p ON u.prf_code = p.prf_code 
                WHERE
                     (u.deleted is null or u.deleted = 0 )";
		if (isset($critere['user_login']) && $critere['user_login'] != '') {
			$sql .=  " AND user_login = '" . $critere['user_login'] . "'";
		}
		if (isset($critere['user_code']) && $critere['user_code'] != '') {
			$sql .=  " AND user_code = '" . $critere['user_code'] . "'";
		}
		if (isset($critere['user_pwd']) && $critere['user_pwd'] != '') {
			$sql .=  " AND user_pwd = '" . $critere['user_pwd'] . "'";
		}
		if (isset($critere['user_question']) && $critere['user_question'] != '') {
			$sql .=  " AND user_question = '" . $critere['user_question'] . "'";
		}
		if (isset($critere['user_reponse']) && $critere['user_reponse'] != '') {
			$sql .=  " AND user_reponse = '" . $critere['user_reponse'] . "'";
		}
		$sql .= " ORDER BY user_nom ";
		$res = $this->connect->execute_req_pdo($sql);
		return $res;
	}
	function ajouter($tab)
	{
		$sql = "INSERT INTO utilisateur 
				SET 
					prf_code = '" .  addslashes($tab['prf_code']) . "' ,
					user_nom = '" . htmlentities(addslashes($tab['user_nom']))  . "' ,
					user_prenom = '" .  htmlentities(addslashes($tab['user_prenom'])) . "' ,
					user_login = '" .  addslashes($tab['user_login']) . "' ,
					user_matricule = '" . htmlentities(addslashes($tab['user_matricule'])) . "' ,
                    user_pwd = md5(1) ,
                    updated = CURDATE() ,
                    user_code_upd = " . $_SESSION["user_code"] . "
				";
		$this->connect->execute_req($sql);
	}
	function modifier($tab)
	{
		$sql = "UPDATE utilisateur 
				SET 
					prf_code = '" .  addslashes($tab['prf_code']) . "' ,
					user_nom = '" . htmlentities(addslashes($tab['user_nom']))  . "' ,
					user_prenom = '" . htmlentities(addslashes($tab['user_prenom']))  . "' ,
					user_login = '" .  addslashes($tab['user_login']) . "' ,
					user_matricule = '" . htmlentities(addslashes($tab['user_matricule']))  . "' ,
                    updated = CURDATE() ,
                    user_code_upd = " . $_SESSION["user_code"] . "
				WHERE user_code = '" .  addslashes($tab['user_code']) . "' ";
		$this->connect->execute_req($sql);
	}
	function modifierpwd($tab)
	{
		$sql = "UPDATE utilisateur 
				SET 
					user_pwd = '" .  md5($tab['user_pwd']) . "' ,
					user_question = '" .  ($tab['user_question']) . "' ,
					user_reponse = '" .  ($tab['user_reponse']) . "' ,
                    updated = CURDATE() ,
                    user_code_upd = " . $tab["user_code"] . "
				WHERE user_code = '" .  addslashes($tab['user_code']) . "' ";
		$this->connect->execute_req($sql);
	}
	function supprimer($tab)
	{
		$sql = "UPDATE utilisateur
                    SET deleted = 1 ,
                    updated = CURDATE() ,
                    user_code_upd = " . $tab["user_code_upd"] . " 
                WHERE user_code = '" . addslashes($tab["user_code"]) . "' ";
		$this->connect->execute_req($sql);
	}
	function habilitationButton($url, $men_getText, $prf_code)
	{
		$res = array();
		$res = explode("/",$url);
		$url2 = "";
		foreach ($res as $key => $value) {
			if($key > 3){
				$url2 .= "/" . $value ;
			}
		}
		$sql = "SELECT * 
				FROM vw_profil_menu 
				WHERE mem_parent2 = (SELECT men_id FROM vw_profil_menu WHERE men_url LIKE '%$url2' AND prf_code = $prf_code)
				AND prf_code = $prf_code 
				AND men_getText = '$men_getText' ";
		$res = $this->connect->execute_req_pdo($sql);
		//echo $sql;
		if ($res["cnt"] > 0)
			return true;
		else
			return false;
	}
	function habilitationMenu($url,  $prf_code)
	{
		$res = array();
		$res = explode("/",$url);
		$url2 = "";
		foreach ($res as $key => $value) {
			if($key > 3){
				$url2 .= "/" . $value ;
			}
		}
		$sql = "SELECT * 
				FROM vw_profil_menu 
				WHERE men_id = (SELECT men_id FROM vw_profil_menu WHERE men_url LIKE '%$url2' AND prf_code = $prf_code)
				";
		//echo $sql ;		
		$res = $this->connect->execute_req_pdo($sql);
		//echo $sql;
		if ($res["cnt"] > 0)
			return true;
		else
			return false;
	}
} //fin class
