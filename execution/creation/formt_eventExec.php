<?php

require_once("../../config.inc.php");
require_once("../../session.php");

require_once(RP_MODELS . "t_event.class.php");

$t_event = new t_event();

$tab = array();

if (isset($_GET["code"])) {

    $tab["id_event"] = $_GET["code"];
    $tab["user_code"] = $_SESSION["user_code"];

    $t_event->supprimer($tab);

    $var_url = "suppr=" . $_GET['code'];
} else {


    $source = $_FILES["photo_event"];
    $_POST["photo_event"] =  uploadFichierPhoto($source, "photo_event", 0);
    //$_POST["photo_event"] =  uploadFichier($source);

    if ($_POST['id_event'] > 0) {
        $t_event->modifier($_POST, 1);
    } else {
        $t_event->ajouter($_POST, 1);
    }

    $var_url = "code=" . $_POST['id_event'];
}

header("location:" . HTTP_PAGE_CREATION . "listeevenement.php?" . $var_url);

exit();