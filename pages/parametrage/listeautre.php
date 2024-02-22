<?php

require_once("../header.php");

if ($utilisateur->habilitationMenu($_SERVER["SCRIPT_NAME"], $_SESSION["prf_code"])) {


    require_once(RP_MODELS . "type_reference.class.php");
    require_once(RP_MODELS . "referentielle.class.php");

    $type_reference = new type_reference();
    $referentielle = new referentielle();

    $critereType["prf_code"] = $_SESSION["prf_code"];

    $tab['type_reference'] = $type_reference->lireParCritere($critereType);

    if (isset($_GET["type"])) {
        $type = $_GET["type"];
    } else {
        $type = "PROFIL";
    }

?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">

                    <div class="col-md-9">
                        <div class="panel panel-bazar_mada">
                            <div class="panel-heading panel-head-bazar_mada"> <span class="glyphicon glyphicon-th"></span> <?= _getText("referentielle") ?> </div>
                            <div class="panel-body ">

                                <div class="panel with-nav-tabs panel-info">
                                    <div class="panel-heading">
                                        <ul class="nav nav-tabs">
                                            <?php

                                            for ($i = 0; $i < $tab['type_reference']['cnt']; $i++) {

                                                $active = ($type == $tab['type_reference'][$i]['tpr_code'] ? "active" : "");
                                            ?>
                                                <li class="<?php echo  $active ?>">
                                                    <a href="#<?php echo $tab['type_reference'][$i]['tpr_code']  ?>" data-toggle="tab">
                                                        <?php echo $tab['type_reference'][$i]['tpr_nom']  ?>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            <?php for ($i = 0; $i < $tab['type_reference']['cnt']; $i++) {

                                                $active = ($type == $tab['type_reference'][$i]['tpr_code'] ? "active" : "");

                                            ?>
                                                <div class="tab-pane fade in <?php echo  $active ?>" id="<?php echo $tab['type_reference'][$i]['tpr_code']  ?>">
                                                    <?php

                                                    $tab_tpr_libelle =  explode("|", $tab['type_reference'][$i]['tpr_libelle']);

                                                    //referentille
                                                    $critereRef['tpr_code'] = $tab['type_reference'][$i]['tpr_code'];

                                                    if ($tab['type_reference'][$i]['tpr_annee_scolaire'] == 1) {
                                                        $critereRef['ann_code'] = $_SESSION["ann_code"];
                                                    } else {
                                                        unset($critereRef['ann_code']);
                                                    }



                                                    $tab['referentielle'] = $referentielle->lireParCritere($critereRef);

                                                    ?>
                                                    <fieldset>

                                                        <?php

                                                        if ($utilisateur->habilitationButton($_SERVER["SCRIPT_NAME"], "btnAjouter", $_SESSION["prf_code"])) {

                                                        ?>
                                                            <a class="btn btn-success " href="#" title="" data-toggle="popover" data-trigger="hover" data-content="<?php echo _getText('btnAjouter')  ?>"><span url="<?php echo HTTP_PAGE_PARAM ?>formreferentielle.php?code=0&tpr_code=<?php echo  $critereRef['tpr_code'] ?>" class="glyphicon glyphicon-plus btnupdate"></span></a>

                                                        <?php } ?>
                                                        <div class="table-responsive">
                                                            <table class="table table-hover datatable_no_ajax">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="100px">
                                                                            <?php echo _getText("abrev")  ?>
                                                                        </th>
                                                                        <?php for ($j = 0; $j < count($tab_tpr_libelle); $j++) { ?>
                                                                            <th>
                                                                                <?php echo $tab_tpr_libelle[$j]  ?>
                                                                            </th>
                                                                        <?php } ?>
                                                                        <th width="50px">
                                                                            <?php echo _getText("action") ?>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php for ($r = 0; $r < $tab['referentielle']['cnt']; $r++) {   ?>
                                                                        <tr>
                                                                            <td>
                                                                                <?php echo $tab['referentielle'][$r]['ref_abrev']  ?>
                                                                            </td>
                                                                            <?php for ($j = 0; $j < count($tab_tpr_libelle); $j++) { ?>
                                                                                <td>
                                                                                    <?php echo $tab['referentielle'][$r]['ref_champ' . ($j + 1)]  ?>
                                                                                </td>
                                                                            <?php } //fin for lib 
                                                                            ?>
                                                                            <td nowrap>

                                                                                <?php

                                                                                if ($utilisateur->habilitationButton($_SERVER["SCRIPT_NAME"], "btnModifier", $_SESSION["prf_code"])) {

                                                                                ?>

                                                                                    <a title="" data-toggle="popover" data-trigger="hover" data-content="<?php echo _getText('btnModifier')  ?>" class="btn btn-success " href="#"><span url="<?php echo HTTP_PAGE_PARAM ?>formreferentielle.php?code=<?php echo  $tab['referentielle'][$r]['ref_code'] ?>&tpr_code=<?php echo  $critereRef['tpr_code'] ?>" class="glyphicon
                                                                    glyphicon-pencil btnupdate"></span></a>

                                                                                    <?php }

                                                                                $tabtpr_code_test = array("TAUX", "CLIENT", "PROFIL");

                                                                                if (!(in_array($tab['type_reference'][$i]['tpr_code'], $tabtpr_code_test))) {

                                                                                    if ($utilisateur->habilitationButton($_SERVER["SCRIPT_NAME"], "btnSupprimer", $_SESSION["prf_code"])) {

                                                                                    ?>

                                                                                        <a title="" url="<?php echo HTTP_EXEC_PARAM ?>formreferentielleExec.php?code=<?php echo  $tab['referentielle'][$r]['ref_code'] ?>&type=<?php echo $critereRef['tpr_code'] ?>" data-toggle="popover" data-trigger="hover" data-content="<?php echo _getText('btnSupprimer')  ?>" confirm-message="<?php echo $tab['referentielle'][$r]['ref_champ' . ('1')]  ?>" class="btn btn-danger btn-confirm" href="#"><span class="glyphicon
                                                                    glyphicon-remove"></span></a>
                                                                                <?php }
                                                                                } ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } //fin for  referentielle 
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel panel-bazar_mada">
                            <div class="panel-heading panel-head-bazar_mada"> <span class="glyphicon glyphicon-screenshot"></span> <?= _getText("aide") ?> </div>
                            <div class="panel-body ">

                                <fieldset>
                                    <legend>
                                        <?= _getText("liste") ?>
                                    </legend>
                                    <ol>
                                        <li>
                                            <?= _getText("cliquer_sur") ?>
                                            <?= _getText("onglet") ?>
                                        </li>
                                        <li>
                                            <?= _getText("cliquer_sur") ?> <a class="btn btn-success" href="#" title=""><span class="glyphicon glyphicon-plus"></span></a>
                                            <?= _getText("ajouter") ?>
                                        </li>
                                        <li>
                                            <?= _getText("cliquer_sur") ?> <a class="btn btn-success" href="#" title=""><span class="glyphicon glyphicon-pencil"></span></a>
                                            <?= _getText("modifier") ?>
                                        </li>
                                        <li>
                                            <?= _getText("cliquer_sur") ?> <a class="btn btn-danger" href="#" title=""><span class="glyphicon glyphicon-remove"></span></a>
                                            <?= _getText("supprimer") ?>
                                        </li>
                                        <li>...</li>
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
        jQuery(document).ready(function($) {

            /*$("#btnExporter").on('click', function(event) {

                location.href = '<?php echo HTTP_EXEC_ADMIN ?>formexportAutreExec.php';

            });*/


            data.order([3, 'desc']).draw();

        });
    </script>

<?php } else {
    require_once(RP_MAIN . "pages/vide.php");
} ?>