<?php
require_once("../../config.inc.php");
require_once("../../session.php");

require_once(RP_MODELS . "t_event.class.php");
require_once(RP_MODELS . "parametre.class.php");

$parametre = new parametre();

$t_event = new t_event();
$tab = array();
if (isset($_GET["code"])) {
    $tab["id_event"] = $_GET["code"];
    $tab["user_code"] = $_SESSION["user_code"];
    $t_event->supprimer($tab);
    $var_url = "suppr=" . $_GET['code'];
} else {
    $source = $_FILES["photo_event"];

   $typ_photo = "";

   if($_POST["id_type_event"] ==  $parametre->lireParKey("CODE_TYPE_ACTIVITES") ){
    $typ_photo = "photo_event";
   }

   if($_POST["id_type_event"] ==  $parametre->lireParKey("CODE_TYPE_TEAMS") ){
    $typ_photo = "photo_team";
   } 

   if($_POST["id_type_event"] == $parametre->lireParKey("CODE_TYPE_BARNER")){
    $typ_photo = "photo_barner";
   }

    $_POST["photo_event"] =  uploadFichierPhoto($source, $typ_photo, 0);


    if ($_POST['id_event'] > 0) {
        $t_event->modifier($_POST, 1);
    } else {
        $t_event->ajouter($_POST, 1);
    }
    $var_url = "code=" . $_POST['id_event'];
    $var_url .= "&te=" . $_POST['id_type_event'];
}
header("location:" . HTTP_PAGE_CREATION . "listeevenement.php?" . $var_url);
exit();
