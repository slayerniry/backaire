<?php 

require_once("../config.inc.php");


switch ($_GET["f"]) {
    case "p":
        $filename = "professeur.csv";
        break;
    case "m":
        $filename = "";
        break;
    case "e":
        $filename = "";
        break;
    case "n":
        $filename = "";
        break;    
}


//die(HTTP_IMPORT . $filename);

header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=" . RP_IMPORT . basename($filename) );
header("Content-Transfer-Encoding: binary ");


?>