<?php

require_once("../../config.inc.php");

$table = "vw_article_stat_rest";

$primaryKey = 'art_code';

$columns = array(
    array('db' => 'art_abrev',   'dt' => 0),
    array('db' => 'art_nom',   'dt' => 1),
    array('db' => 'REST_2',    'dt' => 2),
    array('db' => 'dtmvt_qte_seuil', 'dt' => 3),
    array('db' => 'dtmvt_date_peremption', 'dt' => 4)
);


$where_ = '';
$sep = '';

if (isset($_GET["test_nbr_seuil_stock"])) {
    if ($_GET["test_nbr_seuil_stock"] != "") {
        $sep = ($where_ == '' ? '' : ' AND ');
        $where_ .= $sep . " test_nbr_seuil_stock =  '" . trim($_GET["test_nbr_seuil_stock"]) . "'";
    }
}

if (isset($_GET["test_nbr_jour_peremption"])) {
    if ($_GET["test_nbr_jour_peremption"] != "") {
        $sep = ($where_ == '' ? '' : ' AND ');
        $where_ .= $sep . " test_nbr_jour_peremption =  '" . trim($_GET["test_nbr_jour_peremption"]) . "'";
    }
}

if (isset($_GET["REST_2_sup_0"])) {
    if ($_GET["REST_2_sup_0"] != "") {
        $sep = ($where_ == '' ? '' : ' AND ');
        $where_ .= $sep . " REST_2 > 0 ";
    }
}




require('../ssp.class.php');
echo json_encode(SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where_));
