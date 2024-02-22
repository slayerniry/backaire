<?php

require_once("../../config.inc.php");

require_once(RP_MODELS . "mouvement.class.php");

loadRessource("fr");

$mouvement = new mouvement();
$tab = array();

$tab_art_code = explode("|", $_GET["art_code"]);

$critere["art_code"] =  $tab_art_code[0];
$critere["mvt_date_min"] =  $_GET["mvt_date_min"];
$critere["mvt_date_max"] =  $_GET["mvt_date_max"];
$critere["mvt_montant_paye"] =  $_GET["mvt_montant_paye"];
$critere["art_abrev"] =  $_GET["art_abrev"];
$critere["cat_code"] =  $_GET["cat_code"];

if (isset($_GET["mvt_type"])) {
    $critere["mvt_type"] =  $_GET["mvt_type"];
}

$tab = $mouvement->lireSomme($critere);

//debug($tab);

$html = "";
unset($tab["cnt"]);
foreach ($tab as $key => $value) {
    if (true) {
?>
        <style>
            h4 {
                text-align: right;
            }

            p {
                text-align: right;
                font-weight: bold;
            }
        </style>
        <fieldset class="row">
            <legend><?= _getText("info") . " " ?></legend>
            <div class="col-md-6">
                <div class="list-group">
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading"><?= formatCurrency($value["sum_PA"]) ?></h4>
                        <p class="list-group-item-text"><?= _getText("total") . " " . _getText("prix.achat")  ?></p>
                    </a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="list-group">
                    <a href="#" class="list-group-item active">
                        <h4 class="list-group-item-heading"><?= formatCurrency($value["sum_M"])  ?></h4>
                        <p class="list-group-item-text"><?= _getText("total") . " " . _getText("montant")  ?></p>
                    </a>
                </div>
            </div>
        </fieldset>
<?php  }
} ?>