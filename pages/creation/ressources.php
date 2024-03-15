<?php
require_once("../header.php");
if ($utilisateur->habilitationMenu($_SERVER["SCRIPT_NAME"] . "", $_SESSION["prf_code"])) {
    require_once(RP_MODELS . "t_event.class.php");
    require_once(RP_MODELS . "type_event.class.php");
    require_once(RP_MODELS . "parametre.class.php");
    $type_event = new type_event();
    $parametre = new parametre();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel with-nav-tabs panel-info">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#onglet1" data-toggle="tab"> <?= _getText("ressource") ?></a></li>
                            <li><a href="#onglet2" data-toggle="tab">texte vers HTML</a></li>
                        </ul>
                    </div>
                    <div class="tab-content" style="padding-top: 10px;">
                        <div class="tab-pane fade in active" id="onglet1">
                            <form enctype="multipart/form-data" action="<?= HTTP_EXEC_CREATION ?>ressourceExec.php" method="POST" class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label for="textarea" class="col-sm-2 control-label"><?= _getText("langue") ?></label>
                                    <div class="col-sm-4">
                                        <?php
                                        $tabLangueTab = array();
                                        $tabLangueTab = explode("|", $parametre->lireParKey("lIST_LANGUE_RES"));
                                        ?>
                                        <select name="cmblangue" id="cmblangue" class="form-control" required="required">
                                            <option value=""></option>
                                            <?php
                                            foreach ($tabLangueTab as $key => $value) {
                                                $tabTYpeDet = explode(":", $value);
                                            ?>
                                                <option value="<?= $tabTYpeDet[0] ?>"><?= replace_texte_speciaux3($tabTYpeDet[1])   ?></option>
                                            <?php  } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtresult" class="col-sm-2 control-label"><?= _getText("texte") ?></label>
                                    <div class="col-sm-8">
                                        <textarea id="txtresult" class="form-control" rows="10" required="required"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-2">
                                        <a id="href_fichier" href="">
                                            <button type="button" class="btn btn-info"><?= _getText("telecharger") ?></button>
                                        </a>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="file" name="fichier" id="txtfile">
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-success"><?= _getText("btnValider") ?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="onglet2">
                            <div class="form-group row">
                                <label class="col-sm-2" for="">texte html</label>
                                <div class="col-sm-8">
                                    <textarea rows="10" class="form-control" id="txttext"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2" for=""></label>
                                <div class="col-sm-4">
                                    <button id="btninline" type="button" class="btn btn-info">Meme ligne</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else {
    require_once(RP_MAIN . "pages/vide.php");
} ?>
<?php require_once("../footer.php"); ?>
<script>
    $(document).ready(function() {
        $("#txttext").richText();
        $('#txtfile').on('change', function(event) {
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var content = e.target.result;
                    $('#txtresult').val(content);
                };
                reader.readAsText(file);
            }
        });
        $("#cmblangue").on('change', function() {
            $.ajax({
                type: "POST",
                url: "<?= HTTP_AJAX_CREATION ?>ajaxLireFichierRessource.php",
                data: {
                    lg: $(this).val()
                },
                dataType: "JSON",
                success: function(r) {
                    $("#txtresult").val(r.text);
                    if (r.chemin != "") {
                        $("#href_fichier").attr("style", "display:block");
                    } else {
                        $("#href_fichier").attr("style", "display:none");
                    }
                    $("#href_fichier").attr("href", r.chemin);
                    $('#txtresult').prop('readonly', true);
                }
            });
        });
        <?php if (isset($_GET["lg"])) { ?>
            $("#cmblangue").val("<?= $_GET["lg"] ?>");
            $("#cmblangue").trigger("change");
        <?php  }  ?>
    });
</script>