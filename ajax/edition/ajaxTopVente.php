<?php

require_once("../../config.inc.php");

require_once(RP_MODELS . "mvtdetailsortie.class.php");

loadRessource("fr");

$mvtdetail = new mvtdetailsortie();
$tab = array();
$data = array();

if ($_GET["type"] == "N") {
    $_POST['TRI'] = "SUM( dtmvt_qte )";
} else {
    $_POST['TRI'] = "SUM( dtmvt_prix_vente_reel )";
}

$_POST['ASCDESC'] = "DESC";
$_POST["mvt_type"] = "S";
$tab = $mvtdetail->lireSommeRESTParCritere($_POST);
//unset($tab["cnt"]);

for ($i = 0; $i < $tab["cnt"]; $i++) {
    $data[$i]["art_nom"] =  replace_texte_etat($tab[$i]["art_nom"]);
    $data[$i]["sum_qte"] =  $tab[$i]["sum_qte"];
    $data[$i]["sum_montant"] =  $tab[$i]["sum_montant"];
}

header('Content-Type: application/json; Charset="UTF-8"');
echo json_encode($data);
