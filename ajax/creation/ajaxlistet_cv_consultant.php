<?php

require_once("../../config.inc.php");

$table = "vw_t_cv_consultant";
$primaryKey = 'id_consultant';

$columns = array(
    array('db' => 'login_compte', 'dt' => 0),
    array('db' => 'nom_consultant', 'dt' => 1),
    array('db' => 'prenom_consultant', 'dt' => 2),
    array('db' => 'date_naissance', 'dt' => 3),
    array('db' => 'id_consultant', 'dt' => 4),
    array('db' => 'updated', 'dt' => 5),
);

$whereClauses = array();

if (isset($_GET["id_langue_rech"]) && $_GET["id_langue_rech"] !== "null") {
    $whereClauses[] = "id_langue = '" . $_GET["id_langue_rech"] . "'";
}

/*
if (isset($_GET["nom_consultant_rech"]) && $_GET["nom_consultant_rech"] !== "null") {
    $whereClauses[] = "nom_consultant_rech = '" . $_GET["nom_consultant_rech"] . "'";
}
*/

if (isset($_GET["nom_consultant_rech"]) && $_GET["nom_consultant_rech"] !== "null") {
    $whereClauses[] = "CONCAT_WS(' ', nom_consultant, prenom_consultant, login_compte) LIKE '%" . $_GET["nom_consultant_rech"] . "%'";
}

if (isset($_GET["date_naissance_min"]) && isset($_GET["date_naissance_max"]) && $_GET["date_naissance_min"] !== "") {
    $whereClauses[] = "date_naissance BETWEEN '" . trim($_GET["date_naissance_min"]) . "' AND '" . trim($_GET["date_naissance_max"]) . "'";
}

/*
if (isset($_GET["art_nom"]) && $_GET["art_nom"] !== "") {
    $whereClauses[] = "art_nom LIKE '%" . replace_texte_speciaux2($_GET["art_nom"]) . "%'";
}
*/

$where_ = implode(' AND ', $whereClauses);

require('../ssp.class.php');
echo json_encode(SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where_));
