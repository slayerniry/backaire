<?php 

require_once("../../config.inc.php");

$fichier =  $_SERVER["DOCUMENT_ROOT"] . "/" . ARCHIVE_DIR . $_GET["f"]; 

unlink($fichier);

header("location:" . HTTP_PAGE_PARAM . "backrestore.php");   

?>