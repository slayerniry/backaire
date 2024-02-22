<?php

require_once("../config.inc.php");

require_once(RP_MODELS . "utilisateur.class.php");

$u = new utilisateur();

$critere["user_login"] = trim($_POST["user_login"]);
$critere["user_question"] = trim($_POST["user_question"]);
$critere["user_reponse"] = trim($_POST["user_reponse"]);
$tab = $u->lireParCritere($critere);

if ($tab["cnt"] == 1) {

    $u->connect->execute_req("UPDATE utilisateur SET user_pwd=md5(1) WHERE user_login = '" . $critere["user_login"] . "'");

    header('Location: ' . HTTP_MAIN . 'index.php?err=0&mdp=1&l=' .  $_POST["user_login"]);
} else {
    header('Location: ' . HTTP_MAIN . 'index.php?err=1&r=1&l=' .  $_POST["user_login"]);
}
