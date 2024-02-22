<?php

require_once("../../config.inc.php");
require_once("../../session.php");

require_once(RP_MODELS . "mvtdetail.class.php");
require_once(RP_MODELS . "detinventaire.class.php");

$mvtdetail = new mvtdetail();
$detinventaire = new detinventaire();
$mvtdetail->verouiller($_POST);

$tab = array();

if ($_POST["dtmvt_verouille"] == 0) {
    /** 
     * initialisé 0 total perdu
     *  */
    $critere["dtmvt_code_E"]  =  $_POST["dtmvt_code"];
    $tabdetInv = $detinventaire->lireParCritere($critere);

    if ($tabdetInv["cnt"] > 0) {

        $tab["detinv_code"] = $tabdetInv[0]["detinv_code"];
        $tab['dtmvt_code_E'] = $_POST["dtmvt_code"];
        $tab['detinv_qte_defectueux'] = 0;
        $tab['detinv_qte_perime'] = 0;
        $tab['detinv_qte_perdu2'] = 0;
        $tab['detinv_qte_dispo'] = 0;
        $tab['detinv_qte_perdu'] = 0;
        $tab['inv_code'] = $tabdetInv[0]["inv_code"];
        $tab['art_code']  = $tabdetInv[0]["art_code"];
        $tab['detinv_qte'] = $tabdetInv[0]["detinv_qte"];

        $detinventaire->modifier($tab);
        $var_url = "code=" . $tabdetInv[0]["detinv_code"] . "&inv_code=" . $tabdetInv[0]["inv_code"] . "&art_code=" .  $tabdetInv[0]["art_code"];
        header("location:" . HTTP_PAGE_CREATION . "listedetinv.php?" . $var_url);
        exit();
    }
}


$var_url = "mvt_type=" . $_POST["mvt_type"] . "&art_code=" . $_POST["art_code"];

header("location:" . HTTP_PAGE_EDITION . "formehistoriqueES.php?" . $var_url);

exit();
