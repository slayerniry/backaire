<?php

ob_clean();

$tab_php_self = explode("/", $_SERVER['PHP_SELF']);

require_once($_SERVER["DOCUMENT_ROOT"] . "/" .  $tab_php_self[1] . "/" . "config.inc.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/" .  $tab_php_self[1] . "/" . "include/session.php");

require_once(RP_MODELS . "article.class.php");

loadRessource("fr");

$article = new article();



$data = $article->lireStat($_POST);

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
require_once('pdf_header.php');

$table_css = '<style>

                .gras{
                    font-weight: bold;
                }
                
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

                th {
                    border-left: 1px solid black;
                    border-top: 1px solid black;
                    padding: 3px 3px  3px 3px ;  
                    vertical-align:central;
                }

                .designation{
                    width:300px; 
                    text-align:left;
                    height:20px;
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

$html = '<h1>' . _getText("titre.article.stat.pdf") . '</h1>';

$html = '<h4>' . $data["cnt"] . " " . _getText("articles") . '</h4>';


$html .= '
        <table  border="0" cellspacing="1" cellpadding="2"> 
            <thead>
            <tr >
                <th class="ligne1" style="" >' . _getText("categorie") . '</th>
                <th  class="ligne1 designation" >' . _getText("designation") . '</th>';



$html .= '   <th class="ligne1 note_coef" style="" >' . _getText("qte.seuil.court") . '</th>
                <th class="ligne1 note_coef" style="" >' . _getText("qte_dispo_br_court") . '</th>
                <th class="ligne1  note_coef" style="" >' . _getText("qte.pack.court") . '</th>

                <th class="ligne1  note_coef" style="" >' . _getText("nbr.jour.peremption.court") . '</th>
                <th class="ligne1  note_coef" style="" >' . _getText("nbr.jour.avant.peremption") . '</th>

                <th class="ligne1  note_coef" style="" >' . _getText("alert.stock") . '</th>
                <th class="ligne1 note_coef colonne_fin">' . _getText("alert.dp") . '</th>
             </tr>
             </thead>
             <tbody>';

for ($i = 0; $i < $data["cnt"]; $i++) {

    $modulo = $i % 2;

    $html .= ' <tr  >
                    <td class="" >' . replace_texte_etat($data[$i]['cat_nom']) . ' </td>
                    <td class="designation" >' . replace_texte_etat('' . $data[$i]['art_abrev'] . ' -  ' .  $data[$i]['art_nom'])   . '</td>';

    $html .= '      <td class="note_coef" style="" >' . $data[$i]["dtmvt_qte_seuil"] . '</td>
                    <td class="note_coef" style="" >' . $data[$i]["REST"] . '</td>
                    <td class=" note_coef" style="" >' . formatCurrency($data[$i]["rest_qte_pack"])  . '</td>

                    <td class=" note_coef" style="" >' . $data[$i]["dtmvt_nbr_jour_peremption"] . '</td>
                    <td class=" note_coef" style="" >' . $data[$i]["nbr_avant_nbr_jour_peremption"] . '</td>
                    <td class=" note_coef" style="" >' . $data[$i]["test_nbr_seuil_stock"] . '</td>
                    <td class=" note_coef colonne_fin">' . $data[$i]["test_nbr_jour_peremption"] . '</td>
                 </tr>';
} //fin for

$html .=   '<tr><td colspan="9" style="border-left: 1px solid white;border-top: 1px solid black;"></td></tr>';

$html .=   '</tbody>
    </table>';


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
