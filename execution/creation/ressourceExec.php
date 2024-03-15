<?php  



require_once("../../config.inc.php");
$var_url = "r=0&lg=";
// Vérifier si le formulaire a été soumis et si le fichier a été téléchargé avec succès
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fichier"]) && $_FILES["fichier"]["error"] == UPLOAD_ERR_OK) {
    // Spécifiez le répertoire de destination où vous souhaitez enregistrer les fichiers téléchargés
    $repertoire_destination = RP_SITE_RESSOURCE  . $_POST["cmblangue"]. "/" ;
    // Obtenez le nom du fichier téléchargé
    $nom_fichier = "langue.res";
    // Déplacer le fichier téléchargé vers le répertoire de destination
    $chemin_destination = $repertoire_destination . $nom_fichier;
    echo $chemin_destination ;
    if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $chemin_destination)) {
        $var_url = "r=1&lg=".$_POST["cmblangue"];
    } 
}    
header("location:" . HTTP_PAGE_CREATION . "ressources.php?" . $var_url);
exit();
