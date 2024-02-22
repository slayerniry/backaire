<style>
    canvas {


        height: 600px !important;

    }
</style>


<?php


require_once("../header.php");
require_once(RP_MODELS . "categorie.class.php");

$categorie = new categorie();

$tabcategorie = $categorie->lireParCritere(array());
unset($tabcategorie["cnt"]);

if ($utilisateur->habilitationMenu($_SERVER["SCRIPT_NAME"], $_SESSION["prf_code"])) { ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">

                    <div class="col-md-12">
                        <div class="panel panel-bazar_mada">
                            <div class="panel-heading panel-head-bazar_mada">
                                <?= _getText("edition") ?> <span class="glyphicon glyphicon-menu-right"></span> <?= _getText("top.vente") ?>
                            </div>
                            <div class="panel-body ">
                                <fieldset class="col-md-9">
                                    <legend class="lg_rech" id="lg_rech" style="cursor: pointer;">
                                        <?= _getText("recherche") ?> <span class="glyphicon glyphicon-search"></span>
                                    </legend>
                                    <form class="" method="post" id="form" action="">
                                        <div class="form-group row">
                                            <label for="mvt_date_min" class="control-label col-sm-2">
                                                <?php echo  _getText('date.du') ?></label>
                                            <div class="col-sm-4">
                                                <input type="date" value="<?= $_GET["date_min"] ?? "" ?>" name="mvt_date_min" id="mvt_date_min" class="form-control">
                                            </div>
                                            <div class="col-sm-1"><label for="mvt_date_max" class="control-label col-sm-2"><?= _getText("au") ?></label></div>
                                            <div class="col-sm-4">
                                                <input type="date" value="<?= $_GET["date_max"] ?? "" ?>" name="mvt_date_max" id="mvt_date_max" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="cat_code_form" class="control-label col-sm-2">
                                                <?php echo  _getText('categorie') ?></label>
                                            <div class="col-sm-4">
                                                <select id="cat_code_form" name="cat_code" class="form-control">
                                                    <option value=""></option>
                                                    <?php
                                                    foreach ($tabcategorie as $key => $value) { ?>
                                                        <option value="<?= $value["cat_code"] ?>"><?php echo ($value["cat_nom"])   ?></option>
                                                    <?php } ?>
                                                </select>

                                            </div>

                                            <label for="inputlimit" class="control-label col-sm-2">
                                                <?php echo  _getText('nombre') ?></label>
                                            <div class="col-sm-2">
                                                <input step="5" min="10" max="1000" type="number" name="limit" id="inputlimit" class="form-control" value="10">
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <center>
                                                <button id="btnValider" type="button" class="btn btn-success">
                                                    <?php echo _getText("btnValider")  ?>
                                                </button>
                                            </center>
                                        </div>
                                    </form>
                                </fieldset>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="panel with-nav-tabs panel-info">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#Nombre" data-toggle="tab" aria-expanded="true">
                                    <?= _getText("nombre") ?></a>
                            </li>
                            <li class="">
                                <a href="#Prix" data-toggle="tab" aria-expanded="false">
                                    <?= _getText("prix") ?></a> </a>
                            </li>
                            <li class="">
                                <a href="#Client" data-toggle="tab" aria-expanded="false">
                                    <?= _getText("client") ?></a> </a> </a>
                            </li>

                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="Nombre">
                                <div class="row">
                                    <div class="col-md-6">
                                        <fieldset>
                                            <div id="loaderInit"></div>
                                            <canvas id="chartTopVenteNombre"></canvas>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <div id="tabchartTopVenteNombre"></div>
                                            <div id="data-count-prix"></div>
                                            <div align="right"><button class="btn btn-warning" type="button" id="exporttabchartTopVenteNombre">XLS</button></div>
                                        </fieldset>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade in" id="Prix">
                                <div class="row">
                                    <div class="col-md-6">
                                        <fieldset>
                                            <div id="loaderInit2"></div>
                                            <canvas id="chartTopVentePrix"></canvas>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <div id="tabchartTopVentePrix"></div>

                                            <div align="right"><button class="btn btn-warning" type="button" id="exporttabchartTopVentePrix">XLS</button></div>

                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade in" id="Client">
                                <div class="row">
                                    <div class="col-md-6">
                                        <fieldset>
                                            <div id="loaderInit3"></div>
                                            <canvas id="chartTopVenteClient"></canvas>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <div id="tabchartTopVenteClient"></div>

                                            <div align="right"><button class="btn btn-warning" type="button" id="exporttabchartTopVenteClient">XLS</button></div>

                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require_once("../footer.php");
        $barColors2 = '"rgb(23, 53, 118)", "Grey", "Red", "Blue", "Orange", "rgb(255,100,100)", "Brown", "Pink", "Yellow", "Green", "Purple", "Maroon", "Turquoise", "Cyan", "Navy blue", "Gold", "Tomato", "Teal", "Lime", "Cyan", "Wheat", "Salmon", "Olive", "Aqua", "Violet", "Chocolate", "Azure", "Sİlver", "Bronze", "Dark blue", "Navy", ';
        ?>
        <script type="text/javascript">
            $(document).ready(function() {

                var pubtableNombre;
                var pubtablePrix;
                var pubtableClient;

                $("#lg_rech").click(function() {

                    $("#form").toggle("slow");

                });



                const dataNombre = [{
                    art_nom: "",
                    sum_qte: 0
                }, ];

                const dataNombreClient = [{
                    cli_nom: "",
                    sum_qte: 0
                }, ];


                const configNombre = {
                    type: 'bar',
                    options: {
                        legend: {
                            labels: "xx"
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        indexAxis: 'y',
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'right'
                        }
                    },
                    data: {
                        labels: dataNombre.map(row => row.art_nom),
                        datasets: [{
                            backgroundColor: [<?= $barColors2  ?>],
                            label: "<?= replace_texte_speciaux_excel(_getText("nombre"))  ?>",
                            data: dataNombre.map(row => row.sum_qte)
                        }]
                    }
                };

                const dataPrix = [{
                    art_nom: "",
                    sum_montant: 0
                }, ];
                const configPrix = {
                    type: 'bar',
                    options: {
                        plugins: {
                            legend: {
                                labels: "xx"
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        indexAxis: 'y',
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    },
                    plugins: {

                    },
                    data: {
                        labels: dataNombre.map(row => row.art_nom),
                        datasets: [{
                            backgroundColor: [<?= $barColors2  ?>],
                            label: "<?= replace_texte_speciaux_excel(_getText("montant"))  ?>",
                            data: dataNombre.map(row => row.sum_montant)
                        }]
                    }
                };


                const dataClent = [{
                    cli_nom: "",
                    sum_montant: 0
                }, ];
                const configClient = {
                    type: 'bar',
                    options: {
                        plugins: {
                            legend: {
                                labels: "xx"
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        indexAxis: 'y',
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    },
                    plugins: {

                    },
                    data: {
                        labels: dataNombreClient.map(row => row.cli_nom),
                        datasets: [{
                            backgroundColor: [<?= $barColors2  ?>],
                            label: "<?= replace_texte_speciaux_excel(_getText("montant"))  ?>",
                            data: dataNombreClient.map(row => row.sum_montant)
                        }]
                    }
                };



                const chartTopVenteNombre = new Chart(document.getElementById('chartTopVenteNombre'), configNombre);

                const chartTopVentePrix = new Chart(document.getElementById('chartTopVentePrix'), configPrix);

                const chartTopVenteClent = new Chart(document.getElementById('chartTopVenteClient'), configClient);


                $("#mvt_date_min").change(function(event) {
                    $("#mvt_date_max").val(rampitso($(this).val()));
                });
                $("#btnValider").on('click', function(event) {
                    $.ajax({
                            url: '<?= HTTP_AJAX_EDITION ?>ajaxTopVente.php?type=N',
                            type: 'POST',
                            dataType: 'json',
                            data: $("#form").serialize(),
                            beforeSend: function() {
                                $("#loaderInit").html(' <div  class="loader"></div>');
                            }
                        })
                        .done(function(e) {
                            $("#loaderInit").html("");
                            const data = e;
                            chartTopVenteNombre.config.data.labels = data.map(row => row.art_nom);
                            chartTopVenteNombre.config.data.datasets.backgroundColor = '[<?= $barColors2 ?>]';
                            chartTopVenteNombre.config.data.datasets[0].data = data.map(row => row.sum_qte);

                            chartTopVenteNombre.update();

                            var tableNombre = new Tabulator("#tabchartTopVenteNombre", {
                                pagination: "local",
                                paginationSize: 15,
                                paginationSizeSelector: [20, 30, 40, 50],
                                paginationFirst: "Premier",
                                paginationPrev: "Précédent",
                                paginationNext: "Suivant",
                                paginationLast: "Dernier",
                                cellFontSize: "16px",
                                height: "500px",
                                movableColumns: true,
                                data: e,
                                columns: [{
                                        title: "<?= _getText("article") . " (" . _getText("nombre")  ?> : " + e.length + ")",
                                        field: "art_nom",
                                        width: 300,
                                    },
                                    {
                                        title: "<?= html_entity_decode(_getText("nombre"))  ?>",
                                        field: "sum_qte",
                                        hozAlign: "right",
                                        width: 200,
                                    },
                                ],


                            });

                            pubtableNombre = tableNombre;
                        })
                        .fail(function() {
                            console.log("error");
                        })
                        .always(function() {});

                    $.ajax({
                            url: '<?= HTTP_AJAX_EDITION ?>ajaxTopVenteClient.php',
                            type: 'POST',
                            dataType: 'json',
                            data: $("#form").serialize(),
                            beforeSend: function() {
                                $("#loaderInit3").html(' <div  class="loader"></div>');
                            }
                        })
                        .done(function(e) {
                            $("#loaderInit3").html("");
                            const data = e;

                            chartTopVenteClent.config.data.labels = data.map(row => row.cli_nom);
                            chartTopVenteClent.config.data.datasets.backgroundColor = '[<?= $barColors2 ?>]';
                            chartTopVenteClent.config.data.datasets[0].data = data.map(row => row.sum_montant);

                            chartTopVenteClent.update();

                            var tableClient = new Tabulator("#tabchartTopVenteClient", {
                                pagination: "local",
                                paginationSize: 15,
                                paginationSizeSelector: [20, 30, 40, 50],
                                paginationFirst: "Premier",
                                paginationPrev: "Précédent",
                                paginationNext: "Suivant",
                                paginationLast: "Dernier",
                                cellFontSize: "16px",
                                height: "500px",
                                movableColumns: true,
                                data: e,
                                columns: [{
                                        title: "<?= _getText("client") . " (" . _getText("nombre")  ?> : " + e.length + ")",
                                        field: "cli_nom",
                                        width: 300,
                                    },
                                    {
                                        title: "<?= html_entity_decode(_getText("montant"))  ?>",
                                        field: "sum_montant",
                                        hozAlign: "right",
                                        width: 200,
                                        bottomCalc: "sum",
                                        bottomCalcFormatter: "money",
                                        formatter: "money",
                                        formatterParams: {
                                            decimal: ",",
                                            thousand: ".",
                                            symbol: " Ar",
                                            symbolAfter: "p",
                                            precision: false,
                                        }
                                    },


                                ],


                            });

                            pubtableClient = tableClient;

                        })
                        .fail(function() {
                            console.log("error");
                        })
                        .always(function() {});

                    /*** *********************************************************** */

                    $.ajax({
                            url: '<?= HTTP_AJAX_EDITION ?>ajaxTopVente.php?type=M',
                            type: 'POST',
                            dataType: 'json',
                            data: $("#form").serialize(),
                            beforeSend: function() {
                                $("#loaderInit2").html(' <div  class="loader"></div>');
                            }
                        })
                        .done(function(e) {
                            $("#loaderInit2").html("");
                            const data = e;


                            chartTopVentePrix.config.data.labels = data.map(row => row.art_nom);
                            chartTopVentePrix.config.data.datasets.backgroundColor = '[<?= $barColors2 ?>]';
                            chartTopVentePrix.config.data.datasets[0].data = data.map(row => row.sum_montant);

                            chartTopVentePrix.update();

                            var tablePrix = new Tabulator("#tabchartTopVentePrix", {
                                pagination: "local",
                                paginationSize: 15,
                                paginationSizeSelector: [20, 30, 40, 50],
                                paginationFirst: "Premier",
                                paginationPrev: "Précédent",
                                paginationNext: "Suivant",
                                paginationLast: "Dernier",
                                cellFontSize: "16px",
                                height: "500px",
                                movableColumns: true,
                                data: e,
                                columns: [{
                                        title: "<?= _getText("article") . " (" . _getText("nombre")  ?> : " + e.length + ")",
                                        field: "art_nom",
                                        width: 300,
                                    },
                                    {
                                        title: "<?= html_entity_decode(_getText("montant"))  ?>",
                                        field: "sum_montant",
                                        hozAlign: "right",
                                        width: 200,
                                        bottomCalc: "sum",
                                        bottomCalcFormatter: "money",
                                        formatter: "money",
                                        formatterParams: {
                                            decimal: ",",
                                            thousand: ".",
                                            symbol: " Ar",
                                            symbolAfter: "p",
                                            precision: false,
                                        }
                                    },


                                ],


                            });

                            pubtablePrix = tablePrix;

                        })
                        .fail(function() {
                            console.log("error");
                        })
                        .always(function() {});


                });


                $("#btnValider").trigger("click");


                $("#exporttabchartTopVenteNombre").click(function() {

                    pubtableNombre.download("xlsx", "dataNombre.xlsx", {
                        sheetName: "dataNombre"
                    });

                    /*pubtableNombre.download("csv", "dataNombre.csv", {
                        delimiter: ";",
                        bom: true,

                    }, "visible");*/
                });

                $("#exporttabchartTopVentePrix").click(function() {

                    pubtablePrix.download("xlsx", "dataPrix.xlsx", {
                        sheetName: "dataPrix"
                    });
                    /*pubtablePrix.download("csv", "dataPrix.csv", {
                        delimiter: ";",
                        bom: true,

                    }, "visible");*/
                });

                $("#exporttabchartTopVenteClient").click(function() {

                    pubtableClient.download("xlsx", "dataPrixClient.xlsx", {
                        sheetName: "dataPrixClient"
                    });
                    /*pubtablePrix.download("csv", "dataPrix.csv", {
                        delimiter: ";",
                        bom: true,

                    }, "visible");*/
                });



            });
        </script>
    <?php } else {
    require_once(RP_MAIN . "pages/vide.php");
} ?>