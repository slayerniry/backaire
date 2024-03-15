<?php
require_once("../../config.inc.php");
require_once("../../session.php");
loadRessource("fr");
$tab['parametre'] = array();
require_once(RP_MODELS . "parametre.class.php");
$parametre = new parametre();
if ($_GET["code"] != "") {
    $critereparametre["param_key"] = $_GET["code"];
    $tab['parametre'] = $parametre->lireParCritere($critereparametre);
} else {
    $tab['parametre'] = array();
}
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">
        <?php echo _getText("parametre")  ?>
    </h4>
</div>
<div class="modal-body">
    <fieldset>
        <form class="" data-toggle="validator" method="post" id="form" action="<?php echo HTTP_EXEC_ADMIN ?>formparametreExec.php">
            <div class="form-group row">
                <label for="param_key" class="control-label col-sm-2">
                    <?php echo _getText('cle')  ?></label>
                <div class="col-sm-10">
                    <input readonly type="text" class="form-control" name="param_key" id="param_key" placeholder="<?php echo _getText('cle')  ?>" value="<?php echo $tab['parametre'][0]['param_key']  ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="param_value" class="control-label col-sm-2">
                    <?php echo _getText('valeur')  ?></label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control" name="param_value" id="param_value" placeholder="<?php echo _getText('valeur')  ?>" value="<?php echo $tab['parametre'][0]['param_value']  ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="param_desc" class="control-label col-sm-2">
                    <?php echo _getText('description')  ?></label>
                <div class="col-sm-10">
                    <textarea rows="10" class="form-control" name="param_desc" id="param_desc"><?php echo $tab['parametre'][0]['param_desc']  ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="param_comment" class="control-label col-sm-2">
                    <?php echo _getText('commentaire')  ?></label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="param_comment" id="param_comment"><?php echo $tab['parametre'][0]['param_comment']  ?></textarea>
                </div>
            </div>
            <div class="form-group row ">
                <center><button type="submit" class="btn btn-success">
                        <?php echo _getText("btnValider")  ?></button></center>
            </div>
        </form>
    </fieldset>
</div>
<script src="<?= HTTP_PAGE ?>js/stock.js"></script>
<script>
    $(document).ready(function() {
        //$('#param_comment').richText();
       // $('#param_desc').richText();
    });
</script>