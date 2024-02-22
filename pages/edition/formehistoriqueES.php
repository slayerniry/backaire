<?php
require_once("../header.php");

require_once(RP_MODELS . "article.class.php");
require_once RP_MODELS . "categorie.class.php";
$article = new article();
$categorie = new categorie();

if ($utilisateur->habilitationMenu($_SERVER["SCRIPT_NAME"], $_SESSION["prf_code"])) {

    $tab_php_self = explode("/", $_SERVER['PHP_SELF']);
    require_once($_SERVER["DOCUMENT_ROOT"] . "/" .  $tab_php_self[1] . "/" . "config.inc.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/" .  $tab_php_self[1] . "/" . "include/session.php");
    loadRessource("fr");

    $tab['categorie'] = $categorie->lireParCritere(array());
?>
    <style type="text/css">
        th {
            text-align: center;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-bazar_mada">
                            <div class="panel-heading panel-head-bazar_mada"> <span class="glyphicon glyphicon-th"></span>
                                <?= _getText("edition") ?> <span class="glyphicon glyphicon-menu-right"></span> <?= _getText("historique_ES") ?>
                            </div>
                            <div class="panel-body ">
                                <fieldset>
                                    <legend id="lg_search"><?= _getText("recherche") ?><span style="margin-left: 10px;" class="glyphicon  glyphicon-search"></span> </legend>
                                    <form class="" method="post" id="form" action="<?= $_SERVER["PHP_SELF"] ?>">
                                        <div class="form-group row">
                                            <label for="mvt_date_min" class="control-label col-sm-2">
                                                <?php echo  _getText('date.du') ?></label>
                                            <div class="col-sm-2">
                                                <input type="date" name="mvt_date_min" id="mvt_date_min" class="form-control">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="time" name="mvt_time_min" id="mvt_time_min" class="form-control">
                                            </div>
                                            <div class="col-sm-1"><label for="mvt_date_max" class="control-label col-sm-2"><?= _getText("au") ?></label></div>
                                            <div class="col-sm-2">
                                                <input type="date" name="mvt_date_max" id="mvt_date_max" class="form-control">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="time" name="mvt_time_max" id="mvt_time_max" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="control-label col-sm-2">
                                                <?php echo _getText('type')  ?></label>
                                            <div class="col-sm-6">
                                                <div class="col-xs-3">
                                                    <label for="mvt_type_T" class="control-label">
                                                        <input checked class="form-control" type="radio" name="mvt_type_radio" value="" id="mvt_type_T"><?= _getText("global.pagination.tout")  ?></label>
                                                </div>
                                                <div class="col-xs-3">
                                                    <label for="mvt_type_E" class="control-label">
                                                        <input class="form-control" type="radio" name="mvt_type_radio" value="E" id="mvt_type_E"><?= _getText("entrer")  ?></label>
                                                </div>
                                                <div class="col-xs-3">
                                                    <label for="mvt_type_S" class="control-label">
                                                        <input class="form-control" type="radio" name="mvt_type_radio" value="S" id="mvt_type_S"><?= _getText("sortie")  ?></label>
                                                </div>
                                                <input type="hidden" name="mvt_type" id="mvt_type">
                                            </div>
                                            <label for="" class="control-label col-sm-2">
                                                <?php echo _getText('paye.plus.tard')  ?></label>
                                            <div class="col-md-2">
                                                <input id="mvt_montant_paye" type="checkbox" class="form-control">
                                                <input name="mvt_montant_paye" type="hidden">
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label for="art_code" class="control-label col-sm-2">
                                                <?php echo _getText('article')  ?></label>
                                            <div class="col-sm-6">
                                                <select class="form-control" id="art_code" name="art_code" required style="width: 100%">
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="art_abrev" class="control-label col-sm-2">
                                                <?php echo _getText('abrev') ?></label>
                                            <div class="col-sm-6">
                                                <input type="text" name="art_abrev" id="art_abrev" class="form-control">
                                            </div>
                                            <div class="col-sm-2">
                                                <a class="btn btn-success" href="#" title=""><span onclick="affiche_modal_poccess('<?= HTTP_PAGE_EDITION ?>formArt_abrevMulti.php')" class="glyphicon glyphicon-plus"></span></a>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="art_abrev" class="control-label col-sm-2">
                                                <?php echo _getText('categorie') ?></label>
                                            <div class="col-sm-8">
                                                <select required id="cat_code" name="cat_code" class="form-control" style="width: 50%">
                                                    <option value="">ND</option>
                                                    <?php
                                                    unset($tab['categorie']["cnt"]);
                                                    foreach ($tab['categorie'] as $key => $value) { ?>
                                                        <option value="<?php echo $value["cat_code"] ?>"><?= replace_texte_etat_decode($value["cat_nom"]) ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <center>
                                                <button id="btnvalider" type="button" class="btn btn-success">
                                                    <?php echo _getText("btnValider")  ?>
                                                </button>
                                                <button type="button" class="btn btn-info" onclick="location.href='<?php echo $_SERVER["PHP_SELF"] ?>'">
                                                    <?php echo _getText("initialiser") ?>
                                                </button>
                                                <button id="btnExportXLS" type="button" class="btn btn-warning" data-toggle="popover" data-trigger="hover" data-content="<?= _getText("impirmer.xls") ?>">

                                                    <span class="glyphicon glyphicon-print"></span>
                                                </button>
                                            </center>
                                        </div>
                                    </form>

                                </fieldset>


                                <div class="panel with-nav-tabs panel-info">
                                    <div class="panel-heading">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#Liste" data-toggle="tab" aria-expanded="true">
                                                    <?= _getText("liste") ?></a>
                                            </li>
                                            <li class="">
                                                <a href="#Perdu" data-toggle="tab" aria-expanded="false">
                                                    <?= _getText("Liste.non.vendu") ?></a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade active in" id="Liste">
                                                <table class="table table-hover table-striped   table-bordered " id="table">
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo _getText("abrev") . " (" . _getText("article") . ")"  ?></th>
                                                            <th><?php echo _getText("designation") ?></th>
                                                            <th width="30px"><?php echo _getText("qte_court") ?> </th>
                                                            <th width="100px"><?php echo _getText("prix.achat") ?> </th>
                                                            <th width="100px"><?php echo _getText("prix.vente.unitaire") ?> </th>
                                                            <th width="100px"><?php echo _getText("montant") ?> </th>

                                                            <th width="70px"> <?= _getText('date')  ?></th>
                                                            <th width="70px"> <?= _getText('heure')  ?></th>
                                                            <th width="20px"> <?= _getText('type')  ?></th>
                                                            <th width="70px"><?= _getText('date.peremption.court')  ?></th>
                                                            <th width="5px"></th>
                                                            <th width="15px">
                                                                <div class="btn btn-warning"><span class="glyphicon glyphicon-lock"></span></div>
                                                            </th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th>
                                                                <div class="btn btn-warning"><span class="glyphicon glyphicon-credit-card"></span></div>
                                                            </th>


                                                        </tr>
                                                    </thead>

                                                </table>
                                            </div>
                                            <div class="tab-pane fade  in" id="Perdu">
                                                <div id="tabHistorique_E_S_I"></div>
                                                <div align="right"><button class="btn btn-warning" type="button" id="exporttabchartTopVenteClient">XLS</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="table-responsive" id="recap">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once("../footer.php")  ?>
        <style>
            /* Style personnalisé pour les cellules */
            .tabulator {
                background-color: white;
                color: black;
                font-size: 16px;
            }
        </style>
        <script type="text/javascript">
            function historique_E_S_I(var_url) {

                var pubTabulator;
                let i = 0;

                $.ajax({
                        url: "<?= HTTP_AJAX_EDITION ?>ajaxhistorique_E_S_I.php" + var_url,
                        type: 'POST',
                        dataType: 'JSON',
                        data: {

                        },
                        beforeSend: function() {
                            $("#tabHistorique_E_S_I").html(' <div class="loader"></div>');
                        }
                    })
                    .done(function(e) {

                        var tableClient = new Tabulator("#tabHistorique_E_S_I", {
                            pagination: "local",
                            paginationSize: 15,
                            paginationSizeSelector: [20, 30, 40, 50],
                            cellVerticallyCentered: true,

                            height: "400px",
                            movableColumns: true,
                            data: e,
                            tableClass: "tabulator",
                            columns: [{
                                    title: "<?= _getText("date") ?>",
                                    field: "daty",
                                    width: 120,
                                    headerSort: false,


                                },
                                {
                                    title: "<?= _getText("entrer") ?>",
                                    field: "qte_E",
                                    hozAlign: "right",
                                    headerSort: false,
                                    width: 100,
                                    bottomCalc: "sum",
                                    bottomCalcFormatter: "money",
                                    formatter: "money",
                                    formatterParams: {
                                        decimal: ",",
                                        thousand: ".",
                                        symbol: "",
                                        symbolAfter: "p",
                                        precision: false,
                                    }
                                },
                                {
                                    title: "<?= html_entity_decode(_getText("date.peremption")) ?>",
                                    field: "DP_E",
                                    width: 170,
                                    headerSort: false,

                                },
                                {
                                    title: "<?= _getText("sortie") ?>",
                                    field: "qte_S",
                                    hozAlign: "right",
                                    width: 100,
                                    bottomCalc: "sum",
                                    bottomCalcFormatter: "money",
                                    formatter: "money",
                                    headerSort: false,
                                    formatterParams: {
                                        decimal: ",",
                                        thousand: ".",
                                        symbol: "",
                                        symbolAfter: "p",
                                        precision: false,
                                    }
                                },
                                {
                                    title: "<?= html_entity_decode(_getText("date.peremption")) ?>",
                                    field: "DP_S",
                                    width: 150,
                                    headerSort: false,
                                },
                                {
                                    title: "<?= _getText("perdu") ?>",
                                    field: "qte_I",
                                    hozAlign: "right",
                                    width: 100,
                                    bottomCalc: "sum",
                                    bottomCalcFormatter: "money",
                                    formatter: "money",
                                    headerSort: false,
                                    formatterParams: {
                                        decimal: ",",
                                        thousand: ".",
                                        symbol: "",
                                        symbolAfter: "p",
                                        precision: false,
                                    }
                                },
                                {
                                    title: "<?= html_entity_decode(_getText("date.peremption")) ?>",
                                    field: "DP_I",
                                    width: 150,
                                    headerSort: false,
                                },
                            ],


                        });

                        pubTabulator = tableClient;

                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    });

                //alert(i);
            } // fin function


            function historique_E_S_I_XLS(var_url) {

                var pubTabulator;
                let i = 0;

                $.ajax({
                        url: "<?= HTTP_AJAX_EDITION ?>ajaxhistorique_E_S_I.php" + var_url,
                        type: 'POST',
                        dataType: 'JSON',
                        data: {

                        },
                        beforeSend: function() {
                            $("#tabHistorique_E_S_I").html(' <div class="loader"></div>');
                        }
                    })
                    .done(function(e) {

                        var tableClient = new Tabulator("#tabHistorique_E_S_I", {
                            pagination: "local",
                            paginationSize: 20,
                            paginationSizeSelector: [20, 30, 40, 50, 100],
                            cellVerticallyCentered: true,
                            height: "600px",
                            movableColumns: true,
                            data: e,
                            tableClass: "tabulator",
                            columns: [{
                                    title: "<?= _getText("date") ?>",
                                    field: "daty",
                                    width: 120,
                                    headerSort: false,
                                },
                                {
                                    title: "<?= _getText("entrer") ?>",
                                    field: "qte_E",
                                    hozAlign: "right",
                                    headerSort: false,
                                    width: 100,
                                    bottomCalc: "sum",
                                    bottomCalcFormatter: "money",
                                    formatter: "money",
                                    formatterParams: {
                                        decimal: ",",
                                        thousand: ".",
                                        symbol: "",
                                        symbolAfter: "p",
                                        precision: false,
                                    }
                                },
                                {
                                    title: "<?= html_entity_decode(_getText("date.peremption")) ?>",
                                    field: "DP_E",
                                    width: 170,
                                    headerSort: false,

                                },
                                {
                                    title: "<?= _getText("sortie") ?>",
                                    field: "qte_S",
                                    hozAlign: "right",
                                    width: 100,
                                    bottomCalc: "sum",
                                    bottomCalcFormatter: "money",
                                    formatter: "money",
                                    headerSort: false,
                                    formatterParams: {
                                        decimal: ",",
                                        thousand: ".",
                                        symbol: "",
                                        symbolAfter: "p",
                                        precision: false,
                                    }
                                },
                                {
                                    title: "<?= html_entity_decode(_getText("date.peremption")) ?>",
                                    field: "DP_S",
                                    width: 150,
                                    headerSort: false,
                                },
                                {
                                    title: "<?= _getText("perdu") ?>",
                                    field: "qte_I",
                                    hozAlign: "right",
                                    width: 170,
                                    bottomCalc: "sum",
                                    bottomCalcFormatter: "money",
                                    formatter: "money",
                                    headerSort: false,
                                    formatterParams: {
                                        decimal: ",",
                                        thousand: ".",
                                        symbol: "",
                                        symbolAfter: "p",
                                        precision: false,
                                    }
                                },
                                {
                                    title: "<?= html_entity_decode(_getText("date.peremption")) ?>",
                                    field: "DP_I",
                                    width: 150,
                                    headerSort: false,
                                },
                            ],


                        });

                        pubTabulator = tableClient;

                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    });

                //alert(i);
            } // fin function


            function ajaxSomme(var_url) {



                $.ajax({
                        url: "<?= HTTP_AJAX_EDITION ?>ajaxSommedetmvt.php" + var_url,
                        type: 'POST',
                        dataType: 'html',
                        data: {
                            param1: 'value1'
                        },
                    })
                    .done(function(e) {

                        $("#recap").html(e);

                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    });
            }


            $(document).ready(function($) {

                var pubtableClient;

                $("#cat_code").select2();

                $("#mvt_montant_paye").click(function() {

                    if ($(this).prop("checked")) {
                        $('input[name="' + $(this).attr("id") + '"]').val(1);
                    } else {
                        $('input[name="' + $(this).attr("id") + '"]').val(0);
                    }

                });

                <?php
                if (isset($_GET["art_code"])) {

                    $dataArticle = $article->lireTable($_GET["art_code"], "vw_article", "art_code");

                ?>
                    $("#form").show();

                    $("#mvt_type_E").prop('checked', 'checked');

                    $("#mvt_type").val("E");

                    let $newOption = $("<option selected='selected'></option>").val("<?= $_GET["art_code"]  ?>").text('<?= html_entity_decode($dataArticle["art_nom"]) . ""  ?>');
                    $("#art_code").append($newOption).trigger('change');

                    $("#btnvalider").trigger("click");

                <?php } else { ?>
                    $("#form").hide();
                <?php } ?>


                $("#lg_search").click(function(event) {
                    $("#form").toggle("slow");
                });
                $("#mvt_date_min").change(function(event) {

                    if ($("#mvt_date_min").val() != "") {
                        $("#mvt_time_min").val("00:00");
                        $("#mvt_time_max").val("23:59");
                    } else {
                        $("#mvt_time_min").val("--:--");
                        $("#mvt_time_max").val("--:--");
                    }

                    $("#mvt_date_max").val(($(this).val()));


                });
                $("#mvt_date_min").trigger('change');
                $("input:radio").change(function(event) {
                    $("#mvt_type").val($(this).val());
                });
                $("#art_code").select2({
                    placeholder: "<?= _getText("select.list.non.caratere.speciaux") ?>",
                    ajax: {
                        url: '<?php echo HTTP_AJAX_CREATION ?>ajaxSelect2arcticle.php',
                        dataType: 'json',
                        delay: 250,
                        data: function(data) {
                            return {
                                searchTerm: (data.term) // search term
                            };


                        },
                        processResults: function(response) {
                            return {
                                results: response

                            };
                        },
                        cache: true
                    }
                }).on("change", function(e) {
                    $("#art_abrev").val("");
                    $("#cat_code").val("").trigger("change");
                });
                var var_url = "?art_code=" + $("#art_code").val() + "";

                if ($("#mvt_date_min").val() != "") {
                    var_url += "&mvt_date_min=" + $("#mvt_date_min").val() + " " + $("#mvt_time_min").val();
                    var_url += "&mvt_date_max=" + $("#mvt_date_max").val() + " " + $("#mvt_time_max").val();

                } else {
                    var_url += "&mvt_date_min=" + $("#mvt_date_min").val();
                    var_url += "&mvt_date_max=" + $("#mvt_date_max").val();
                }

                var_url += "&mvt_type=" + $("#mvt_type").val() + "";
                var_url += "&mvt_montant_paye=" + $('input[name="mvt_montant_paye"]').val() + "";

                var_url += "&art_abrev=" + $("#art_abrev").val() + "";
                var_url += "&cat_code=" + $("#cat_code").val() + "";

                var title = "<?php echo utf8_decode(_getText("historique_ES_2"))     ?>";
                var data = $('#table').DataTable({

                    responsive: true,
                    "bFilter": false,
                    "oLanguage": {
                        "sUrl": "<?php echo HTTP_LANG_DATATABLE ?>fr/fr_FR.txt"
                    },
                    "processing": true,
                    "serverSide": true,
                    ajax: "<?= HTTP_AJAX_EDITION . 'ajaxlistedetmvt.php' ?>" + var_url,
                    "aoColumnDefs": [{
                            "aTargets": [11],
                            "mData": 11,
                            "mRender": function(data, type, full) {

                                var btnmodifier = "";
                                var btnsuppr = "";

                                <?php

                                if ($utilisateur->habilitationButton($_SERVER["SCRIPT_NAME"], "btnVerouiller", $_SESSION["prf_code"])) {

                                ?>

                                    btnmodifier = '<a title="<?= _getText('btnVerouiller') ?>" data-toggle="popover" data-trigger="hover" data-content="<?php echo _getText('btnModifier')  ?>" class="btn btn-success " href="#"><span onClick="affiche_modal_poccess(\'<?php echo HTTP_PAGE_EDITION ?>formVerouilleDetMvt.php?code=' + data + '\')" class="glyphicon glyphicon-eye-open btnupdate"></span></a>';

                                <?php  }
                                ?>


                                return btnmodifier + '<span>&nbsp;</span>' + btnsuppr + '<span>&nbsp;</span>';
                            }
                        },
                        {
                            "aTargets": [3],
                            "mData": 3,
                            "mRender": function(data, type, full) {
                                var txt = formatMoney(data); // prix d'achat
                                return '<div align="right">' + txt + '</div>';
                            }
                        },
                        {
                            "aTargets": [4],
                            "mData": 4,
                            "mRender": function(data, type, full) {
                                var txt = formatMoney(data); // prix de vente
                                return '<div align="right">' + txt + '</div>';
                            }
                        }, {
                            "aTargets": [5],
                            "mData": 5,
                            "mRender": function(data, type, full) {
                                var txt = formatMoney(data); // prix de vente
                                return '<div align="right">' + txt + '</div>';
                            }
                        },
                        {
                            "aTargets": [6],
                            "mData": 6,
                            "mRender": function(data, type, full) {
                                var txt = formatDate(data); // date de mouvement
                                return '<div align="center">' + txt + '</div>';
                            }
                        },
                        {
                            "aTargets": [7],
                            "mData": 7,
                            "mRender": function(data, type, full) {
                                var url = "<?= HTTP_PAGE_CREATION ?>listedetmvt.php?mvt_code=" + full[14];
                                url += "&art_code=" + full[15];

                                var txt = (data); // date de mouvement
                                return '<a target="_blank" title="<?= _getText("mouvement") ?>" href="' + url + '" >' + txt + '</a>';
                            }
                        },
                        {
                            "aTargets": [9],
                            "mData": 9,
                            "mRender": function(data, type, full) {
                                if (full[7] == "S") {
                                    return "";
                                } else {
                                    var txt = formatDate(data); // date de peremption
                                    return '<div align="center"><b>' + txt + '</b></div>';
                                }
                            }
                        },
                        {
                            "aTargets": [10],
                            "mData": 10,
                            "mRender": function(data, type, full) {
                                var txt = "";
                                if (full[16] == 1) {
                                    txt = '<span class="glyphicon glyphicon-credit-card" ></span><br>';
                                }

                                if (data == 1) {
                                    txt += '<span class="glyphicon glyphicon-lock" ></span>';
                                } else {
                                    txt += '<span class="glyphicon glyphicon-minus" ></span>';
                                }
                                return txt;
                            }
                        },
                        {
                            "aTargets": [1],
                            "mData": 1,
                            "mRender": function(data, type, full) {
                                var txt = '<b>' + full["0"] + '</b><br>' + data + ''
                                return '<centrer>' + txt + '</centrer>';
                            }
                        },
                        {
                            "aTargets": [2],
                            "mData": 2,
                            "mRender": function(data, type, full) {

                                if (full[8] == "E")
                                    var txt = full[13] + "/" + (data); /** 13 -> REST_2 */
                                else
                                    var txt = (data);

                                return '<div align="right"><b>' + txt + '</b></div>';
                            }
                        },

                        {
                            "aTargets": [8],
                            "mData": 8,
                            "mRender": function(data, type, full) {
                                var txt = (data);
                                return '<span class="badge badge-secondary" >' + txt + '</span>';
                            }
                        },
                        {
                            "aTargets": [12],
                            "mData": 12,
                            "visible": false,
                        },

                        {
                            "aTargets": [0],
                            "mData": 0,
                            "visible": false,
                        },
                        {
                            "aTargets": [13],
                            "mData": 13,
                            "visible": false,
                        },
                        {
                            "aTargets": [14],
                            "mData": 14,
                            "visible": false,
                        },
                        {
                            "aTargets": [15],
                            "mData": 15,
                            "visible": false,
                        },
                        {
                            "aTargets": [16],
                            "mData": 16,
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
                data.order([6, 'asc']).draw();
                $("#btnvalider").on("click", function() {
                    $("#form").removeAttr('target');
                    var var_url = "?art_code=" + $("#art_code").val() + "";

                    if ($("#mvt_date_min").val() != "") {
                        var_url += "&mvt_date_min=" + $("#mvt_date_min").val() + " " + $("#mvt_time_min").val();
                        var_url += "&mvt_date_max=" + $("#mvt_date_max").val() + " " + $("#mvt_time_max").val();

                    } else {
                        var_url += "&mvt_date_min=" + $("#mvt_date_min").val();
                        var_url += "&mvt_date_max=" + $("#mvt_date_max").val();
                    }

                    var_url += "&cat_code=" + $("#cat_code").val() + "";
                    var_url += "&art_abrev=" + $("#art_abrev").val() + "";
                    var_url += "&mvt_type=" + $("#mvt_type").val() + "";
                    var_url += "&mvt_montant_paye=" + $('input[name="mvt_montant_paye"]').val() + "";

                    data.ajax.url("<?= HTTP_AJAX_EDITION ?>ajaxlistedetmvt.php" + var_url).load();
                    data.order([6, 'asc']).draw();


                    ajaxSomme(var_url);

                    pubtableClient = historique_E_S_I(var_url);
                });

                $("#btnExportXLS").on("click", function() {
                    $("#form").removeAttr('target');
                    var var_url = "?art_code=" + $("#art_code").val() + "";

                    if ($("#mvt_date_min").val() != "") {
                        var_url += "&mvt_date_min=" + $("#mvt_date_min").val() + " " + $("#mvt_time_min").val();
                        var_url += "&mvt_date_max=" + $("#mvt_date_max").val() + " " + $("#mvt_time_max").val();

                    } else {
                        var_url += "&mvt_date_min=" + $("#mvt_date_min").val();
                        var_url += "&mvt_date_max=" + $("#mvt_date_max").val();
                    }

                    var_url += "&art_abrev=" + $("#art_abrev").val() + "";
                    var_url += "&cat_code=" + $("#cat_code").val() + "";
                    var_url += "&mvt_type=" + $("#mvt_type").val() + "";
                    var_url += "&mvt_montant_paye=" + $('input[name="mvt_montant_paye"]').val() + "";

                    var url = "<?= HTTP_EXEC_CREATION ?>exportHistoESExec.php" + var_url;

                    window.open(url, "_blank");

                });




                ajaxSomme(var_url);

                pubtableClient = historique_E_S_I(var_url);

                $("#exporttabchartTopVenteClient").click(function() {

                    $("#form").removeAttr('target');
                    var var_url = "?art_code=" + $("#art_code").val() + "";

                    if ($("#mvt_date_min").val() != "") {
                        var_url += "&mvt_date_min=" + $("#mvt_date_min").val() + " " + $("#mvt_time_min").val();
                        var_url += "&mvt_date_max=" + $("#mvt_date_max").val() + " " + $("#mvt_time_max").val();

                    } else {
                        var_url += "&mvt_date_min=" + $("#mvt_date_min").val();
                        var_url += "&mvt_date_max=" + $("#mvt_date_max").val();
                    }

                    var_url += "&art_abrev=" + $("#art_abrev").val() + "";
                    var_url += "&cat_code=" + $("#cat_code").val() + "";
                    var_url += "&mvt_type=" + $("#mvt_type").val() + "";
                    var_url += "&mvt_montant_paye=" + $('input[name="mvt_montant_paye"]').val() + "";

                    var url = "<?= HTTP_EXEC_CREATION ?>exportHistoESIExec.php" + var_url;

                    window.open(url, "_blank");

                });



            });
        </script>

    <?php } else {
    require_once(RP_MAIN . "pages/vide.php");
} ?>