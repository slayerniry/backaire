<?php

require_once("../../config.inc.php");

$table = "vw_detinventaire";

$primaryKey = 'detinv_code';

$columns = array(
    array('db' => 'inv_date',   'dt' => 0),
    array('db' => 'art_abrev',   'dt' => 1),
    array('db' => 'art_nom',    'dt' => 2),

    array('db' => 'detinv_qte_defectueux', 'dt' => 3),
    array('db' => 'detinv_qte_perime', 'dt' => 4),
    array('db' => 'detinv_qte_perdu2', 'dt' => 5),
    array('db' => 'detinv_qte_perdu', 'dt' => 6),
    array('db' => 'dtmvt_date_peremption', 'dt' => 7),
    array('db' => 'updated', 'dt' => 8)

);


$where_ = '';
$sep = '';



if ($_GET["art_code"] != "" && isset($_GET["art_code"])) {

    $tab = explode("|", $_GET["art_code"]);

    $sep = ($where_ == '' ? '' : ' AND ');
    $where_ .= $sep . " art_code =  '" . trim($tab[0]) . "'";
}


if ($_GET["inv_date_min"] != "" && isset($_GET["inv_date_min"])) {
    $sep = ($where_ == '' ? '' : ' AND ');
    $where_ .= $sep . " inv_date BETWEEN  '" . trim($_GET["inv_date_min"]) . "' AND '" . trim($_GET["inv_date_max"]) . "'";
}


require('../ssp.class.php');
echo json_encode(SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where_));
