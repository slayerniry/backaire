<?php
require_once("../header.php");
require_once(RP_MODELS . "parametre.class.php");

$parametre = new parametre();

if ($utilisateur->habilitationMenu($_SERVER["SCRIPT_NAME"], $_SESSION["prf_code"])) {

    if (isset($_GET["code"]))
        $msg = "<li>" . _getText("mise.jour.effectue") . "</li>";

    $dir = $parametre->lireParKey("DOSSIER_SAUVEGARDE");

    if (file_exists($dir) && is_dir($dir)) {
    } else {

        $msg = "<fieldset>";
        $msg .= '<div class="alert alert-danger" >' . 'Le dossier ' .  $dir .  '  n\'existe pas' . "</div>";
        $msg .= '<div class="alert alert-warning">Veuillez modifier le cle <a href="' . HTTP_PAGE_ADMIN . 'listeparametre.php"><b>DOSSIER_SAUVEGARDE</b></a> dans le menu Option/parametre</div>';
        $msg .= '</fieldset>';

        echo $msg;

        exit();
    }


?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">

                    <div class="col-md-9">
                        <div class="panel panel-bazar_mada">
                            <div class="panel-heading panel-head-bazar_mada"> <span class="glyphicon glyphicon-th"></span>
                                <?= _getText("parametrage") ?> <span class="glyphicon glyphicon-menu-right"></span> <?= _getText("backrestore")  ?>
                            </div>
                            <div class="panel-body ">
                                <fieldset>
                                    <legend>
                                        <?= _getText("formulaire") ?>
                                    </legend>
                                    <form data-toggle="validator" method="post" id="form" action="<?php echo HTTP_EXEC_PARAM ?>formbackrestoreExec.php" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <div class="col-xs-3">
                                                <label for="optSauve" class="control-label">
                                                    <input checked class="form-control" type="radio" name="choix" value="S" id="optSauve">Sauvegarde</label>
                                            </div>
                                            <div class="col-xs-3">
                                                <label for="optResto" class="control-label">
                                                    <input class="form-control" type="radio" name="choix" value="R" id="optResto">Restauration</label>
                                            </div>
                                        </div>
                                        <div class="form-group row fichier">
                                            <label for="file" class="control-label col-sm-2">
                                                <?php echo _getText("choix_fichier")  ?> :</label>
                                            <div class="col-sm-4">
                                                <input type="file" id="db_file" name="db_file">
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <center>
                                                <?php
                                                if ($utilisateur->habilitationButton($_SERVER["SCRIPT_NAME"], "btnValider", $_SESSION["prf_code"])) {
                                                ?>
                                                    <button type="submit" class="btn btn-success"><?php echo _getText("btnValider")  ?></button>
                                                <?php } ?>
                                            </center>
                                        </div>
                                    </form>
                                </fieldset>
                                <hr>

                                <center>
                                    <div class="loader"></div>
                                </center>

                                <fieldset>
                                    <legend>
                                        <?= _getText("fichier") . " (" . $dir . ")"  ?>
                                    </legend>
                                    <?php $tabFichier = list_dir($parametre->lireParKey("DOSSIER_SAUVEGARDE")); ?>
                                    <table class="table table-hover datatable_no_ajax">
                                        <thead>
                                            <tr>
                                                <th width="80%">
                                                    <?php echo _getText("fichier.sauvegarde") ?>
                                                </th>
                                                <th width="20%">
                                                    <?php echo _getText("action") ?>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($tabFichier as $key => $value) { ?>
                                                <tr>
                                                    <td><?= $value ?></td>
                                                    <td>
                                                        <?php
                                                        if ($utilisateur->habilitationButton($_SERVER["SCRIPT_NAME"], "telecharger", $_SESSION["prf_code"])) {
                                                        ?>
                                                            <button title="<?php echo _getText("telecharger") ?>" onclick="telecharge('<?php echo $value ?>')" type="button" class="btn btn-success"> <span class="glyphicon glyphicon-download"></span> </button>


                                                        <?php }
                                                        if ($utilisateur->habilitationButton($_SERVER["SCRIPT_NAME"], "btnSupprimer", $_SESSION["prf_code"])) {
                                                        ?>
                                                            <!--<button title="<?php echo _getText("btnSupprimer") ?>" onclick="supprimer('<?php echo $value ?>')" class="btn btn-danger" type="button"><span class="glyphicon glyphicon-remove"></span></button>-->
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php }
                                            ?>
                                        </tbody>
                                    </table>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel panel-bazar_mada">
                            <div class="panel-heading panel-head-bazar_mada"> <span class="glyphicon glyphicon-wrench"></span>
                                <?= _getText("aide") ?>
                            </div>
                            <div class="panel-body ">
                                <fieldset>
                                    <legend>
                                        <?= _getText("aide") ?>
                                    </legend>
                                    <ol>
                                        <li>Cocher le bouton radio Sauvegarde pour sauvegarder la base puis cliquer sur <button class="btn btn-success">Valider</button></li>
                                        <li>Cocher le bouton radio Restauration, Veuillez selectionner le fichier de sauvegarde d&eacute;j&agrave; t&eactue;lecharger dans le tableau ci-dessous puis clicker sur <button class="btn btn-success">Valider</button></li>
                                        <li>Cliquer sur le bouton <button class="btn btn-success" type="button"><span class="glyphicon glyphicon-download"></span></button> </li> pour t&eacute;lecharger un fichier de sauvegarde
                                        <li>Cliquer sur le bouton <button class="btn btn-danger" type="button"><span class="glyphicon glyphicon-remove"></span></button> </li> pour supprimer un fichier de sauvegarde
                                    </ol>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once("../footer.php")  ?>
    <script type="text/javascript">
        window.addEventListener("load", () => {
            const loader = document.querySelector(".loader");

            loader.classList.add("loader-hidden");

            loader.addEventListener("transitionend", () => {
                document.body.removeChild("loader");
            })
        })

        function telecharge(fichier) {
            var url = ("<?= $dir  ?>" + fichier);
            alert(url);

        }

        function supprimer(fichier) {
            if (confirm("Voulez vous supprimer le fichier " + fichier)) {
                location.href = "<?php echo HTTP_EXEC_PARAM ?>supprimerFichierExec.php?f=" + fichier;
            }
        }
        $(document).ready(function() {
            $(".fichier").hide();
            $('input:radio[name="choix"]').change(
                function() {
                    if ($(this).is(':checked') && $(this).val() == 'R') {
                        $(".fichier").show();
                    } else {
                        $(".fichier").hide();
                    }
                });
            $('#mise_a_jour').click(function() {
                location.href = "<?= HTTP_EXEC_CREATION ?>mise_a_jourprof.php";
            })
        });
    </script>

<?php } else {
    require_once(RP_MAIN . "pages/vide.php");
} ?>