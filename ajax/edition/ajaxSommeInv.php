<?php

require_once("../../config.inc.php");

require_once(RP_MODELS . "detinventaire.class.php");

loadRessource("fr");

$detinventaire = new detinventaire();
$tab = array();

$tab_art_code = explode("|", $_GET["art_code"] ?? "");

$critere["art_code"] =  $tab_art_code[0] ?? "";
$critere["mvt_date_min"] =  $_GET["mvt_date_min"] ?? "";
$critere["mvt_date_max"] =  $_GET["mvt_date_max"] ?? "";

if (isset($_GET["mvt_type"])) {
    $critere["mvt_type"] =  $_GET["mvt_type"];
}

$tab = $detinventaire->lireSomme($critere);


unset($tab["cnt"]);
foreach ($tab as $key => $value) { ?>

    <style>
        h4 {
            text-align: right;
        }

        p {
            text-align: right;
            font-weight: bold;
        }
    </style>
    <fieldset>
        <legend>
            <?= _getText("info") ?>
        </legend>
        <div class="row">
            <div class="col-md-2">
                <div class="list-group">
                    <a href="#" class="list-group-item ">
                        <h4 class="list-group-item-heading"><?= $value["sum_qte_defectueux"] ?></h4>
                        <p class="list-group-item-text"><?= _getText("total") . " " . _getText("defectueux") ?></p>
                    </a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="list-group">
                    <a href="#" class="list-group-item ">
                        <h4 class="list-group-item-heading"><?= $value["sum_qte_perime"] ?></h4>
                        <p class="list-group-item-text"><?= _getText("total") . " " . _getText("perime") ?></p>
                    </a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="list-group">
                    <a href="#" class="list-group-item ">
                        <h4 class="list-group-item-heading"><?= $value["sum_qte_perdu2"] ?></h4>
                        <p class="list-group-item-text"><?= _getText("total") . " " . _getText("perdu") ?></p>
                    </a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="list-group">
                    <a href="#" class="list-group-item active">
                        <h4 class="list-group-item-heading"><?= $value["sum_qte_perdu"] ?></h4>
                        <p class="list-group-item-text"><?= _getText("total")  ?></p>
                    </a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="list-group">
                    <a href="#" class="list-group-item active">
                        <h4 class="list-group-item-heading"><?= formatCurrency($value["sum_prix_achat"])  ?></h4>
                        <p class="list-group-item-text"><?= _getText("prix.achat")  ?></p>
                    </a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="list-group">
                    <a href="#" class="list-group-item active ">
                        <h4 class="list-group-item-heading"><?= formatCurrency($value["sum_prix_achat"] * $value["sum_qte_perdu"])  ?></h4>
                        <p class="list-group-item-text"><?= _getText("perte")  ?></p>
                    </a>
                </div>
            </div>
        </div>
    </fieldset>

<?php } ?>