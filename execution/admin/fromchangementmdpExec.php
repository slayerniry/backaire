<?php 

require_once("../../config.inc.php");
require_once("../../session.php");

require_once(RP_MODELS . "utilisateur.class.php");

$utilisateur = new utilisateur();

$critere["user_code"]= $_POST["user_code"];
$critere["user_pwd"]= md5($_POST["user_pwd"]);
$tab = $utilisateur->lireParCritere($critere) ;

if( $tab["cnt"]>0 ){
    
    if(  trim($_POST["user_pwd_new"]) ==  trim($_POST["user_pwd_confirm"])){
        
        $data["user_code"] = $_SESSION["user_code"];
        $data["user_pwd"] = trim($_POST["user_pwd_new"]);
        $data["user_question"] = trim($_POST["user_question"]);
        $data["user_reponse"] = trim($_POST["user_reponse"]);
        
        $utilisateur->modifierpwd($data);
         
        header("location:" . HTTP_PAGE . "index.php?e=1");
        
    }else{
        
        header("location:" . HTTP_PAGE . "index.php?e=2");
        
    }
    
}else{
    
    header("location:" . HTTP_PAGE . "index.php?e=0");
}
