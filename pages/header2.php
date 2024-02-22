<?php

$tab_php_self = explode("/", $_SERVER['PHP_SELF']);

require_once($_SERVER["DOCUMENT_ROOT"] . "/" .  $tab_php_self[1] . "/" . "config.inc.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/" .  $tab_php_self[1] . "/" . "include/session.php");

require_once(RP_MODELS . "utilisateur.class.php");
require_once(RP_MODELS . "parametre.class.php");

$utilisateur = new utilisateur();
$parametre = new parametre();

$tab["MENU_PARENT"] = explode(",", $parametre->lireParKey("MENU_PARENT"));


$critereUser["user_code"] = $_SESSION["user_code"];
$tab['utilisateur'] = $utilisateur->lireParCritere($critereUser);


if (isset($_GET['langue']))
    $langue = $_GET['langue'];
else
    $langue = "fr";


loadRessource($langue);

?>

<html lang="fr">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
    <meta name="google" content="notranslate">
    <meta http-equiv="Content-Language" content="fr">

    <link rel="stylesheet" href="<?php echo HTTP_PAGE ?>css/bootstrap.min.css" />
    <!-- Select2 CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP_PAGE ?>select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo HTTP_PAGE ?>css/style.css">

    <link rel="stylesheet" href="<?php echo HTTP_PAGE ?>css/tabulator.min.css">

    <link rel="stylesheet" href="<?php echo HTTP_PAGE ?>datatable2/datatables.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo HTTP_PAGE ?>datatable2/Buttons-2.2.3/css/buttons.dataTables.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo HTTP_PAGE ?>datatable2/DataTables-1.12.1/css/dataTables.bootstrap.css" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo HTTP_PAGE ?>datatable2/DataTables-1.12.1/css/fixedHeader.bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo HTTP_PAGE ?>datatable2/DataTables-1.12.1/css/responsive.bootstrap.min.css" crossorigin="anonymous">


    <script src="<?php echo HTTP_PAGE ?>js/jquery-1.12.4.js"></script>
    <script src="<?php echo HTTP_PAGE ?>js/bootstrap.min.js"></script>

    <!-- Select2 JS -->
    <script src="<?php echo HTTP_PAGE ?>select2/dist/js/select2.js" type="text/javascript"></script>
    <script src="<?php echo HTTP_PAGE ?>datatable2/datatables.min.js"></script>
    <script src="<?php echo HTTP_PAGE ?>js/stock.js"></script>
    <script src="<?php echo HTTP_PAGE ?>js/chart.js"></script>
    <script src="<?php echo HTTP_PAGE ?>js/tabulator.min.js"></script>
    <script src="<?php echo HTTP_PAGE ?>js/xlsx.full.min.js"></script>

    <script language="javascript" src="<?php echo HTTP_PAGE ?>datatable2/Buttons-2.2.3/js/dataTables.buttons.min.js"></script>
    <script language="javascript" src="<?php echo HTTP_PAGE ?>datatable2/DataTables-1.12.1/js/dataTables.bootstrap.js"></script>
    <script language="javascript" src="<?php echo HTTP_PAGE ?>datatable2/DataTables-1.12.1/js/dataTables.fixedHeader.min.js"></script>
    <script language="javascript" src="<?php echo HTTP_PAGE ?>datatable2/DataTables-1.12.1/js/dataTables.responsive.min.js"></script>
    <script language="javascript" src="<?php echo HTTP_PAGE ?>datatable2/DataTables-1.12.1/js/responsive.bootstrap.min.js"></script>
    <script language="javascript" src="<?php echo HTTP_PAGE ?>datatable2/JSZip-2.5.0/jszip.min.js"></script>
    <script language="javascript" src="<?php echo HTTP_PAGE ?>datatable2/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script language="javascript" src="<?php echo HTTP_PAGE ?>datatable2/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script language="javascript" src="<?php echo HTTP_PAGE ?>datatable2/Buttons-2.2.3/js/buttons.html5.min.js"></script>

    <style>
        .myAlert-top {
            float: right;
            position: fixed;
            top: 5px;
            right: 2%;
            width: 30%;
        }
    </style>

    <script language="javascript">
        function Padder(len, pad) {
            if (len === undefined) {
                len = 1;
            } else if (pad === undefined) {
                pad = '0';
            }

            var pads = '';
            while (pads.length < len) {
                pads += pad;
            }

            this.pad = function(what) {
                var s = what.toString();
                return pads.substring(0, pads.length - s.length) + s;
            };
        }
    </script>

    <title><?= _getText("titre_logiciel") ?></title>

</head>



<!-- header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Dashboard</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> Admin <span class="caret"></span></a>
                    <ul id="g-account-menu" class="dropdown-menu" role="menu">
                        <li><a href="#">My Profile</a></li>
                    </ul>
                </li>
                <li><a href="#"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
            </ul>
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /Header -->