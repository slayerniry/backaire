<?php
require_once("../../config.inc.php");
if( $_POST["lg"] == ""){
    $res = array();
    $res["chemin"]= "";
    $res["text"] = "vide";
    echo json_encode($res);
    exit();
}
// Chemin du fichier texte sur le serveur
$chemin_fichier =  RP_SITE_RESSOURCE . "" . $_POST["lg"]   . "/langue.res" ; 
$chemin_http_fichier =  HTTP_SITE_RESSOURCE . "" . $_POST["lg"]   . "/langue.res" ; 
$res = array();
$res["chemin"]= $chemin_http_fichier ;
// Vérifier si le fichier existe
if (file_exists($chemin_fichier)) {
    // Lire le contenu du fichier
    $contenu_fichier = file_get_contents($chemin_fichier);
    // Échapper les caractères spéciaux pour affichage dans un textarea
    $contenu_fichier_escaped = ($contenu_fichier);
} else {
    $contenu_fichier_escaped = "vide";
}
$res["text"] =  $contenu_fichier_escaped ;
echo json_encode($res);
