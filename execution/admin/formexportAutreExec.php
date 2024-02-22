<?php 

require_once("../../config.inc.php");
require_once("../../session.php");

require_once(RP_MODELS . "referentielle.class.php");


$referentielle = new referentielle();


$file = "REF";

$critere['NOT_tpr_code'] = "SOA";
$tab["referentielle"] = $referentielle->lireParCritere($critere);

unset($tab["referentielle"]["cnt"]);

ob_clean();

$file .= dateTimestamp() . ".csv";
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename='.$file);

$sep = ";";

$content =  "code". $sep ." "
        .   "abrev". $sep ." "
        .   "nom". $sep ." "
        .   "flag". $sep ." "
        .   "\n";
   

foreach ($tab["referentielle"] as $key => $value) {

    $content .=     $value["tpr_code"]    .  " ". $sep ." "
                .   $value["ref_abrev"]       .  " ". $sep ." "
                .   $value["ref_champ1"]      .  " ". $sep ." "
                .   ($value["ref_champ2"])    .  "\n";
   
                
}//for each 

echo $content;

?>
