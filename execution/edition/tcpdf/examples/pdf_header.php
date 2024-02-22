<?php

require_once(RP_MODELS . "parametre.class.php");

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{

    //Page header
    public function Header()
    {

        $parametre = new parametre();


        // set font
        $this->SetFont('helvetica', '', 10);

        // create some HTML content
        $html = '<table width="100%">
                    <tr>
                        <td><h1>' . $parametre->lireParKey("NOM_SOCIETE") . '</h1></td>
                        <td></td>
                        <td align="right"><b>' . _getText("date.edition") . ': </b></td>
                        <td>' . (laDate() . " " . date('h')  . " h " . date('i') . " " .  date('a')) . '</td>
                    </tr> 
                    <tr>
                        <td colspan="4"><h2>' . $parametre->lireParKey("ADRESSE_SOCIETE") . '</h2></td>
                    </tr>
                </table>
                <hr>';
        // output the HTML content
        $this->writeHTML($html, true, 0, true, 0);
    }

    // Page footer
    public function Footer()
    {

        $parametre = new parametre();
        // create some HTML content
        $html = '<div style="bacground-color:black;height:2px">' .  $parametre->lireParKey("NOM_SOCIETE") . '</div>
                <table width="100%">
                    <tr>
                        <td></td>
                        <td></td>
                        <td align="right"><b>' . _getText("date.edition") . ': </b></td>
                        <td>' . (laDate() . " " . date('h')  . " h " . date('i') . " " .  date('a')) . '</td>
                    </tr> 
                </table>';

        // output the HTML content
        $this->writeHTML($html, true, 0, true, 0);
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF("L", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 061', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('helvetica', '', 10);
