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

    <link href="<?php echo HTTP_PAGE ?>css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="<?php echo HTTP_PAGE ?>css/dashboard.css" rel="stylesheet">

    <script src="<?php echo HTTP_PAGE ?>js/ie-emulation-modes-warning.js"></script>

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

    <script src="<?php echo HTTP_PAGE ?>js/holder.min.js"></script>
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

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" id="toggle-slider-button">Menu</a>
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
                        <li class="active"><a href="#"><?= $tableau[1]  ?> </a></li>

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


                <div class="well">
                    <h4>Dashboard</h4>
                    <p>Some text..</p>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Users</h4>
                            <p>1 Million</p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Pages</h4>
                            <p>100 Million</p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Sessions</h4>
                            <p>10 Million</p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Bounce</h4>
                            <p>30%</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="well">
                            <p>Text</p>
                            <p>Text</p>
                            <p>Text</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="well">
                            <p>Text</p>
                            <p>Text</p>
                            <p>Text</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="well">
                            <p>Text</p>
                            <p>Text</p>
                            <p>Text</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="well">
                            <p>Text</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="well">
                            <p>Text</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {

        // Gérer le basculement du slider lors du clic sur le bouton
        $('#toggle-slider-button').click(function() {
            $('#slider-container').slideToggle();
        });

        $('.nav-sidebar').on('click', 'li.active', function() {
            $(this).siblings('li:not(.active)').toggle("slow");
        });

    });
</script>