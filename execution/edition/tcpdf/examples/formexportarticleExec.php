<?php

ob_clean();

$tab_php_self = explode("/", $_SERVER['PHP_SELF']);

//require_once("../../../../config.inc.php");

require_once($_SERVER["DOCUMENT_ROOT"] . "/" .  $tab_php_self[1] . "/" . "config.inc.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/" .  $tab_php_self[1] . "/" . "include/session.php");

require_once(RP_MODELS . "article.class.php");


loadRessource("fr");


$article = new article();


$data = $article->lireParCritere($_POST);


// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
require_once('pdf_header.php');


$table_css = '<style>
                
                .ligne1{
                    border-top: 1px solid black;
                    vertical-align: middle;
                    font-weight:bold;
                    text-align:center;
                    background-color: #ccc ;
                }
                
                .colonne_fin{
                   
                    border-right: 1px solid black;
                    
                }
        
                td {
                    border-left: 1px solid black;
                    border-top: 1px solid black;
                    padding: 3px 3px  3px 3px ;  
                    vertical-align:central;
                }
                
                .note{
                    width:100px; 
                    text-align:right;
                    height:20px;
                    vertical-align:central;
                    
                }
                
                .note_coef{
                    width:60px; 
                    text-align:right;
                    height:20px;
                    vertical-align:central;
                    
                }
                
                .sur_20{
                    width:30px; 
                    text-align:center;
                    height:20px;
                    vertical-align:central;
                    
                }
                
                </style>';





// add a page
$pdf->AddPage();

// define some HTML content with style



switch ($_GET["pv"]) {
    case 0:

        $html = '<h1>' . _getText("titre.article.pdf") . '</h1>';

        break;
    case 1:
        $html = '<h1>' . _getText("titre.article.pdf") . '</h1>';
        break;
    case 2:
        $html = '<h1>' . _getText("titre.article.inventaire") . '</h1>';
        break;

    default:
        # code...
        break;
}

foreach ($_POST as $key => $value) {
    switch ($key) {
        case 'cat_code':

            if ($value != "") {

                $tabCat = $article->lireTable($value, "categorie", "cat_code");

                $html .= "<h4><b>" . _getText("categorie") . " : </b>" . $tabCat["cat_nom"] . "</h4>";
            }


            break;

        case 'fou_code':

            if ($value != "") {

                $tabCat = $article->lireTable($value, "fournisseur", "fou_code");

                $html .= "<h4><b>" . _getText("fournisseur") . " : </b>" . $tabCat["fou_nom"] . "</h4>";
            }


            break;

        default:
            # code...
            break;
    }
}




$html .= '
        <table  border="0" cellspacing="1" cellpadding="2"> 
            <thead>
            <tr >
                <td class="ligne1" style="" >' . _getText("abrev") . '</td>
                <td style="width:300px" class="ligne1" >' . _getText("designation") . '</td>';

if ($_GET["pv"] == 0) {
    $html .= '   <td class="ligne1 note" style="" >' . _getText("total.entre") . '</td>
                <td class="ligne1 note" style="" >' . _getText("total.sortie") . '</td>
                <td class="ligne1 note" style="" >' . _getText("perdu") . '</td>
                <td class="ligne1 colonne_fin note" style="" >' . _getText("stock.disponible") . '</td>
             ';
} else if ($_GET["pv"] == 1) {
    $html .= '<td class="ligne1  note" style="" >' . _getText("stock.disponible") . '</td>
             <td class="ligne1 colonne_fin " style="" >' . _getText("prix.vente") . '</td>
             ';
} else if ($_GET["pv"] == 2) {

    $html .= '   <td class="ligne1 note" style="" >' . _getText("total.entre") . '</td>
                <td class="ligne1 note" style="" >' . _getText("total.sortie") . '</td>
                <td class="ligne1  note" style="" >' . _getText("stock.disponible") . '</td>
                <td class="ligne1 colonne_fin">' . _getText("physique") . '</td>
             ';
}

$html .= '</tr></thead><tbody>';

for ($i = 0; $i < $data["cnt"]; $i++) {

    $modulo = $i % 2;

    $html .= ' <tr  >
                    <td class="" >' . replace_texte_etat($data[$i]["art_abrev"]) . ' </td>
                    <td style="width:300px" >' . replace_texte_etat($data[$i]["art_nom"])   . '</td>';

    if ($_GET["pv"] == 0) {

        $html .= '<td class="note" style="" >' . $data[$i]["SOMME_E"] . '</td>
                    <td class="note" style="" >' . $data[$i]["SOMME_S"] . '</td>
                    <td class="note" style="" >' . $data[$i]["PERDU"] . '</td>
                    <td class="colonne_fin note" style="" >' . $data[$i]["REST"] . '</td>
                 </tr>';
    } else if ($_GET["pv"] == 1) {
        /** TODO prix_ref taloha */

        $html .= ' <td class="note" style="" >' . $data[$i]["REST"] . '</td>
                    <td align="right" class="colonne_fin " style="" >' .  formatcurrency($data[$i]["dtmvt_prix_vente"])  . '</td>
                 </tr>';
    } else if ($_GET["pv"] == 2) {

        $html .= '      <td class="note" style="" >' . $data[$i]["SOMME_E"] . '</td>
                    <td class="note" style="" >' . $data[$i]["SOMME_S"] . '</td>
                    <td class=" note" style="" >' . $data[$i]["REST"] . '</td>
                    <td class="colonne_fin"></td>
                 </tr>';
    }
} //fin for

switch ($_GET["pv"]) {
    case 0:

        $html .=   '<tr><td colspan="6" style="border-left: 1px solid white;border-top: 1px solid black;"></td></tr>';

        break;

    case 1:

        $html .=   '<tr><td colspan="5" style="border-left: 1px solid white;border-top: 1px solid black;"></td></tr>';

        break;

    case 2:

        $html .=   '<tr><td colspan="6" style="border-left: 1px solid white;border-top: 1px solid black;"></td></tr>';

        break;

    default:
        # code...
        break;
}

$html .= '</tbody></table>';


// output the HTML content
$pdf->writeHTML($table_css .  $html, false, 0, false, 0);



// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

ob_end_clean();

//Close and output PDF document
$pdf->Output('article_' . dateTimestamp() . '.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
