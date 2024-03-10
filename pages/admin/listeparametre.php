<?php
require_once("../header.php");
if ($utilisateur->habilitationMenu($_SERVER["SCRIPT_NAME"], $_SESSION["prf_code"])) {
    require_once(RP_MODELS . "parametre.class.php");
    $parametre = new parametre();
    $critere['param_visible'] = 1;
    $tab['parametre'] = $parametre->lireParCritere($critere);
    $_GET = array();
    $_GET = urldecodeGet($_SERVER['QUERY_STRING']);
    if (isset($_GET["code"])) {
        $critere["param_key"] = $_GET["code"];
        $data = $parametre->lireParCritere($critere);
        $msg = "<li><b>" . _getText("cle") . "</b> :" . $data[0]["param_key"] . "</li>";
        $msg .= "<li><b>" . _getText("valeur") . "</b> :" . $data[0]["param_value"] . "</li>";
        $msg .= "<li><b>" . _getText("description") . "</b> :" . $data[0]["param_desc"] . "</li>";
        $msg .= "<li><b>" . _getText("commentaire") . "</b> :" . ($data[0]["param_comment"])  . "</li>";
    } ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-9">
                        <div class="panel panel-bazar_mada">
                            <div class="panel-heading panel-head-bazar_mada"> <span class="glyphicon glyphicon-th"></span>
                                <?= _getText("parametrage") ?> <span class="glyphicon glyphicon-menu-right"></span> <?= _getText("liste_parametre") ?>
                            </div>
                            <div class="panel-body ">
                                <fieldset>
                                    <div class="table-responsive">
                                        <table class="table table-hover datatable_no_ajax">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <?php echo _getText("cle") ?>
                                                    </th>
                                                    <th>
                                                        <?php echo _getText("valeur") ?>
                                                    </th>
                                                    <th>
                                                        <?php echo _getText("description") ?>
                                                    </th>
                                                    <th>
                                                        <?php echo _getText("action") ?>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for ($i = 0; $i < $tab['parametre']['cnt']; $i++) {  ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $tab['parametre'][$i]['param_key'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $tab['parametre'][$i]['param_value']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo substr($tab['parametre'][$i]['param_desc'], 0, 20) . "...";  ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($utilisateur->habilitationButton($_SERVER["SCRIPT_NAME"], "btnModifier", $_SESSION["prf_code"])) {
                                                            ?>
                                                                <a title="" data-toggle="popover" data-trigger="hover" data-content="<?php echo _getText('btnModifier')  ?>" class="btn btn-success " href="#"><span url="<?php echo HTTP_PAGE_ADMIN ?>formparametre.php?code=<?php echo $tab['parametre'][$i]['param_key'] ?>" class="glyphicon
glyphicon-pencil btnupdate"></span></a>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel panel-bazar_mada">
                            <div class="panel-heading panel-head-bazar_mada"> <span class="glyphicon glyphicon-wrench"></span>
                                <?= _getText("aide")  ?>
                            </div>
                            <div class="panel-body ">
                                <fieldset>
                                    <legend>
                                        <?= _getText("liste") ?>
                                    </legend>
                                    <ol>
                                        <li>
                                            <?= _getText("cliquer_sur") ?> <a class="btn btn-success" href="#" title=""><span class="glyphicon glyphicon-pencil"></span></a>
                                            <?= _getText("modifier") ?>
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
<?php } else {
    require_once(RP_MAIN . "pages/vide.php");
} ?>