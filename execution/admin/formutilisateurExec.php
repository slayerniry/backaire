<?php

require_once("../../config.inc.php");
require_once("../../session.php");

require_once(RP_MODELS . "utilisateur.class.php");

$utilisateur = new utilisateur();

if (isset($_GET["code"])) {

    $tab["user_code"] = $_GET["code"];
    $tab["user_code_upd"] = $_SESSION["user_code"];

    $utilisateur->supprimer($tab);

    $var_url = "suppr=" . $_GET['code'];
} else {

    $_POST["user_code_upd"] = $_SESSION["user_code"];

    if ($_POST['user_code'] > 0) {

        $utilisateur->modifier($_POST);
    } else {

        $utilisateur->ajouter($_POST);
    }

    $var_url = "code=" . $_POST['user_code'];
}

header("location:" . HTTP_PAGE_ADMIN . "listeutilisateur.php?" . urlencode($var_url));

exit();
