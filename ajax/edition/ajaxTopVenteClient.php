<?php

require_once("../../config.inc.php");

require_once(RP_MODELS . "mvtdetailsortie.class.php");

loadRessource("fr");

$mvtdetail = new mvtdetailsortie();
$tab = array();
$data = array();


$_POST['ASCDESC'] = "DESC";
$_POST["mvt_type"] = "S";
$tab = $mvtdetail->lireSommeClientParCritere($_POST);
//unset($tab["cnt"]);

for ($i = 0; $i < $tab["cnt"]; $i++) {
    $data[$i]["cli_nom"] =  replace_texte_etat($tab[$i]["cli_nom"]);
    $data[$i]["sum_qte"] =  $tab[$i]["sum_qte"];
    $data[$i]["sum_montant"] =  $tab[$i]["sum_montant"];
}

header('Content-Type: application/json; Charset="UTF-8"');
echo json_encode($data);
