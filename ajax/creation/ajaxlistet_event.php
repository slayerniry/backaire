<?php

require_once("../../config.inc.php");

$table = "vw_t_event";
$primaryKey = 'id_event';

$columns = array(
    array('db' => 'titre', 'dt' => 0),
    array('db' => 'date_event', 'dt' => 1),
    array('db' => 'type_event', 'dt' => 2),
    array('db' => 'left_contenu', 'dt' => 3),
    array('db' => 'id_event', 'dt' => 4),
    array('db' => 'updated', 'dt' => 5),
);

$whereClauses = array();

if (isset($_GET["id_type_event_rech"]) && $_GET["id_type_event_rech"] !== "") {
    $whereClauses[] = "id_type_event = '" . $_GET["id_type_event_rech"] . "'";
}

/*
if (isset($_GET["nom_event_rech"]) && $_GET["nom_event_rech"] !== "null") {
    $whereClauses[] = "nom_event_rech = '" . $_GET["nom_event_rech"] . "'";
}
*/

if (isset($_GET["contenu_rech"]) && $_GET["contenu_rech"] !== "null") {
    $whereClauses[] = "contenu LIKE '%" . $_GET["contenu_rech"] . "%'";
}

if (isset($_GET["date_event_min"]) && isset($_GET["date_event_max"]) && $_GET["date_event_min"] !== "") {
    $whereClauses[] = "date_event BETWEEN '" . trim($_GET["date_event_min"]) . "' AND '" . trim($_GET["date_event_max"]) . "'";
}

/*
if (isset($_GET["art_nom"]) && $_GET["art_nom"] !== "") {
    $whereClauses[] = "art_nom LIKE '%" . replace_texte_speciaux2($_GET["art_nom"]) . "%'";
}
*/

$where_ = implode(' AND ', $whereClauses);

require('../ssp.class.php');
echo json_encode(SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where_));
