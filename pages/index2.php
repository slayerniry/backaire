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
  <!-- <link rel="stylesheet" href="<?php echo HTTP_PAGE ?>css/style.css">-->
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
  <title><?= _getText("titre_logiciel") ?></title>
</head>
<body>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
          ADMIN
        </a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="http://www.sciax2.it/forum/utenti/-kik_226760/" target="_blank">Return back</a></li>
          <li class="dropdown ">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              Settings
              <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li class="dropdown-header">SETTINGS</li>
              <li class=""><a href="#">Link</a></li>
              <li class=""><a href="#">Other Link</a></li>
              <li class=""><a href="#">Other Link</a></li>
              <li class="divider"></li>
              <li><a href="#">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="col col-md-3">
      <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                Files</a>
            </h4>
          </div>
          <div id="collapse1" class="panel-collapse collapse in">
            <ul class="list-group">
              <li class="list-group-item"><span class="badge">253</span> New</li>
              <li class="list-group-item"><span class="badge">17</span> Deleted</li>
              <li class="list-group-item"><span class="badge">3</span> Reported</li>
            </ul>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                Blog</a>
            </h4>
          </div>
          <div id="collapse2" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item"><span class="badge">12</span> New</li>
              <li class="list-group-item"><span class="badge">5</span> Deleted</li>
            </ul>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                Settings</a>
            </h4>
          </div>
          <div id="collapse3" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item"><span class="badge">1</span> Users Reported</li>
              <li class="list-group-item"><span class="badge">5</span> User Waiting Activation</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col col-md-9">
      <div class="row">
        <div class="col col-md-5">
          <h4>Today Stats:</h4>
          Visits<span class="pull-right strong">- 15%</span>
          <div class="progress">
            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width:15%">15%</div>
          </div>
          20 New Users<span class="pull-right strong">+ 30%</span>
          <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width:30%">30%</div>
          </div>
          359 Downloads<span class="pull-right strong">+ 8%</span>
          <div class="progress">
            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="8" aria-valuemin="0" aria-valuemax="100" style="width:8%">8%</div>
          </div>
        </div>
        <div class="col col-md-5">
          <h4>This Month Stats:</h4>
          Visits<span class="pull-right strong">+ 45%</span>
          <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width:45%">45%</div>
          </div>
          395 New Users<span class="pull-right strong">+ 57%</span>
          <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width:57%">57%</div>
          </div>
          12.593 Downloads<span class="pull-right strong">+ 25%</span>
          <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:25%">25%</div>
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
  });
</script>