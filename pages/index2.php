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

  <style>
    /* Ajouter du CSS personnalisé ici */
    .navbar-right {
      float: right !important;
      margin-right: 15px;
    }

    #slider-container {
      position: fixed;
      top: 50px;
      left: 0;
      height: 100%;
      width: 150px;
      z-index: 1000;
      /* Valeur arbitraire pour s'assurer que le slider est au-dessus du contenu */
      background-color: azure;
      /* Arrière-plan du conteneur du slider */
      padding: 10px;
      /* Espacement autour du contenu du slider */
    }

    #slider-bar {
      float: left;
      width: 20%;
      /* Ajustez la largeur du slider selon vos besoins */
      margin-right: 20px;
      background-color: azure;
      height: 100%;
    }
  </style>


</head>

<body>

  <!-- Barre de navigation -->
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#" id="toggle-slider-button">Menu</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Accueil</a></li>
          <li><a href="#">À Propos</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Slider et tableau -->
  <div id="slider-container">
    <div id="slider-bar">




      <table class="table table-hover">
        <thead>
          <tr>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
          </tr>
          <tr>
            <td>1</td>
          </tr>
          <tr>
            <td>1</td>
          </tr>
          <tr>
            <td>1</td>
          </tr>
          <tr>
            <td>1</td>
          </tr>
        </tbody>
      </table>





    </div>

  </div>

  <div class="container">
    <h2 class="sub-header">Section title</h2>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Header</th>
            <th>Header</th>
            <th>Header</th>
            <th>Header</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1,001</td>
            <td>Lorem</td>
            <td>ipsum</td>
            <td>dolor</td>
            <td>sit</td>
          </tr>
          <tr>
            <td>1,002</td>
            <td>amet</td>
            <td>consectetur</td>
            <td>adipiscing</td>
            <td>elit</td>
          </tr>
          <tr>
            <td>1,003</td>
            <td>Integer</td>
            <td>nec</td>
            <td>odio</td>
            <td>Praesent</td>
          </tr>
          <tr>
            <td>1,003</td>
            <td>libero</td>
            <td>Sed</td>
            <td>cursus</td>
            <td>ante</td>
          </tr>
          <tr>
            <td>1,004</td>
            <td>dapibus</td>
            <td>diam</td>
            <td>Sed</td>
            <td>nisi</td>
          </tr>
          <tr>
            <td>1,005</td>
            <td>Nulla</td>
            <td>quis</td>
            <td>sem</td>
            <td>at</td>
          </tr>
          <tr>
            <td>1,006</td>
            <td>nibh</td>
            <td>elementum</td>
            <td>imperdiet</td>
            <td>Duis</td>
          </tr>
          <tr>
            <td>1,007</td>
            <td>sagittis</td>
            <td>ipsum</td>
            <td>Praesent</td>
            <td>mauris</td>
          </tr>
          <tr>
            <td>1,008</td>
            <td>Fusce</td>
            <td>nec</td>
            <td>tellus</td>
            <td>sed</td>
          </tr>
          <tr>
            <td>1,009</td>
            <td>augue</td>
            <td>semper</td>
            <td>porta</td>
            <td>Mauris</td>
          </tr>
          <tr>
            <td>1,010</td>
            <td>massa</td>
            <td>Vestibulum</td>
            <td>lacinia</td>
            <td>arcu</td>
          </tr>
          <tr>
            <td>1,011</td>
            <td>eget</td>
            <td>nulla</td>
            <td>Class</td>
            <td>aptent</td>
          </tr>
          <tr>
            <td>1,012</td>
            <td>taciti</td>
            <td>sociosqu</td>
            <td>ad</td>
            <td>litora</td>
          </tr>
          <tr>
            <td>1,013</td>
            <td>torquent</td>
            <td>per</td>
            <td>conubia</td>
            <td>nostra</td>
          </tr>
          <tr>
            <td>1,014</td>
            <td>per</td>
            <td>inceptos</td>
            <td>himenaeos</td>
            <td>Curabitur</td>
          </tr>
          <tr>
            <td>1,015</td>
            <td>sodales</td>
            <td>ligula</td>
            <td>in</td>
            <td>libero</td>
          </tr>
        </tbody>
      </table>
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


  });
</script>