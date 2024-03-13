<?php
$tab_php_self = explode("/", $_SERVER['PHP_SELF']);
require_once($_SERVER["DOCUMENT_ROOT"] . "/" .  $tab_php_self[1] . "/" . "config.inc.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/" .  $tab_php_self[1] . "/" . "include/session.php");
loadRessource("fr");
require_once(RP_MODELS . "t_event.class.php");
require_once(RP_MODELS . "societe.class.php");
require_once(RP_MODELS . "type_event.class.php");
$t_event = new t_event();
$societe = new societe();
$type_event = new type_event();
$tab['t_event'] = $societe->lireTable($_GET["code"], "t_event", "id_event");
$tab['type'] = $societe->lireTable("LIST_SOUS_TYPE_EVENT", "parametre", "param_key");
$tab['t_type_event'] = $type_event->lireParCritere(array());
unset($tab['t_type_event']["cnt"]);
?>
<style>
    .photo_event {
        width: 300px;
        height: auto;
    }

    .photo_team {
        width: 300px;
        height: auto;
    }
</style>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">
        <?php echo _getText("t_event")  ?>
    </h4>
</div>
<div class="modal-body">
    <form class="" enctype="multipart/form-data" data-toggle="validator" method="post" id="formSocMAJ" action="<?php echo HTTP_EXEC_CREATION ?>formt_eventExec.php">
        <fieldset>
            <legend><?= _getText("info") ?></legend>
            <input type="hidden" name="id_event" value="<?php echo $_GET['code'] ?>" />
            <div class="form-group row">
                <div class="col-md-6">
                    <div class="row">
                        <label for="id_type_event" class="control-label col-sm-4">
                            <?php echo _getText('type')  ?></label>
                        <div class="col-sm-4">
                            <select name="id_type_event" id="id_type_event" class="form-control" required="required">
                                <?php
                                foreach ($tab['t_type_event'] as $key => $value) {
                                ?>
                                    <option value="<?= $value["id_type_event"] ?>"><?= $value["type_event"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <label for="adresse_t_event" class="control-label col-sm-4">
                            <?php echo _getText('date')  ?></label>
                        <div class="col-sm-4">
                            <input type="date" name="date_event" id="date_event" class="form-control" value="<?php echo $tab['t_event']['date_event'] ?? "" ?>" required="required" pattern="" title="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="row">
                        <label for="txttitre" class="control-label col-sm-2 col-md-2 ">
                            <?php echo _getText('titre')  ?></label>
                        <div class="col-sm-4 col-md-8 ">
                            <input type="text" name="titre" id="txttitre" class="form-control" value="<?php echo $tab['t_event']['titre'] ?? "" ?>" pattern="" title="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="row">
                        <label for="selectType" class="control-label col-sm-2 col-md-2 ">
                            <?php echo _getText('type')  . "2" ?></label>
                        <div class="col-sm-4 col-md-4 ">
                            <select name="type" id="selectType" class="form-control">
                                <option value=""></option>
                                <?php
                                $tabType = explode("|", $tab["type"]["param_value"]);
                                foreach ($tabType as $key => $value) {
                                    $tabTYpeDet = explode(":", $value);
                                ?>
                                    <option value="<?= $tabTYpeDet[0] ?>"><?= $tabTYpeDet[1] ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="row">
                        <label for="photo_event" class="control-label col-md-2">
                            <?php echo _getText('photo')  ?></label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="photo_event" id="photo_event" value="">
                            <hr>
                            <?php
                            if ($tab['t_event']['photo_event']  == "") {
                                echo '<img class="photo_event">';
                            } else {
                                echo  $tab['t_event']['photo_event'];
                            }
                            ?>
                            <div id="photo_event_taille" class="alert alert-info">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="row">
                        <label for="adresse_t_event" class="control-label col-md-2">
                            <?php echo _getText('contenu')  ?></label>
                        <div class="col-sm-8">
                            <textarea name="contenu" id="contenu" class="form-control" rows="10" required="required"><?php echo $tab['t_event']['contenu'] ?? "" ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row ">
                <center><button type="button" id="btn_submit" class="btn btn-success">
                        <?php echo _getText("btnValider")  ?></button></center>
            </div>
        </fieldset>
    </form>
</div>
<script src="<?= HTTP_PAGE ?>js/stock.js"></script>
<script type="text/javascript">
    function isEmpty(inputField) {
        return $.trim(inputField.val()) == "";
    }

    function showError(inputField) {
        inputField.focus();
        inputField.css("background-color", "red");
        inputField.css("color", "white");
    }
    jQuery(document).ready(function($) {
        $('textarea').richText();
        $("#id_type_event").val("<?php echo $tab['t_event']['id_type_event'] ?? "" ?>");
        $("#btn_submit").click(function(event) {
            if (isEmpty($("#id_type_event"))) {
                showError($("#id_type_event"));
            } else if (isEmpty($("#date_event"))) {
                showError($("#date_event"));
            } else if (isEmpty($("#txttitre"))) {
                showError($("#txttitre"));
            } else {
                formSocMAJ.submit();
            }
        });
    });
</script>
<script>
    $(document).ready(function() {

        $('#photo_event').change(function() {
            var input = this;
            var url = window.URL || window.webkitURL;
            var file = input.files[0];

            // Réinitialiser la source de l'image à vide
            $('.photo_event').attr('src', '');

            // Créer une URL pour la nouvelle image
            var newImgUrl = file ? url.createObjectURL(file) : '';

            // Définir la source de l'image sur l'URL de la nouvelle image
            $('.photo_event').attr('src', newImgUrl);

            // Obtenir la taille de la nouvelle image
            var imageElement = new Image();
            imageElement.src = newImgUrl;
            imageElement.onload = function() {
                var imageWidth = this.width;
                var imageHeight = this.height;
                var fileSizeInBytes = file ? file.size : 0;
                var fileSizeInKb = (fileSizeInBytes / 1024);
                $("#photo_event_taille").html(imageWidth + " x " + imageHeight + " : " + fileSizeInKb);
            };
        });







        $("#selectType").val("<?= $tab["t_event"]["type"] ?? ""   ?>");

        <?php if (isset($_GET["te"])) {  ?>
            $("#id_type_event").val("<?= $_GET["te"] ?>");
        <?php } ?>
    });
</script>