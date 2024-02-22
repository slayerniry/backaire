<?php

ob_clean();

$tab_php_self = explode("/", $_SERVER['PHP_SELF']);

require_once($_SERVER["DOCUMENT_ROOT"] . "/" .  $tab_php_self[1] . "/" . "config.inc.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/" .  $tab_php_self[1] . "/" . "include/session.php");
require_once(RP_MODELS . "mvtdetailsortie.class.php");
require_once(RP_MODELS . "parametre.class.php");
require_once(RP_MODELS . "article.class.php");

$t = new ConvertNumberToText();

loadRessource("fr");

$mvtdetail = new mvtdetailsortie();
$article = new article;
$parametre = new parametre();

$tabMouvement = $article->lireTable($_POST["mvt_code"], "vw_mouvement", "mvt_code");
$detMvt =  $mvtdetail->lireFacture($_POST["mvt_code"]);
unset($detMvt["cnt"]);

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
require_once('pdf_header_no_head_foot.php');

$NOM_MONNAIE_COURT = $parametre->lireParKey("NOM_MONNAIE_COURT");

// set font
$pdf->setFont('times', '', 9);
$pdf->AddPage('P', 'A8');
// output the HTML content

use Carbon\Carbon;

$html = "<style>
            .titre {
                font-weight: bold; /* Rend le texte gras */
                font-size: 20px; /* Définit la taille de police à 12 pixels */
            }
        </style>";

$html .= '<div align="center" class="titre"  >'  . $parametre->lireParKey("NOM_SOCIETE_COURT") . '</div>
            <div align="center">'  . $parametre->lireParKey("ADRESSE_SOCIETE") . '<br>'  . $parametre->lireParKey("HEURE_OUVERTURE") . '</div>
            <table>            
                <tr>
                    <td><b>' . _getText("facebook") . '</b></td>
                    <td>'  . $parametre->lireParKey("FACEBOOK") . '</td>
                </tr>
                <tr>
                    <td><b>' . _getText("contact") . '</b></td>
                    <td>'  . formaterNumeroTelephone($parametre->lireParKey("CONTACT")) . '</td>
                </tr>
            </table>
            <div align="center"><b>'  . _getText("facture.numero") . '</b> '  . $tabMouvement["mvt_num_facture"]    .  "<br>"  . Carbon::now()->locale('fr_FR')->isoFormat('LLLL')  .  '</div>';

if (trim($tabMouvement["cli_nom"]) != "") {
    $html .= '<table>            
                <tr>
                    <td><b>' . _getText("doit") . '</b></td>
                    <td>' . $tabMouvement["cli_nom"] . '</td>
                </tr>
            </table>';
}


$html .= '<br><table><div align="center"><b>' . _getText("liste.article") . '</b></div>';

$total = 0;
$i = 1;
foreach ($detMvt as $key => $value) {
    $html .= '<tr>
                <td colspan="2"><b>' . $i .  ' - </b><i>'   . $value["art_nom"] . '</i></td>
            </tr>
            <tr>
                <td align="right">' . $value["dtmvt_qte"] . ' x ' . formatCurrency($value["dtmvt_prix_vente"]) . " " . $NOM_MONNAIE_COURT  .  '</td>
                <td align="right">' . formatCurrency($value["dtmvt_prix_vente_reel"]) . " " . $NOM_MONNAIE_COURT  .   '</td>
            </tr>';
    $i++;
    $total += $value["dtmvt_prix_vente_reel"];
}

$html .= '<tr>
            <td colspan="2"><hr></td>
            </tr>
         <tr>
            <td align="right"><b>' . _getText("total") . '</b></td>
            <td align="right"><b>' . formatCurrency($total)  . " " . $NOM_MONNAIE_COURT  . '</b></td>
         </tr>
         <tr>
            <td align="right"><b>' . _getText("montant.donne") . '</b></td>
            <td align="right">' . formatCurrency($tabMouvement["mvt_montant_donne"])   . " " . $NOM_MONNAIE_COURT  . '</td>
         </tr>
         <tr>
            <td align="right"><b>' . _getText("montant.remise") . '</b></td>
            <td align="right">' . formatCurrency($tabMouvement["mvt_montant_remise"])   . " " . $NOM_MONNAIE_COURT  . '</td>
         </tr>
        </table><br>';
$html .= '<div><b>' . _getText("arrete.facture.somme") . "</b> " .  $t->Convert($total) . " "  . $parametre->lireParKey("NOM_MONNAIE") . '</div>
<div align="center"><h3>' . _getText("merci") . '</h3></div>';


$pdf->writeHTML($html, false, 0, false, 0);

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

ob_end_clean();

//Close and output PDF document
$pdf->Output('facture_' . dateTimestamp() . '.pdf', 'I');
