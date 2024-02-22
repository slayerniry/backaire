<?php

require_once("../../config.inc.php");

$table = "vw_detmvt_rest";

$primaryKey = 'dtmvt_code';

$columns = array(
    array('db' => 'art_abrev',   'dt' => 0),
    array('db' => 'art_nom',    'dt' => 1),
    array('db' => 'dtmvt_qte', 'dt' => 2),

    array('db' => 'dtmvt_prix_achat', 'dt' => 3),
    array('db' => 'dtmvt_prix_vente', 'dt' => 4),

    array('db' => 'dtmvt_prix_vente_reel', 'dt' => 5),

    array('db' => 'mvt_date', 'dt' => 6),
    array('db' => 'mvt_date_time', 'dt' => 7),

    array('db' => 'mvt_type', 'dt' => 8),
    array('db' => 'dtmvt_date_peremption', 'dt' => 9),
    array('db' => 'dtmvt_verouille', 'dt' => 10),
    array('db' => 'dtmvt_code', 'dt' => 11),
    array('db' => 'updated', 'dt' => 12),
    array('db' => 'REST_2', 'dt' => 13),
    array('db' => 'mvt_code', 'dt' => 14),
    array('db' => 'art_code', 'dt' => 15),
    array('db' => 'mvt_montant_paye', 'dt' => 16),


);


$where_ = '';
$sep = '';
$art_abrev = "";

if (isset($_GET['art_abrev']) && $_GET['art_abrev'] != '') {

    $sep = ($where_ == '' ? '' : ' AND ');

    $tab = explode(",", trim($_GET['art_abrev']));

    if (count($tab) > 1) {

        foreach ($tab as $key => $value) {

            if ($value != "") {
                $art_abrev .= " art_abrev = '" . $value  . "' OR ";
                $art_abrev .= " art_abrev = '" . $value  . "' OR ";
            }
        }

        $art_abrev .= "''";

        $where_ .= $sep .  "(" . $art_abrev . ")";
    } else {
        $where_ .= $sep . " art_abrev LIKE  '%" . trim($_GET["art_abrev"]) . "' ";
    }
}



if ($_GET["mvt_type"] != "" && isset($_GET["mvt_type"])) {
    $sep = ($where_ == '' ? '' : ' AND ');
    $where_ .= $sep . " mvt_type =  '" . trim($_GET["mvt_type"]) . "'";
}

if ($_GET["cat_code"] != "" && isset($_GET["cat_code"])) {
    $sep = ($where_ == '' ? '' : ' AND ');
    $where_ .= $sep . " cat_code =  '" . trim($_GET["cat_code"]) . "'";
}

if ($_GET["art_code"] != "" && isset($_GET["art_code"])) {

    $tab = explode("|", $_GET["art_code"]);

    $sep = ($where_ == '' ? '' : ' AND ');
    $where_ .= $sep . " art_code =  '" . trim($tab[0]) . "'";
}


if ($_GET["mvt_date_min"] != "" && isset($_GET["mvt_date_min"])) {
    $sep = ($where_ == '' ? '' : ' AND ');
    $where_ .= $sep . " mvt_date BETWEEN  '" . trim($_GET["mvt_date_min"]) . "' AND '" . trim($_GET["mvt_date_max"]) . "'";
}


if (isset($_GET['mvt_montant_paye']) && $_GET['mvt_montant_paye'] == 1) {
    $sep = ($where_ == '' ? '' : ' AND ');
    $where_ .= $sep . ' mvt_montant_paye = 1 ';
} else {
    $sep = ($where_ == '' ? '' : ' AND ');
    $where_ .= $sep .  '(mvt_montant_paye IS NULL OR  mvt_montant_paye = 0 )';
}




require('../ssp.class.php');
echo json_encode(SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where_));
