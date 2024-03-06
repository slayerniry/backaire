<?php
require_once("../../config.inc.php");
require_once("../../session.php");
require_once(RP_MODELS . "parametre.class.php");
$parametre = new parametre();
if (isset($_GET["code"])) {
    $tab["param_key"] = $_GET["code"];
    $tab["param_key_upd"] = $_SESSION["param_key"] ?? "";
    $parametre->supprimer($tab);
    $var_url = "suppr=" . $_GET['code'];
} else {
    $_POST["param_key_upd"] = $_SESSION["param_key"] ?? "";
    if ($_POST['param_key'] != "") {


        /*$_POST['param_desc'] = replace_texte_speciaux($_POST['param_desc']) ;

        debug($_POST);*/

        $parametre->modifier($_POST);
    } else {
        $parametre->ajouter($_POST);
    }
    $var_url = "code=" . $_POST['param_key'];
}
header("location:" . HTTP_PAGE_ADMIN . "listeparametre.php?" . urlencode($var_url));
exit();
