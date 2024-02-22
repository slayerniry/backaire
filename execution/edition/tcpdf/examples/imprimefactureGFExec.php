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
$pdf->setFont('times', '', 12);
$pdf->AddPage('P', 'A5');
// output the HTML content

use Carbon\Carbon;

$html = '<table border="0" cellpadding="1" cellspacing="1" width="100%" >
                    <tr>
                        <td  colspan="2" ><h3>' . $parametre->lireParKey("NOM_SOCIETE") . '</h3></td>  
                        <td width="15%"><b>' . _getText("facture.numero") . '</b></td>
                        <td width="25%">' .  $tabMouvement["mvt_num_facture"] . '</td>
                    </tr>
                    <tr>
                        <td colspan="2" ><span>' . $parametre->lireParKey("DESC_SOCIETE") . '</span></td>
                        <td ><b>' . _getText("date") . ' </b></td>
                        <td>' . Carbon::now()->locale('fr_FR')->isoFormat('LLL') . '</td>
                    </tr>
                    <tr>
                        <td colspan="2" ><span>' . $parametre->lireParKey("ADRESSE_SOCIETE") . '</span></td>
                        <td><b>' . _getText("doit") . '</b></td>
                        <td>' . ($tabMouvement["cli_nom"] == "" ? "-" : $tabMouvement["cli_nom"]) . '</td>
                    </tr>
                    <tr>
                        <td ><b>' . _getText("nif") . '</b></td>
                        <td colspan="3">' . $parametre->lireParKey("NIF") . '</td>
                        
                    </tr>

                    <tr>
                        <td><b>' . _getText("stat") . '</b></td>
                        <td  colspan="3">' . $parametre->lireParKey("STAT")  . '</td>
                        
                    </tr>
                    <tr>
                        <td><b>' . _getText("contact") . '</b></td>
                        <td  colspan="">' . formaterNumeroTelephone($parametre->lireParKey("CONTACT")) .   '</td>
                        <td></td>
                        <td></td> 
                    </tr>  
                    <tr>
                         <td ><b>' . _getText("facebook") . '</b></td>
                        <td >' . $parametre->lireParKey("FACEBOOK") . '</td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
                <div style="height:100px"></div>';



$html .= '<table border="0" cellpadding="1" cellspacing="1"  >
            <thead>
                <tr>
                    
                    <td width="50%" ><b>' . _getText("designation") . '</b></td>
                    <td width="14%"align="right"><b>' . _getText("qte") . '</b></td>
                    <td width="18%" align="right"><b>' . _getText("pucout") . '</b></td>
                    <td width="18%" align="right"><b>' . _getText("montant.text") . '</b></td>
                </tr>
                <tr>
                    <td colspan="4" ><hr></td>
                </tr>
            </thead>
            <tbody>';

$total = 0;
$i = 1;
foreach ($detMvt as $key => $value) {
    $html .= '<tr>                
                <td width="50%" ><b>' . $i . ' - </b>' . $value["art_nom"] . '</td>
                <td width="14%" align="right">' . $value["dtmvt_qte"] . '</td>
                <td width="18%" align="right">' . formatCurrency($value["dtmvt_prix_vente"])  . " " . $NOM_MONNAIE_COURT  .  '</td>
                <td width="18%" align="right">' . formatCurrency($value["dtmvt_prix_vente_reel"]) . " " . $NOM_MONNAIE_COURT  .  '</td>
            </tr> ';
    $i++;
    $total += $value["dtmvt_prix_vente_reel"];
}

$html .= '  <tr>
                <td colspan="4" ><hr></td>
            </tr>
            <tr>
                <td colspan="2" align="right"><b>' . _getText("total") . '</b></td>
                <td colspan="2" align="right"><b>' . formatCurrency($total)  . " " . $NOM_MONNAIE_COURT  . '</b></td>
            </tr>
            <tr>
                <td colspan="2" align="right"><b>' . _getText("montant.donne") . '</b></td>
                <td colspan="2" align="right"><b>' . formatCurrency($tabMouvement["mvt_montant_donne"])   . " " . $NOM_MONNAIE_COURT  . '</b></td>
            </tr>  
            <tr>
                <td colspan="2" align="right"><b>' . _getText("montant.remise") . '</b></td>
                <td colspan="2" align="right"><b>' . formatCurrency($tabMouvement["mvt_montant_remise"])   . " " . $NOM_MONNAIE_COURT  . '</b></td>
            </tr>
            <tr>
                <td colspan="2" align="right"><b>' . _getText("mode") . '</b></td>
                <td colspan="2" align="right"><span>' . ($tabMouvement["mod_nom"])  . '</span></td>
            </tr>  
            <tr>
                <td colspan="4" ></td>
            </tr>
            <tr>
                <td colspan="4" ><b>' . _getText("arrete.facture.somme") . '</b></td>
            </tr>
            <tr>
                <td colspan="4" >' . $t->Convert($total) . " "  . $parametre->lireParKey("NOM_MONNAIE") .  '</td>
            </tr>
            ';

$html .= '  <tr>
                <td colspan="4" align="right" ></td>
            </tr>
            <tr>
                <td colspan="2" align="center" >' . _getText("responsabe") . '</td>
                <td colspan="2" align="center" >' . _getText("client") . '</td>
            </tr>
            
            </tbody>
        </table>';


$pdf->writeHTML($html, false, 0, false, 0);

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

ob_end_clean();

//Close and output PDF document
$pdf->Output('facture_' . dateTimestamp() . '.pdf', 'I');
