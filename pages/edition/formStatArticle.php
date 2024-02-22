<?php
require_once("../header.php");
if ($utilisateur->habilitationMenu($_SERVER["SCRIPT_NAME"], $_SESSION["prf_code"])) {
    require_once(RP_MODELS . "article.class.php");
    require_once(RP_MODELS . "categorie.class.php");
    require_once RP_MODELS . "fournisseur.class.php";
    $fournisseur = new fournisseur();
    $article = new article();
    $categorie = new categorie();
    $tab['categorie'] = $categorie->lireParCritere(array());
    $data = $article->lireStat(array());
    $tab['fournisseur'] = $fournisseur->lireParCritere(array());
?>
    <style type="text/css">
        .tab-alert {
            color: red;
            font-size: bold;
            font-style: italic;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bazar_mada">
                    <div class="panel-heading panel-head-bazar_mada">
                        <?= _getText("edition") ?> <span class="glyphicon glyphicon-menu-right"></span> <?= _getText("statistique") . " " . _getText("article") ?>
                    </div>
                    <div class="panel-body ">
                        <fieldset class="col-md-6">
                            <legend class="lg_rech" id="lg_rech" style="cursor: pointer;">
                                <?= _getText("recherche") ?> <span class="glyphicon glyphicon-search"></span>
                            </legend>
                            <form class="" method="post" id="form" action="<?= $_SERVER["PHP_SELF"] ?>">
                                <div class="form-group row">
                                    <label for="art_abrev" class="control-label col-sm-2">
                                        <?php echo _getText('categorie')  ?></label>
                                    <div class="col-sm-10">
                                        <select required id="cat_code" name="cat_code" class="form-control" style="width: 50%">
                                            <option value="">ND</option>
                                            <?php
                                            unset($tab['categorie']["cnt"]);
                                            foreach ($tab['categorie'] as $key => $value) { ?>
                                                <option value="<?php echo $value["cat_code"] ?>"><?php echo $value["cat_nom"] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="art_nom" class="control-label col-sm-2">
                                        <?php echo  _getText('abrev') ?></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="art_abrev" id="art_abrev" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                        <a class="btn btn-success" href="#" title=""><span onclick="affiche_modal_poccess('<?= HTTP_PAGE_EDITION  ?>formArt_abrevMulti.php')" class="glyphicon glyphicon-plus"></span></a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="art_nom" class="control-label col-sm-2">
                                        <?php echo _getText("designation") ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="art_nom" id="art_nom" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row" style="display: none">
                                    <label for="art_nom" class="control-label col-sm-2">
                                        <?php echo  _getText('abrev_old') ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="art_abrev_old" id="art_abrev_old" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="art_nom" class="control-label col-sm-4">
                                        <?php echo _getText('fournisseur') ?></label>
                                    <div class="col-sm-8">
                                        <select name="fou_code" id="fou_code" class="form-control" style="width: 50%">
                                            <option value="">ND</option>
                                            <?php foreach ($tab['fournisseur'] as $key => $value) { ?>
                                                <option value="<?= $value["fou_code"] ?>"> <?= html_entity_decode($value["fou_nom"])   ?> </option>
                                            <?php  } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="test_nbr_seuil_stock" class="control-label col-sm-2">
                                        <?php echo  _getText('alert.stock') ?></label>
                                    <div class="col-sm-2">
                                        <input type="checkbox" id="test_nbr_seuil_stock" class="form-control">
                                        <input type="hidden" name="test_nbr_seuil_stock" value="">
                                    </div>
                                    <label for="test_nbr_jour_peremption" class="control-label col-sm-2">
                                        <?php echo  _getText('alert.dp') ?></label>
                                    <div class="col-sm-2">
                                        <input type="checkbox" id="test_nbr_jour_peremption" class="form-control">
                                        <input type="hidden" name="test_nbr_jour_peremption" value="">
                                    </div>
                                    <label for="art_nom" class="control-label col-sm-2">
                                        <?php echo  _getText('stock.disponible.court') . " > 0 " ?></label>
                                    <div class="col-sm-2">
                                        <input type="checkbox" id="REST_SUP_0" class="form-control">
                                        <input type="hidden" name="REST_SUP_0" value="">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <center>
                                        <button id="btnvalider" type="button" class="btn btn-success">
                                            <?php echo _getText("btnValider")  ?>
                                        </button>
                                        <button type="button" class="btn btn-default" onclick="location.href='<?php echo $_SERVER["PHP_SELF"] ?>'">
                                            <?php echo _getText("initialiser") ?>
                                        </button>
                                        <button id="btnExporter" type="button" class="btn btn-info">
                                            <?php echo _getText("impirmer.pdf")  ?><span class="glyphicon glyphicon-print"></span>
                                        </button>
                                        <button id="btnExporterCSV" type="button" class="btn btn-warning">
                                            <?php echo _getText("impirmer.xls")  ?><span class="glyphicon glyphicon-print"></span>
                                        </button>
                                    </center>
                                </div>
                            </form>
                            <div align="center" id="charge"></div>
                        </fieldset>
                        <fieldset class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-hover " id="table">
                                    <thead>
                                        <th><?php echo _getText("categorie") ?></th>
                                        <th><?php echo _getText("designation")  ?></th>
                                        <th width="30px"><?php echo _getText("qte.seuil.court")  ?></th>
                                        <th width="30px"><?php echo _getText("qte_dispo_br_court")  ?></th>
                                        <th width="30px"><?php echo _getText("qte.pack.court")  ?></th>
                                        <th width="60px"><?php echo _getText("date.peremption.court")  ?></th>
                                        <th width="30px"><?php echo _getText("nbr.jour.peremption.court")  ?></th>
                                        <th width="30px"><?php echo _getText("nbr.jour.avant.peremption")  ?></th>
                                        <th width="30px"><?= _getText("alert.stock") ?></th>
                                        <th width="30px"><?php echo _getText("alert.dp") ?></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </thead>
                                </table>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php
    require_once("../footer.php");
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {

            <?php
            if (isset($_GET["type"])) { ?>
                $("#form").show("slow");

                <?php if ($_GET["type"] == 0) { ?>
                    $("#test_nbr_seuil_stock").attr("checked", "checked");
                    $('input[name="test_nbr_seuil_stock"]').val(1);
                <?php } else { ?>
                    $("#test_nbr_jour_peremption").attr("checked", "checked");
                    $('input[name="test_nbr_jour_peremption"]').val(1);

                    $("#REST_SUP_0").attr("checked", "checked");
                    $('input[name="REST_SUP_0"]').val(1);


                <?php } ?>

            <?php } else { ?>
                $("#form").hide("slow");
            <?php } ?>

            $('input[type="checkbox"]').change(function(event) {
                var id = $(this).attr("id");
                if ($(this).prop("checked")) {
                    $('input[name="' + id + '"]').val(1);
                } else {
                    $('input[name="' + id + '"]').val(0);
                }
            });
            $('#test_nbr_jour_peremption').change(function(event) {
                if ($(this).prop("checked")) {
                    $("#REST_SUP_0").prop("checked", "checked");
                } else {
                    $("#REST_SUP_0").prop("checked", "");
                }
                $('input[type="checkbox"]').trigger("change");
            });
            $("#cat_code").select2();
            $("#fou_code").select2();
            $("#form").attr("display", "none");


            //$("#form").toggle("fast");
            $("#lg_rech").click(function(event) {
                $("#form").toggle("slow");
            });
            var var_url = "?art_nom=" + $("#art_nom").val() + "";
            var_url += "&fou_code=" + $("#fou_code").val() + "";
            var_url += "&art_abrev=" + $("#art_abrev").val() + "";
            var_url += "&art_abrev_old=" + $("#art_abrev_old").val() + "";
            var_url += "&cat_code=" + $("#cat_code").val() + "";
            var_url += "&test_nbr_seuil_stock=" + $('input[name="test_nbr_seuil_stock"]').val() + "";
            var_url += "&test_nbr_jour_peremption=" + $('input[name="test_nbr_jour_peremption"]').val() + "";
            var_url += "&REST_SUP_0=" + $('input[name="REST_SUP_0"]').val() + "";
            var data = $('#table').DataTable({
                responsive: true,
                "bFilter": false,
                "oLanguage": {
                    "sUrl": "<?php echo HTTP_LANG_DATATABLE ?>fr/fr_FR.txt"
                },
                "processing": true,
                "serverSide": true,
                "createdRow": function(row, data, dataIndex) {
                    if (data[8] > 0) {
                        $(row).addClass('tab-alert');
                    }
                    if (data[9] > 0) {
                        $(row).addClass('tab-alert');
                    }
                },
                ajax: "<?= HTTP_AJAX_CREATION . 'ajaxlistearticleStat.php' ?>" + var_url,
                "aoColumnDefs": [{
                        "aTargets": [1],
                        "mData": 1,
                        'bSortable': true,
                        "mRender": function(data, type, full) {
                            var txt = data;
                            <?php
                            if ($utilisateur->habilitationButton("/stock/pages/creation/listearticle.php", "btnModifier", $_SESSION["prf_code"])) {
                            ?>
                                txt = '<span><a style="text-decoration:none;cursor:pointer" onClick="affiche_modal_poccess(\'<?php echo HTTP_PAGE_CREATION ?>formarticle.php?mvt_code=0&page=statarticle&code=' + full[10] + '\')" >' + data + ' - <b>' + full[11] + '</b></a></span>';
                            <?php } ?>
                            return txt;
                        }
                    },
                    {
                        "aTargets": [2],
                        "mData": 2,
                        'bSortable': true,
                        "mRender": function(data, type, full) {
                            var txt = '<div align="right"><span  class="label label-success">' + data + '</div></span>';
                            return txt;
                        }
                    },
                    {
                        "aTargets": [3],
                        "mData": 3,
                        'bSortable': true,
                        "mRender": function(data, type, full) {
                            var txt = '<div align="right"><span  class="badge">' + formatMoney(data) + '</div></span>';
                            return txt;
                        }
                    },
                    {
                        "aTargets": [4],
                        "mData": 4,
                        'bSortable': true,
                        "mRender": function(data, type, full) {
                            var txt = '<div align="right"><span  class="">' + formatMoney(data) + '</div></span>';
                            return txt;
                        }
                    },
                    {
                        "aTargets": [5],
                        "mData": 5,
                        'bSortable': true,
                        "mRender": function(data, type, full) {
                            var txt = '<div align="center"><span  class="">' + formatDate(data) + '</div></span>';
                            return txt;
                        }
                    },
                    {
                        "aTargets": [6],
                        "mData": 6,
                        'bSortable': true,
                        "mRender": function(data, type, full) {
                            var txt = '<div align="right"><span  class="label label-success">' + (data) + '</div></span>';
                            return txt;
                        }
                    },
                    {
                        "aTargets": [7],
                        "mData": 7,
                        'bSortable': true,
                        "mRender": function(data, type, full) {
                            var txt = '<div align="right"><span  class="badge">' + (data) + '</div></span>';
                            return txt;
                        }
                    },
                    {
                        "aTargets": [8],
                        "mData": 8,
                        'bSortable': true,
                        "mRender": function(data, type, full) {
                            var txt = "";
                            if (data > 0) {
                                txt = '<div align="center"><span  class="label label-danger">1</div></span>';
                            } else {
                                txt = '<div align="center"><span  class="label ">0</div></span>';
                            }
                            return txt;
                        }
                    },
                    {
                        "aTargets": [9],
                        "mData": 9,
                        'bSortable': true,
                        "mRender": function(data, type, full) {
                            var txt = "";
                            if (data > 0) {
                                txt = '<div align="center"><span  class="label label-danger">1</div></span>';
                            } else {
                                txt = '<div align="center"><span  class="label ">0</div></span>';
                            }
                            return txt;
                        }
                    },
                    {
                        "aTargets": [10],
                        "visible": false,
                    },
                    {
                        "aTargets": [11],
                        "visible": false,
                    },
                    {
                        "aTargets": [12],
                        "visible": false,
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
            new $.fn.dataTable.FixedHeader(data);
            data.order([5, 'asc']).draw();


            $("#btnvalider").on("click", function() {
                $("#form").removeAttr('target');
                var var_url = "?art_nom=" + $("#art_nom").val() + "";

                var_url += "&fou_code=" + $("#fou_code").val() + "";

                var_url += "&art_abrev=" + $("#art_abrev").val() + "";
                var_url += "&art_abrev_old=" + $("#art_abrev_old").val() + "";
                var_url += "&cat_code=" + $("#cat_code").val() + "";
                var_url += "&test_nbr_seuil_stock=" + $('input[name="test_nbr_seuil_stock"]').val() + "";
                var_url += "&test_nbr_jour_peremption=" + $('input[name="test_nbr_jour_peremption"]').val() + "";
                var_url += "&REST_SUP_0=" + $('input[name="REST_SUP_0"]').val() + "";
                data.ajax.url("<?= HTTP_AJAX_CREATION ?>ajaxlistearticleStat.php" + var_url).load();
                data.order([5, 'asc']).draw();
                new $.fn.dataTable.FixedHeader(data);
            });
            $("#btnExporter").on('click', function(event) {
                $("#charge").html('<img src="../img/loading.gif"  />');
                $("#form").attr({
                    action: '<?php echo HTTP_EXEC_EDITION ?>formexportarticleStatExec.php?pv=0',
                    target: '_blank'
                });
                $("#form").submit();
                $("#charge").html('');
            });
            $("#btnExporterCSV").on('click', function(event) {
                $("#form").attr({
                    action: '<?php echo HTTP_EXEC_EDITION ?>formexportarticleStatCSVExec.php?pv=0',
                    target: '_blank'
                });
                $("#form").submit();
            });


        });
    </script>
<?php } else {
    require_once(RP_MAIN . "pages/vide.php");
} ?>