<?php
define("DB_HOST", "localhost");
define("DB_NAME", "aire");
define("DB_USER", "root");
define("DB_PWD", "root");
define('RP_MAIN', $_SERVER["DOCUMENT_ROOT"] . "/aire/admin/");
define('ROOT_PATH', RP_MAIN);
define('HTTP_MAIN', "http://" . $_SERVER["HTTP_HOST"] . "/aire/admin/");
define('HTTP_MAIN_MENU', HTTP_MAIN);

define("RP_SITE_RESSOURCE",$_SERVER["DOCUMENT_ROOT"] . "/aire/ressources/");
define("HTTP_SITE_RESSOURCE","http://" . $_SERVER["HTTP_HOST"] . "/aire/ressources/");

define("INSTALL_DIR", "/aire/admin/");

define("BACKUP_DIR", INSTALL_DIR . "admin/data/");
define("ARCHIVE_DIR", INSTALL_DIR . "admin/data/archive/");
define("HTTP_ARCHIVE_DIR", HTTP_MAIN . "admin/data/archive/");
define("MYSQL_BIN", "C:/laragon/bin/mysql/mysql-8.0.30-winx64/bin/");
define('RP_RESSOURCES',    RP_MAIN . 'ressources/');
define('RP_MODELS',    RP_MAIN . 'models/');
define('RP_CLASS',    RP_MAIN . 'classes/');
define('RP_XLSX',    RP_MAIN . 'xlsx/');
define('RP_IMG',    RP_MAIN . 'pages/img/');
define('HTTP_IMPORT',    HTTP_MAIN . 'importation/');
define('RP_IMPORT',    RP_MAIN . 'importation/');
define('HTTP_PJ',    HTTP_MAIN . 'pj/');
define('RP_PJ',    RP_MAIN . 'pj/');
define('HTTP_IMG',    HTTP_MAIN . 'pages/img/');
define('HTTP_PAGE', HTTP_MAIN . "pages/");
define('HTTP_EXEC', HTTP_MAIN . "execution/");
define('HTTP_MODELE', HTTP_EXEC . "download.php");
define('HTTP_AJAX', HTTP_MAIN . "ajax/");
define('HTTP_LANG_DATATABLE', HTTP_MAIN . "ressources/");
define('HTTP_PAGE_PARAM', HTTP_PAGE . "parametrage/");
define('HTTP_EXEC_PARAM', HTTP_EXEC . "parametrage/");
define('HTTP_AJAX_PARAM', HTTP_AJAX . "parametrage/");
define('HTTP_PAGE_CREATION', HTTP_PAGE . "creation/");
define('HTTP_EXEC_CREATION', HTTP_EXEC . "creation/");
define('HTTP_AJAX_CREATION', HTTP_AJAX . "creation/");
define('HTTP_PAGE_ADMIN', HTTP_PAGE . "admin/");
define('HTTP_EXEC_ADMIN', HTTP_EXEC . "admin/");
define('HTTP_AJAX_ADMIN', HTTP_AJAX . "admin/");
define('HTTP_PAGE_EDITION', HTTP_PAGE . "edition/");
define('HTTP_EXEC_EDITION', HTTP_EXEC . "edition/tcpdf/examples/");
define('HTTP_AJAX_EDITION', HTTP_AJAX . "edition/");
define('RP_PDF', RP_MAIN . 'execution/edition/tcpdf/');
