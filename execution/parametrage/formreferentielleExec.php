<?php 

//$tab_php_self = explode("/", $_SERVER['PHP_SELF']);

//require_once($_SERVER["DOCUMENT_ROOT"] . "/" .  $tab_php_self[1] . "/" . "config.inc.php");


require_once("../../config.inc.php");
require_once("../../session.php");

require_once(RP_MODELS . "referentielle.class.php");
require_once(RP_MODELS . "type_reference.class.php");


$referentielle = new referentielle();
$type_reference = new type_reference();

if(isset($_GET["code"])){
    
    $type = $_GET["type"];

    $tab["ref_code"]= $_GET["code"] ;
    $tab["user_code"]= $_SESSION["user_code"] ;
    
    $critereRef["ref_code"]= $_GET["code"] ;
    $tableau['referentielle'] = $referentielle->lireParCritere($critereRef);
    
    $referentielle->supprimer($tab);

    //type
    $critere["tpr_code"] =  $type  ;
    $tableau['type_reference'] = $type_reference->lireParCritere($critere);

    $tab["tpr_table"] = $tableau['type_reference'][0]['tpr_table'];
    
    
    $tab["user_code"] = $_SESSION["user_code"] ;
    $tab["ref_abrev"] = $tableau['referentielle'][0]['ref_abrev'];
    
    $referentielle->delete_table_destination($tab);
    
}else{
    
    $_POST["user_code_upd"] = $_SESSION["user_code"] ;
    
    //type
    $critere["tpr_code"] = $_POST["tpr_code"] ;
    $tableau['type_reference'] = $type_reference->lireParCritere($critere);


    $tab = $_POST ;
    $tab["tpr_table"] = $tableau['type_reference'][0]['tpr_table'];
    $tab["user_code"] = $_SESSION["user_code"] ;
    $tab["tpr_champ"] = $tableau['type_reference'][0]['tpr_champ'];
    
    $tab["tpr_annee_scolaire"] = $tableau['type_reference'][0]['tpr_annee_scolaire'];
    
    
    if($_POST['ref_code']>0){
        $referentielle->modifier($_POST);
        
        $referentielle->update_table_destination($tab);
        
    }else{
        
        $referentielle->ajouter($_POST);
        
        $referentielle->insert_table_destination($tab);
        
    } 
    
    
    $type = $_POST["tpr_code"];
    
}


header("location:" . HTTP_PAGE_PARAM . "listeautre.php?type=" . $type );
    
exit();
	
?>
