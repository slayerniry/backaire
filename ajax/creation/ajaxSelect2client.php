<?php

require_once("../../config.inc.php");

require_once(RP_MODELS . "client.class.php");


$client = new client();

$json = [];


if (!isset($_GET['searchTerm'])) {
    $json = [];
} elseif (($_GET['searchTerm']) == "") {
    $json = [];
} else {


    $critere["cli_nom"] = replace_texte_speciaux($_GET["searchTerm"]);
    $data = $client->lireParCritere($critere);


    for ($i = 0; $i < $data['cnt']; $i++) {
        $json[] = ['id' => $data[$i]['cli_code'], 'text' => replace_texte_etat($data[$i]['cli_nom'])  . " " .  $data[$i]['cli_phone']];
    }
}

echo json_encode($json);
