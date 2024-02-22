<?php

require_once("../../config.inc.php");

require_once(RP_MODELS . "mouvement.class.php");

use Carbon\Carbon;

loadRessource("fr");

$mouvement = new mouvement();
$tab = array();
$data = array();

$tab_art_code = explode("|", $_GET["art_code"]);
$critere["art_code"] = $tab_art_code[0];
if ($critere["art_code"] > 0) {

    $critere["mvt_date_min"] = $_GET["mvt_date_min"];
    $critere["mvt_date_max"] = $_GET["mvt_date_max"];

    $tab = $mouvement->lireHistorique($critere);
    for ($i = 0; $i < $tab["cnt"]; $i++) {
        $data[$i]["daty"] =  Carbon::parse($tab[$i]["daty"])->locale('fr_FR')->isoFormat('DD MMMM YYYY');

        $data[$i]["DP_E"] =  convertDateFormatGregorien($tab[$i]["DP_E"]);
        $data[$i]["DP_S"] = convertDateFormatGregorien($tab[$i]["DP_S"]);
        $data[$i]["DP_I"] =  convertDateFormatGregorien($tab[$i]["DP_I"]);

        $data[$i]["qte_E"] =  $tab[$i]["qte_E"];
        $data[$i]["qte_S"] =  $tab[$i]["qte_S"];
        $data[$i]["qte_I"] =  $tab[$i]["qte_I"];
    }
}

header('Content-Type: application/json; Charset="UTF-8"');
echo json_encode($data);
