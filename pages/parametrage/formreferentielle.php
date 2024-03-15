<?php

require_once("../../config.inc.php");
require_once("../../session.php");
loadRessource("fr");
require_once(RP_MODELS . "type_reference.class.php");
require_once(RP_MODELS . "referentielle.class.php");
require_once(RP_MODELS . "societe.class.php");
require_once(RP_MODELS . "type_event.class.php");
$type_reference = new type_reference();
$referentielle = new referentielle();
$societe = new societe();
$type_event = new type_event();
$criterePeriode = array();
$tab['periode']['cnt'] = 0;
//type
$critere['tpr_code'] =  ($_GET['tpr_code']);
$tab['type_reference'] = $type_reference->lireParCritere($critere);
//referentielle
$critereRef['ref_code']  = $_GET["code"];
$tab['referentielle'] = $referentielle->lireParCritere($critereRef);
$readonly = ($_GET["code"] > 0 ? "readonly" : "");
//numero auto si onglet societe 
$ref_abrev = "";
if ($critere['tpr_code'] == 'T_SOCIETE' && $_GET["code"] == 0) {
    $ref_abrev = $societe->recupNumeroMaxCode();
    $readonly = "readonly";
}
if ($critere['tpr_code'] == 'T_TYPE_EVENEMENT' && $_GET["code"] == 0) {
    $ref_abrev = $type_event->recupNumeroMaxCode();
    $readonly = "readonly";
}
//fin if
//***************************************************************
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">
        <?= $tab['type_reference'][0]['tpr_nom']  ?>
    </h4>
</div>
<div class="modal-body">
    <?php // echo $_GET["code"] ;
    ?>
    <form class="" data-toggle="validator" method="post" id="form" action="<?= HTTP_EXEC_PARAM ?>formreferentielleExec.php">
        <input type="hidden" name="ref_code" value="<?= $critereRef['ref_code'] ?>" />
        <input type="hidden" name="tpr_code" value="<?= $critere['tpr_code'] ?>" />
        <div class="form-group row">
            <label for="ref_abrev" class="control-label col-sm-2">
                <?= _getText('abrev')  ?></label>
            <div class="col-sm-3">
                <input maxlength="10" type="text" class="form-control" name="ref_abrev" id="ref_abrev" placeholder="<?= _getText('abrev')  ?>" value="<?= $tab['referentielle'][0]['ref_abrev'] ?? $ref_abrev  ?>" required <?= $readonly; ?> />
            </div>
        </div>
        <?php
        $tab_tpr_champ =  explode("|", $tab['type_reference'][0]['tpr_champ']);
        $tab_tpr_libelle =  explode("|", $tab['type_reference'][0]['tpr_libelle']);
        $tab_tpr_type =  explode("|", $tab['type_reference'][0]['tpr_type']);
        $attr = "";
        for ($j = 0; $j < count($tab_tpr_libelle); $j++) {
            $class_sm = "col-sm-10";
            switch ($tab_tpr_type[$j]) {
                case "F":
                    $type = "file";
                    break;
                case "T":
                    $type = "text";
                    break;
                case "N":
                    $type = "number";
                    $class_sm = "col-sm-2";
                    $attr = ' min="0" max="1000000" step="1" ';
                    break;
                case "B":
                    $type = "number";
                    $class_sm = "col-sm-2";
                    $attr = ' min="0" max="1" step="1" ';
                    break;
                case "D":
                    $type = "date";
                    break;
                case "P":
                    $type = "number";
                    $class_sm = "col-sm-2";
                    $attr = 'style="width:50%" min="1000000" max="9999999999" step="1" ';
                    $class_sm = "col-sm-10";
                    break;
            }
        ?>
            <div class="form-group row ">
                <label for="ref_champ<?= $j + 1 ?>" class="control-label col-sm-2">
                    <?= $tab_tpr_libelle[$j]  ?></label>
                <div class="<?= $class_sm ?>">
                    <?php
                    if ($tab_tpr_champ[$j] == "per_code") { ?>
                        <select class="form-control" name="ref_champ<?= $j + 1 ?>" id="ref_champ<?= $j + 1 ?>">
                            <?php for ($k = 0; $k < $tab['periode']['cnt']; $k++) {
                                $selected = ($tab['periode'][$k]["per_code"] == $tab['referentielle'][0]['ref_champ' . ($j + 1)] ? "selected" : "");
                            ?>
                                <option <?= $selected ?> value="<?php echo  $tab['periode'][$k]["per_code"] ?>">
                                    <?php echo  $tab['periode'][$k]["per_nom"] ?>
                                </option>
                            <?php } ?>
                        </select>
                    <?php
                    } elseif ($tab_tpr_type[$j] == "TA") {
                    ?>
                        <textarea class="form-control" name="ref_champ<?= $j + 1 ?>" id="ref_champ<?= $j + 1 ?>" placeholder="<?= $tab_tpr_libelle[$j]  ?>" cols="15" rows="5"><?= $tab['referentielle'][0]['ref_champ' . ($j + 1)]  ?></textarea>
                    <?php
                    } else {
                    ?>
                        <input type="<?= $type ?>" <?= $attr ?> class="form-control" name="ref_champ<?= $j + 1 ?>" id="ref_champ<?= $j + 1 ?>" placeholder="<?= $tab_tpr_libelle[$j]  ?>" value="<?= $tab['referentielle'][0]['ref_champ' . ($j + 1)]  ?>">
                    <?php } ?>
                </div>
            </div>
        <?php
        } //fin for 
        ?>
        <div class="form-group">
            <center>
                <button type="submit" class="btn btn-success">
                    <?= _getText("btnValider")  ?></button>
            </center>
        </div>
    </form>
    <script src="<?= HTTP_PAGE ?>js/stock.js"></script>