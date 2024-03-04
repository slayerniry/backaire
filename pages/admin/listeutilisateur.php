<?php
require_once("../header.php");
if ($utilisateur->habilitationMenu($_SERVER["SCRIPT_NAME"], $_SESSION["prf_code"])) {
    require_once(RP_MODELS . "utilisateur.class.php");
    $utilisateur = new utilisateur();
    $critere['ann_code'] = $_SESSION["ann_code"];
    $tab['utilisateur'] = $utilisateur->lireParCritere($critere);
    $_GET = array();
    $_GET = urldecodeGet($_SERVER['QUERY_STRING']);
    if (isset($_GET["code"])) {
        switch ($_GET["code"]) {
            case 0:
                $msg = "<li>" . _getText("mise.jour.effectue") . "</li>";
                break;
            default:
                $critere["user_code"] = $_GET["code"];
                $data = $utilisateur->lireParCritere($critere);
                $msg = "<li><b>" . _getText("nom") . "</b> :" . $data[0]["user_nom"] . "</li>";
                $msg .= "<li><b>" . _getText("prenom") . "</b> :" . $data[0]["user_prenom"] . "</li>";
                $msg .= "<li><b>" . _getText("matricule") . "</b> :" . $data[0]["user_matricule"] . "</li>";
                $msg .= "<li><b>" . _getText("login") . "</b> :" . ($data[0]["user_login"])  . "</li>";
                $msg .= "<li><b>" . _getText("profil") . "</b> :" . ($data[0]["prf_nom"]) . "</li>";
                break;
        }
    } ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-9">
                        <div class="panel panel-bazar_mada">
                            <div class="panel-heading panel-head-bazar_mada"> <span class="glyphicon glyphicon-th"></span>
                                <?= _getText("parametrage") ?> <span class="glyphicon glyphicon-menu-right"></span> <?= _getText("liste_utilisateur") ?>
                            </div>
                            <div class="panel-body ">
                                <?php
                                if ($utilisateur->habilitationButton($_SERVER["SCRIPT_NAME"], "btnAjouter", $_SESSION["prf_code"])) {
                                ?>
                                    <!--asina btnupdate izay miantso form-->
                                    <a class="btn btn-success " href="#" title="" data-toggle="popover" data-trigger="hover" data-content="<?php echo _getText('btnAjouter')  ?>"><span url="<?php echo HTTP_PAGE_ADMIN ?>formutilisateur.php?code=0" class="glyphicon glyphicon-plus btnupdate"></span></a>
                                <?php } ?>
                                <fieldset>
                                    <div class="table-responsive">
                                        <table class="table table-hover datatable_no_ajax  table-striped ">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <?php echo _getText("matricule") ?>
                                                    </th>
                                                    <th>
                                                        <?php echo _getText("nom") ?>
                                                    </th>
                                                    <th>
                                                        <?php echo _getText("login") ?>
                                                    </th>
                                                    <th>
                                                        <?php echo _getText("profil") ?>
                                                    </th>
                                                    <th>
                                                        <?php echo _getText("action") ?>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for ($i = 0; $i < $tab['utilisateur']['cnt']; $i++) {  ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $tab['utilisateur'][$i]['user_matricule'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $tab['utilisateur'][$i]['user_nom'] . " " .  $tab['utilisateur'][$i]['user_prenom'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $tab['utilisateur'][$i]['user_login'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $tab['utilisateur'][$i]['prf_nom'] ?>
                                                        </td>
                                                        <td nowrap>
                                                            <?php
                                                            if ($utilisateur->habilitationButton($_SERVER["SCRIPT_NAME"], "btnModifier", $_SESSION["prf_code"])) {
                                                            ?>
                                                                <a title="" data-toggle="popover" data-trigger="hover" data-content="<?php echo _getText('btnModifier')  ?>" class="btn btn-success " href="#"><span url="<?php echo HTTP_PAGE_ADMIN ?>formutilisateur.php?code=<?php echo $tab['utilisateur'][$i]['user_code'] ?>" class="glyphicon
glyphicon-pencil btnupdate"></span></a>
                                                            <?php } //fin if btnmodif 
                                                            if ($utilisateur->habilitationButton($_SERVER["SCRIPT_NAME"], "btnSupprimer", $_SESSION["prf_code"])) {
                                                            ?>
                                                                <a title="" url="<?php echo HTTP_EXEC_ADMIN ?>formutilisateurExec.php?code=<?php echo  $tab['utilisateur'][$i]['user_code'] ?>" data-toggle="popover" data-trigger="hover" data-content="<?php echo _getText('btnSupprimer')  ?>" confirm-message="<?php echo " <b>" . _getText("nom") . "</b> :" . $tab['utilisateur'][$i]['user_nom'] . " <br><b>" . _getText("prenom") . "</b>:" . $tab['utilisateur'][$i]['user_prenom'] ?>" class="btn btn-danger btn-confirm" href="#"><span class="glyphicon
glyphicon-remove"></span></a>
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
            data.order([4, 'desc']).draw();
        });
    </script>
<?php } else {
    require_once(RP_MAIN . "pages/vide.php");
} ?>