<?php

require_once("../../config.inc.php");

$table = "vw_t_apporteur";
$primaryKey = 'id_apporteur_affaire';

$columns = array(
    array('db' => 'nom_apporteur', 'dt' => 0),
    array('db' => 'detail_type', 'dt' => 1),
    array('db' => 'nom_apporteur', 'dt' => 2),
    array('db' => 'logo_apporteur', 'dt' => 3),
    array('db' => 'id_apporteur_affaire', 'dt' => 4),
    array('db' => 'updated', 'dt' => 5),
);

$whereClauses = array();

if (isset($_GET["id_type_apporteur_rech"]) && $_GET["id_type_apporteur_rech"] !== "") {
    $whereClauses[] = "id_type_apporteur = '" . $_GET["id_type_apporteur_rech"] . "'";
}

/*
if (isset($_GET["nom_event_rech"]) && $_GET["nom_event_rech"] !== "null") {
    $whereClauses[] = "nom_event_rech = '" . $_GET["nom_event_rech"] . "'";
}
*/

if (isset($_GET["nom_apporteur_rech"]) && $_GET["nom_apporteur_rech"] !== "null") {
    $whereClauses[] = "nom_apporteur LIKE '%" . $_GET["nom_apporteur_rech"] . "%'";
}

if (isset($_GET["updated_min"]) && isset($_GET["updated_max"]) && $_GET["updated_min"] !== "") {
    $whereClauses[] = "updated BETWEEN '" . trim($_GET["updated_min"]) . "' AND '" . trim($_GET["updated_max"]) . "'";
}

/*
if (isset($_GET["art_nom"]) && $_GET["art_nom"] !== "") {
    $whereClauses[] = "art_nom LIKE '%" . replace_texte_speciaux2($_GET["art_nom"]) . "%'";
}
*/

$where_ = implode(' AND ', $whereClauses);

require('../ssp.class.php');
echo json_encode(SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where_));
