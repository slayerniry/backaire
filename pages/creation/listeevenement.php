<?php

require_once("../header.php");

if ($utilisateur->habilitationMenu($_SERVER["SCRIPT_NAME"] . "", $_SESSION["prf_code"])) {

    require_once(RP_MODELS . "t_event.class.php");
    require_once(RP_MODELS . "type_event.class.php");

    $type_event = new type_event();
    $t_event = new t_event();

    $tab['t_type_event'] = $type_event->lireParCritere(array());

    if (isset($_GET["code"])) {

        switch ($_GET["code"]) {
            case 0:
                $msg = "<li>" . _getText("mise.jour.effectue") . "</li>";
                break;
            default:
                $critere["id_event"] = $_GET["code"];
                $data = $t_event->lireParCritere($critere);

                $msg .= "<li><b>" . _getText("titre") . "</b> :" . ($data[0]["titre"]) . "</li>";
                $msg .= "<li><b>" . _getText("date") . "</b> :" . convertDateFormat4($data[0]["date_event"]) . "</li>";
                $msg .= "<li><b>" . _getText("contenu") . "</b> :" . ($data[0]["contenu"])  . "</li>";


                break;
        }
    }
?>
    <style>
        tr.archive {
            background-color: red;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">


                    <div class="col-md-9">
                        <div class="panel panel-bazar_mada">
                            <div class="panel-heading panel-head-bazar_mada">
                                <?= _getText("creation") ?> <span class="glyphicon glyphicon-menu-right"></span> <?= _getText("liste.t_event") . '<span class="glyphicon glyphicon-menu-right"></span>' . $ent_type_libelle ?>
                            </div>
                            <div class="panel-body  ">
                                <fieldset class="col-md-9">
                                    <legend class="lg_rech" id="lg_rech" style="cursor: pointer;">
                                        <?= _getText("recherche") ?> <span class="glyphicon glyphicon-search"></span>
                                    </legend>
                                    <form class="" method="post" id="form" action="<?= $_SERVER["PHP_SELF"] ?>">
                                        <!--<input type="hidden" name="ent_ref" id="ent_ref">-->
                                        <div class="form-group row">
                                            <label for="date_event_min" class="control-label col-sm-2">
                                                <?php echo  _getText('date') ?></label>
                                            <div class="col-sm-4">
                                                <input type="date" name="date_event_min" id="date_event_min" class="form-control">
                                            </div>
                                            <div class="col-sm-1"><label for="date_event_max" class="control-label col-sm-2"><?= _getText("au") ?></label></div>
                                            <div class="col-sm-4">
                                                <input type="date" name="date_event_max" id="date_event_max" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row ">
                                            <div class="col-sm-2">
                                                <label for="id_type_event_rech"><?= _getText("type") ?></label>
                                            </div>
                                            <div class="col-sm-4">
                                                <select name="id_type_event_rech" id="id_type_event_rech" class="form-control">
                                                    <option value=""><?= _getText("tous") ?></option>
                                                    <?php
                                                    foreach ($tab['t_type_event'] as $key => $value) {
                                                    ?>
                                                        <option value="<?= $value["id_type_event"] ?>"><?= $value["type_event"] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <div class="col-sm-2">
                                                <label for="contenu_rech"><?= _getText("contenu") ?></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input name="contenu_rech" id="contenu_rech" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row ">
                                            <center>
                                                <button id="btnvalider" type="button" class="btn btn-success">
                                                    <?php echo _getText("btnValider")  ?>
                                                </button>

                                                <button type="button" class="btn btn-info" onclick="location.href='<?php echo $_SERVER["PHP_SELF"] . "?ent_type=" . $_GET["ent_type"] ?>'">
                                                    <?php echo _getText("initialiser") ?>
                                                </button>
                                            </center>
                                        </div>

                                    </form>

                                </fieldset>

                                <div class="row">
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                </div>

                                <fieldset>

                                    <?php

                                    if ($utilisateur->habilitationButton($_SERVER["SCRIPT_NAME"], "btnAjouter", $_SESSION["prf_code"])) {

                                    ?>
                                        <a class="btn btn-success " href="#" title="" data-toggle="popover" data-trigger="hover" data-content="<?= _getText("btnAjouter") ?>" data-original-title=""><span url="<?= HTTP_PAGE_CREATION ?>formt_event.php?code=0" class="glyphicon glyphicon-plus btnupdate"></span></a>

                                    <?php } ?>

                                    <div class="table-responsive">

                                        <table class="table table-hover table-striped   table-bordered " id="table">
                                            <thead>
                                                <tr>
                                                    <th width="80px"><?php echo _getText("titre") ?></th>
                                                    <th width="80px"><?php echo _getText("date") ?></th>
                                                    <th width="80px"><?php echo _getText("type") ?></th>
                                                    <th width="">
                                                        <?php echo _getText("contenu") ?>
                                                    </th>
                                                    <th width="100px">
                                                        <?= _getText('action')  ?>
                                                    </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
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
                                            <?= _getText("cliquer_sur") ?>
                                            <span class="glyphicon glyphicon-search"></span> <?php echo _getText("aide.recheche") ?>
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
                                            <?= _getText("cliquer_sur") ?> <a class="btn btn-info" href="#" title=""><span class="glyphicon glyphicon-book"></span></a>
                                            <?= _getText("aide.detail") ?>
                                        </li>
                                        <li>
                                            <?= _getText("cliquer_sur") ?> <a class="btn btn-danger" href="#" title=""><span class="glyphicon glyphicon-remove"></span></a>
                                            <?= _getText("supprimer") ?>
                                        </li>
                                    </ol>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once("../footer.php"); ?>

    <div id="confirm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="confirm-modal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        <?php echo _getText("info")  ?>
                    </h4>
                </div>
                <div class="modal-body" id="modal-body-confirm">
                    <fieldset>
                        <ul>
                            <?= (_getText("archive.message"))  ?>
                        </ul>
                    </fieldset>
                    <center>
                        <button type="button" data-dismiss="modal" class="btn btn-success" id="delete"><?= _getText("btnValider") ?></button>
                        <button type="button" data-dismiss="modal" class="btn btn-danger"> <?= _getText("btnAnnuler")  ?> </button>
                    </center>
                </div>
            </div>
        </div>
    </div>


    <script type="application/javascript">
        $(document).ready(function($) {

            $("#form").toggle("fast");

            $("#lg_rech").click(function(event) {
                $("#form").toggle("slow");
            });

            var var_url = "?id_type_event_rech=" + $("#id_type_event_rech").val() + "";
            var_url += "&contenu_rech=" + $("#contenu_rech").val() + "";

            var_url += "&date_event_min=" + $("#date_event_min").val() + "";
            var_url += "&date_event_max=" + $("#date_event_max").val() + "";


            $("#date_event_min").change(function(event) {
                $("#date_event_max").val(rampitso($(this).val()));
            });

            $("#date_event_min").trigger('change');
            $("#btnvalider").trigger("click");


            var data = $('#table').DataTable({
                rowCallback: function(row, data) {

                },
                "pagingType": 'full',
                "responsive": true,
                "bFilter": false,
                "oLanguage": {
                    "sUrl": "<?php echo HTTP_LANG_DATATABLE ?>fr/fr_FR.txt"
                },
                "processing": true,
                "serverSide": true,
                ajax: "<?= HTTP_AJAX_CREATION . 'ajaxlistet_event.php' ?>" + var_url,
                "aoColumnDefs": [{
                        "aTargets": [4],
                        "mData": 4,
                        "mRender": function(data, type, full) {

                            var btnmodifier = "";
                            var btndetail = "";
                            var btnsuppr = "";
                            var btndetail2 = "";

                            <?php
                            if ($utilisateur->habilitationButton($_SERVER["SCRIPT_NAME"], "btnModifier", $_SESSION["prf_code"])) {
                            ?>
                                btnmodifier = '<a title="<?= _getText('btnModifier') ?>" data-toggle="popover" data-trigger="hover" data-content="<?php echo _getText('btnModifier')  ?>" class="btn btn-success " href="#"><span onClick="affiche_modal_poccess(\'<?php echo HTTP_PAGE_CREATION ?>formt_event.php?code=' + data + '\')" class="glyphicon glyphicon-pencil btnupdate"></span></a>';
                            <?php } ?>

                            <?php
                            if ($utilisateur->habilitationButton($_SERVER["SCRIPT_NAME"] . "", "detail", $_SESSION["prf_code"])) {
                            ?>

                                //btndetail = '<a title="<?= _getText('detail') ?>(' + full[5] + ')" data-toggle="popover" data-trigger="hover" data-content="<?php echo _getText('detail')  ?>" class="btn btn-info " href="<?php echo HTTP_PAGE_CREATION ?>listedett_event.php?id_event=' + data + '"><span class="glyphicon glyphicon-book btnupdate" ></span></a><span>&nbsp;</span>';
                                btndetail = "";

                                btndetail2 = '';

                                /*if (full[5] == 1) {
                                    btndetail2 = '<span class="glyphicon glyphicon-lock"></span>';

                                }*/

                            <?php } ?>

                            <?php

                            if ($utilisateur->habilitationButton($_SERVER["SCRIPT_NAME"] . "", "btnSupprimer", $_SESSION["prf_code"])) {

                            ?>

                                btnsuppr = '<a title="<?php echo _getText('btnSupprimer')  ?>" class="btn btn-danger" href="#"><span class="glyphicon glyphicon-remove" onClick="confirm_proccess(\'<?php echo HTTP_EXEC_CREATION ?>formt_eventExec.php?code=' + data + '&ent_type=<?= (isset($_GET["ent_type"]) ? $_GET["ent_type"] : "") ?>\'  ,\'<?= _getText("message.supprimer") . " " . _getText('date') . " :";  ?>' + formatDate(full[0]) +
                                    '\')"></span></a>';

                                /*if (full[8] == 1) {
                                    btnsuppr = '';

                                }*/


                            <?php } ?>

                            return '<div class="btn-group-horizontal">' + btnmodifier + '<span>&nbsp;</span>' + btndetail + '<span>&nbsp;</span>' + btndetail2 + '<span>&nbsp;</span>' + btnsuppr + '</div>';
                        }
                    },
                    {
                        "aTargets": [0],
                        "mData": 0,
                        "mRender": function(data, type, full) {

                            return '<div align="center">' + (data) + '</div>';
                        }
                    },
                    {
                        "aTargets": [1],
                        "mData": 1,
                        "mRender": function(data, type, full) {

                            return '<div align="center">' + formatDate(data) + '</div>';
                        }
                    },
                    {
                        "aTargets": [5],
                        "mData": 5,
                        "visible": false

                    },
                ],
                "aLengthMenu": [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "<?php echo _getText('global.pagination.tout'); ?>"]
                ],
                "drawCallback": function(settings) {
                    $(this).css("table-layout", "fixed");
                }
            });


            data.order([5, 'desc']).draw();

            $("#btnvalider").on("click", function() {

                $("#form").removeAttr('target');

                var var_url = "?id_type_event_rech=" + $("#id_type_event_rech").val() + "";
                var_url += "&contenu_rech=" + $("#contenu_rech").val() + "";

                var_url += "&date_event_min=" + $("#date_event_min").val() + "";
                var_url += "&date_event_max=" + $("#date_event_max").val() + "";

                data.ajax.url("<?= HTTP_AJAX_CREATION ?>ajaxlistet_event.php" + var_url).load();

                data.order([5, 'desc']).draw();

            });

        });
    </script>

<?php } else {
    require_once(RP_MAIN . "pages/vide.php");
} ?>