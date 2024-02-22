<?php

ob_clean();

$tab_php_self = explode("/", $_SERVER['PHP_SELF']);

require_once($_SERVER["DOCUMENT_ROOT"] . "/" .  $tab_php_self[1] . "/" . "config.inc.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/" .  $tab_php_self[1] . "/" . "include/session.php");
require_once(RP_MODELS . "article.class.php");

use Carbon\Carbon;

loadRessource("fr");

/***
 * 
 * Date long pour nom de fichier
 * 
 */
$date_long = (Carbon::now()->locale('fr_FR')->isoFormat('LLLL'));

$tab = array();

$tab = explode(" ", $date_long);

$txt = "";
foreach ($tab as $key => $value) {
    $txt .= "_" . $value . "";
}

$txt = "Stat" .   str_replace(":", "_", $txt);

loadRessource("fr");

$article = new article();

if ($_GET["pv"] == 0) {

    $data = $article->lireStat($_POST);

    $tab = array();

    $tab[0]["cat_nom"] = utf8_encode(replace_texte_speciaux_excel(_getText("categorie")));
    $tab[0]["art_nom"] = utf8_encode(replace_texte_speciaux_excel(_getText("designation")));
    $tab[0]["dtmvt_qte_seuil"] = utf8_encode(replace_texte_speciaux_excel(_getText("qte.seuil")));
    $tab[0]["REST"] = utf8_encode(replace_texte_speciaux_excel(_getText("qte_dispo")));
    $tab[0]["rest_qte_pack"] = utf8_encode(replace_texte_speciaux_excel(_getText("qte.pack")));
    $tab[0]["dtmvt_nbr_jour_peremption"] = utf8_encode(replace_texte_speciaux_excel(_getText("nbr.jour.peremption")));
    $tab[0]["nbr_avant_nbr_jour_peremption"] = utf8_encode(replace_texte_speciaux_excel(_getText("nbr.jour.peremption")));

    $tab[0]["dtmvt_date_peremption"] = utf8_encode(replace_texte_speciaux_excel(_getText("date.peremption")));

    $tab[0]["test_nbr_seuil_stock"] = utf8_encode(replace_texte_speciaux_excel(_getText("alert.stock.long")));
    $tab[0]["test_nbr_jour_peremption"] = utf8_encode(replace_texte_speciaux_excel(_getText("alert.dp.long")));

    for ($i = 0; $i < $data["cnt"]; $i++) {
        $tab[$i + 1]["cat_nom"] =  utf8_encode(replace_texte_speciaux_excel($data[$i]["cat_nom"]));
        $tab[$i + 1]["art_nom"] = utf8_encode(replace_texte_speciaux_excel($data[$i]["art_nom"]))  . " - " .  $data[$i]["art_abrev"];
        $tab[$i + 1]["dtmvt_qte_seuil"] = ($data[$i]["dtmvt_qte_seuil"] > 0 ? $data[$i]["dtmvt_qte_seuil"] : "0");
        $tab[$i + 1]["REST"] = ($data[$i]["REST"] > 0 ? $data[$i]["REST"] : "0");
        $tab[$i + 1]["rest_qte_pack"] = ($data[$i]["rest_qte_pack"] > 0 ? $data[$i]["rest_qte_pack"] : "0");
        $tab[$i + 1]["dtmvt_nbr_jour_peremption"] = ($data[$i]["dtmvt_nbr_jour_peremption"] > 0 ? $data[$i]["dtmvt_nbr_jour_peremption"] : "0");
        $tab[$i + 1]["nbr_avant_nbr_jour_peremption"] = ($data[$i]["nbr_avant_nbr_jour_peremption"] > 0 ? $data[$i]["nbr_avant_nbr_jour_peremption"] : "0");

        $tab[$i + 1]["dtmvt_date_peremption"] = convertDateFormatGregorien($data[$i]["dtmvt_date_peremption"]);

        $tab[$i + 1]["test_nbr_seuil_stock"] = ($data[$i]["test_nbr_seuil_stock"] > 0 ? $data[$i]["test_nbr_seuil_stock"] : "0");
        $tab[$i + 1]["test_nbr_jour_peremption"] = ($data[$i]["test_nbr_jour_peremption"] > 0 ? $data[$i]["test_nbr_jour_peremption"] : "0");
    } // for i
}

if ($_GET["pv"] == 1) {
    $tab = array();

    $data = $article->lireParCritere($_POST);

    $tab[0]["cat_nom"] = utf8_encode(replace_texte_speciaux_excel(_getText("categorie")));
    $tab[0]["art_nom"] = utf8_encode(replace_texte_speciaux_excel(_getText("designation")));
    $tab[0]["dtmvt_prix_vente"] = utf8_encode(replace_texte_speciaux_excel(_getText("prix.vente")));
    $tab[0]["SOMME_E"] = utf8_encode(replace_texte_speciaux_excel(_getText("total.entre")));
    $tab[0]["SOMME_S"] = utf8_encode(replace_texte_speciaux_excel(_getText("total.sortie")));
    $tab[0]["PERDU"] = utf8_encode(replace_texte_speciaux_excel(_getText("qte_perdu_long")));
    $tab[0]["REST"] = utf8_encode(replace_texte_speciaux_excel(_getText("stock.disponible")));

    for ($i = 0; $i < $data["cnt"]; $i++) {
        $tab[$i + 1]["cat_nom"] =  utf8_encode(replace_texte_speciaux_excel($data[$i]["cat_nom"]));
        $tab[$i + 1]["art_nom"] = utf8_encode(replace_texte_speciaux_excel($data[$i]["art_nom"]))  . " - " .  $data[$i]["art_abrev"];
        $tab[$i + 1]["dtmvt_prix_vente"] = ($data[$i]["dtmvt_prix_vente"] > 0 ? $data[$i]["dtmvt_prix_vente"] : "0");
        $tab[$i + 1]["SOMME_E"] = ($data[$i]["SOMME_E"] > 0 ? $data[$i]["SOMME_E"] : "0");
        $tab[$i + 1]["SOMME_S"] = ($data[$i]["SOMME_S"] > 0 ? $data[$i]["SOMME_S"] : "0");
        $tab[$i + 1]["PERDU"] = ($data[$i]["PERDU"] > 0 ? $data[$i]["PERDU"] : "0");
        $tab[$i + 1]["REST"] = ($data[$i]["REST"] > 0 ? $data[$i]["REST"] : "0");
    }
}

exportExcel($tab);
