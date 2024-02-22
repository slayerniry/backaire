<?php
require_once("../header.php");
if ($utilisateur->habilitationMenu($_SERVER["SCRIPT_NAME"], $_SESSION["prf_code"])) {
    $tab_php_self = explode("/", $_SERVER['PHP_SELF']);
    require_once($_SERVER["DOCUMENT_ROOT"] . "/" .  $tab_php_self[1] . "/" . "config.inc.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/" .  $tab_php_self[1] . "/" . "include/session.php");
    loadRessource("fr");
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-bazar_mada">
                            <div class="panel-heading panel-head-bazar_mada"> <span class="glyphicon glyphicon-th"></span>
                                <?= _getText("edition") ?> <span class="glyphicon glyphicon-menu-right"></span> <?= _getText("historique") . " " . _getText("inventaire") ?>
                            </div>
                            <div class="panel-body ">
                                <fieldset>
                                    <legend id="lg_search"><?= _getText("recherche") ?><span style="margin-left: 10px;" class="glyphicon  glyphicon-search"></span> </legend>
                                    <form class="" method="post" id="form" action="<?= $_SERVER["PHP_SELF"] ?>">
                                        <div class="form-group row">
                                            <label for="inv_date_min" class="control-label col-sm-2">
                                                <?php echo  _getText('date.du') ?></label>
                                            <div class="col-sm-4">
                                                <input type="date" name="inv_date_min" id="inv_date_min" class="form-control">
                                            </div>
                                            <div class="col-sm-1"><label for="inv_date_max" class="control-label col-sm-2"><?= _getText("au") ?></label></div>
                                            <div class="col-sm-4">
                                                <input type="date" name="inv_date_max" id="inv_date_max" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="art_code" class="control-label col-sm-2">
                                                <?php echo _getText('article')  ?></label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="art_code" name="art_code" required style="width: 100%">
                                                    <option></option>
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
                                            </center>
                                        </div>
                                    </form>
                                </fieldset>
                                <fieldset>
                                    <legend><?= _getText("liste") ?></legend>
                                    <table class="table table-hover table-striped   table-bordered " id="table">
                                        <thead>
                                            <tr>
                                                <th width="60px"><?php echo _getText("date") ?></th>
                                                <th><?php echo _getText("abrev") . " (" . _getText("article") . ")"  ?></th>
                                                <th width="200px"><?php echo _getText("designation") ?></th>

                                                <th width="100px"><?php echo _getText("defectueux")  ?> </th>
                                                <th width="100px"><?php echo _getText("perime") ?> </th>
                                                <th width="100px"><?php echo _getText("perdu") ?> </th>

                                                <th width="100px"><?php echo _getText("qte_perdu") ?> </th>
                                                <th width=""><?php echo _getText("date.peremption") ?> </th>

                                                <th></th>
                                            </tr>
                                        </thead>
                                    </table>

                                    <div id="sommeInv">11</div>

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
        function somme(var_url) {

            $.ajax({
                url: '<?= HTTP_AJAX_EDITION ?>ajaxSommeInv.php',
                success: function(e) {



                    document.getElementById("sommeInv").innerHTML = e;
                }
            });

        }
        $(document).ready(function($) {
            $("#form").hide();
            $("#lg_search").click(function(event) {
                $("#form").toggle("slow");
            });
            $("#inv_date_min").change(function(event) {
                $("#inv_date_max").val(rampitso($(this).val()));
            });
            $("#inv_date_min").trigger('change');
            $("#art_code").select2({
                placeholder: "<?= _getText("select.list.non.caratere.speciaux") ?>",
                ajax: {
                    url: '<?php echo HTTP_AJAX_CREATION ?>ajaxSelect2arcticle.php',
                    dataType: 'json',
                    delay: 250,
                    data: function(data) {
                        return {
                            searchTerm: data.term // search term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });
            var var_url = "?art_code=" + $("#art_code").val() + "";
            var_url += "&inv_date_min=" + $("#inv_date_min").val() + "";
            var_url += "&inv_date_max=" + $("#inv_date_max").val() + "";
            var title = "<?php echo utf8_decode(_getText("historique")  . " " . _getText("invetaire"))     ?>";

            var data = $('#table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy',
                    {
                        extend: 'excel',
                        title: title,
                        messageTop: '',
                        messageBottom: "Date d'edition : " + anio()
                    },
                    {
                        extend: 'pdf',
                        title: title,
                        messageTop: '',
                        messageBottom: "Date d'edition : " + anio()
                    },
                    {
                        extend: 'print',
                        title: title,
                        messageTop: '',
                        messageBottom: "Date d'edition : " + anio()
                    }
                ],
                responsive: true,
                "bFilter": false,
                "oLanguage": {
                    "sUrl": "<?php echo HTTP_LANG_DATATABLE ?>fr/fr_FR.txt"
                },
                "processing": true,
                "serverSide": true,
                ajax: "<?= HTTP_AJAX_EDITION . 'ajaxhistoinventaire.php' ?>" + var_url,
                "aoColumnDefs": [{
                        "aTargets": [0],
                        "mData": 0,
                        "mRender": function(data, type, full) {
                            var txt = formatDate(data);
                            return '<div align="center">' + txt + '</div>';
                        }
                    },
                    {
                        "aTargets": [3],
                        "mData": 3,
                        "mRender": function(data, type, full) {
                            var txt = (data);
                            return '<div align="right">' + txt + '</div>';
                        }
                    },
                    {
                        "aTargets": [4],
                        "mData": 4,
                        "mRender": function(data, type, full) {
                            var txt = (data);
                            return '<div align="right">' + txt + '</div>';
                        }
                    },

                    {
                        "aTargets": [5],
                        "mData": 5,
                        "mRender": function(data, type, full) {
                            var txt = (data);
                            return '<div align="right">' + txt + '</div>';
                        }
                    },

                    {
                        "aTargets": [6],
                        "mData": 6,
                        "mRender": function(data, type, full) {
                            var txt = (data);
                            return '<div align="right">' + txt + '</div>';
                        }
                    },

                    {
                        "aTargets": [7],
                        "mData": 7,
                        "mRender": function(data, type, full) {
                            var txt = formatDate(data);
                            return '<div align="right">' + txt + '</div>';
                        }
                    },


                    {
                        "aTargets": [8],
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
            data.order([7, 'asc']).draw();


            somme(var_url);


            $("#btnvalider").on("click", function() {
                $("#form").removeAttr('target');
                var var_url = "?art_code=" + $("#art_code").val() + "";
                var_url += "&inv_date_min=" + $("#inv_date_min").val() + "";
                var_url += "&inv_date_max=" + $("#inv_date_max").val() + "";
                data.ajax.url("<?= HTTP_AJAX_EDITION ?>ajaxhistoinventaire.php" + var_url).load();
                list_note.order([7, 'asc']).draw();

                somme(var_url);
            });
        });
    </script>
<?php } else {
    require_once(RP_MAIN . "pages/vide.php");
} ?>