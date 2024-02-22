<?php

require_once("../../config.inc.php");

$table = "vw_t_expertise";
$primaryKey = 'id_expertise';

$columns = array(

    array('db' => 'type_expertise', 'dt' => 0),
    array('db' => 'left_contenu', 'dt' => 1),
    array('db' => 'id_expertise', 'dt' => 2),
    array('db' => 'updated', 'dt' => 3),
);

$whereClauses = array();

if (isset($_GET["id_type_expertise_rech"]) && $_GET["id_type_expertise_rech"] !== "") {
    $whereClauses[] = "id_type_expertise = '" . $_GET["id_type_expertise_rech"] . "'";
}

/*
if (isset($_GET["nom_expertise_rech"]) && $_GET["nom_expertise_rech"] !== "null") {
    $whereClauses[] = "nom_expertise_rech = '" . $_GET["nom_expertise_rech"] . "'";
}
*/

if (isset($_GET["contenu_rech"]) && $_GET["contenu_rech"] !== "null") {
    $whereClauses[] = "contenu LIKE '%" . $_GET["contenu_rech"] . "%'";
}

if (isset($_GET["date_expertise_min"]) && isset($_GET["date_expertise_max"]) && $_GET["date_expertise_min"] !== "") {
    $whereClauses[] = " updated BETWEEN '" . trim($_GET["date_expertise_min"]) . "' AND '" . trim($_GET["date_expertise_max"]) . "'";
}

/*
if (isset($_GET["art_nom"]) && $_GET["art_nom"] !== "") {
    $whereClauses[] = "art_nom LIKE '%" . replace_texte_speciaux2($_GET["art_nom"]) . "%'";
}
*/

$where_ = implode(' AND ', $whereClauses);

require('../ssp.class.php');
echo json_encode(SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where_));
