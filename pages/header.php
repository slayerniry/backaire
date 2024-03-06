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
    <meta charset="utf-8">
    <meta http-equiv="Content-Language" content="fr">
    <link rel="stylesheet" href="<?php echo HTTP_PAGE ?>css/bootstrap.min.css" />
    <!-- Select2 CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP_PAGE ?>select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo HTTP_PAGE ?>css/style.css">
    <link rel="stylesheet" href="<?php echo HTTP_PAGE ?>css/tabulator.min.css">
    <link href="<?php echo HTTP_PAGE ?>css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="<?php echo HTTP_PAGE ?>css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo HTTP_PAGE ?>src/richtext.min.css">
    <!--<link href="<?php echo HTTP_PAGE ?>summernote-0.8.18-dist/summernote.min.css" rel="stylesheet">-->
    <script src="<?php echo HTTP_PAGE ?>js/ie-emulation-modes-warning.js"></script>
    <link rel="stylesheet" href="<?php echo HTTP_PAGE ?>datatable2/datatables.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo HTTP_PAGE ?>datatable2/Buttons-2.2.3/css/buttons.dataTables.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo HTTP_PAGE ?>datatable2/DataTables-1.12.1/css/dataTables.bootstrap.css" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo HTTP_PAGE ?>datatable2/DataTables-1.12.1/css/fixedHeader.bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo HTTP_PAGE ?>datatable2/DataTables-1.12.1/css/responsive.bootstrap.min.css" crossorigin="anonymous">
    <script src="<?php echo HTTP_PAGE ?>js/jquery-1.12.4.js"></script>
    <script src="<?php echo HTTP_PAGE ?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo HTTP_PAGE ?>src/jquery.richtext.js"></script>
    <!-- Select2 JS -->
    <script src="<?php echo HTTP_PAGE ?>select2/dist/js/select2.js" type="text/javascript"></script>
    <script src="<?php echo HTTP_PAGE ?>datatable2/datatables.min.js"></script>
    <script src="<?php echo HTTP_PAGE ?>js/stock.js"></script>
    <script src="<?php echo HTTP_PAGE ?>js/chart.js"></script>
    <script src="<?php echo HTTP_PAGE ?>js/tabulator.min.js"></script>
    <script src="<?php echo HTTP_PAGE ?>js/xlsx.full.min.js"></script>
    <script src="<?php echo HTTP_PAGE ?>js/holder.min.js"></script>
    <!-- <script src="<?php echo HTTP_PAGE ?>summernote-0.8.18-dist/summernote.min.js"></script>-->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo HTTP_PAGE ?>js/ie10-viewport-bug-workaround.js"></script>
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
        .nav-sidebar li.parent {
            background: #b0d670;
            /* Old browsers */
            background: -moz-linear-gradient(top, #b0d670 1%, #01953D 41%, #01953D 100%);
            /* FF3.6-15 */
            background: -webkit-linear-gradient(top, #b0d670 1%, #01953D 41%, #01953D 100%);
            /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to bottom, #b0d670 1%, #01953D 41%, #01953D 100%);
            /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0CDE61', endColorstr='#01953D', GradientType=0);
            /* IE6-9 */
            color: #fff;
        }
        .nav-sidebar li.parent a {
            /* IE6-9 */
            color: #fff;
        }
        .nav-sidebar li.parent a:hover {
            /* IE6-9 */
            color: #01953D;
        }
        .nav-sidebar>li>a {
            color: #01953D;
            font-weight: bold;
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
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top navbar-bazar_mada">
        <div class="container-fluid">
            <div class="navbar-header">
                <span style="font-size: 26px;cursor: pointer;  " id="toggle-slider-button" class="glyphicon glyphicon glyphicon-sort-by-attributes-alt" aria-hidden="true"></span>
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= HTTP_PAGE  ?>index.php">
                    <?= _getText("titre_logiciel") ?>
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="glyphicon glyphicon-user"></span>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span>
                                    <?php echo $_SESSION["user_nom"] . " " . $_SESSION["user_prenom"] ?></a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-briefcase"></span>
                                    <?php echo $tab["utilisateur"][0]["prf_nom"] ?></a></li>
                            <li>
                                <a href="#" data-toggle="popover" data-trigger="hover"><span url="<?= HTTP_PAGE_ADMIN ?>formchangementmdp.php?code=0" class="btnupdate glyphicon glyphicon-edit"> Changement mot de passe</span></a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo HTTP_EXEC ?>login.php?dec=1" title=""><span class="glyphicon glyphicon-log-out"></span>&nbsp;
                                    <?php echo _getText('deconnecte')  ?></a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right">
                    <input type="text" class="form-control" placeholder="Search...">
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar" id="slider-container">
                <?php
                unset($_SESSION["menu"]["cnt"]);
                foreach ($tab["MENU_PARENT"] as $key => $value) {
                    $tableau = explode("|", $value);
                ?>
                    <ul class="nav nav-sidebar">
                        <li class="parent"><a href="#"><?= $tableau[1]  ?> </a></li>
                        <?php
                        foreach ($_SESSION["menu"] as $key => $value) {
                            if ($value["men_parent"] == $tableau[0]) {
                        ?>
                                <li>
                                    <a href="<?= HTTP_MAIN_MENU . $value["men_url"]  ?>">
                                        <span class="glyphicon glyphicon-<?= $value["men_icon"] ?>"></span>&nbsp;<?= $value["men_nom"]  ?>
                                    </a>
                                </li>
                        <?php } // fin if
                        } // fin for 
                        ?>
                    </ul>
                <?php } ?>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">