<?php

require_once("../header.php");


require_once(RP_MODELS . "mouvement.class.php");
require_once(RP_MODELS . "taux.class.php");

$mouvement = new mouvement();
$taux = new taux();


$tabTaux = $taux->lireParCritere(array());

$criteremouvement["mvt_code"] = $_GET["mvt_code"];
$tabMvt = $mouvement->lireParCritere($criteremouvement);

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">

                <div class="col-md-12">
                    <div class="panel panel-bazar_mada">
                        <div class="panel-heading panel-head-bazar_mada">

                            <?= _getText("creation") ?> <span class="glyphicon glyphicon-menu-right"></span> <?= _getText("modification.prix") ?>
                        </div>
                        <div class="panel-body ">

                            <fieldset>
                                <legend><?php echo  _getText("mouvement") ?></legend>

                                <h3><b><?php echo  _getText("source") . " :</b>" .  $tabMvt[0]["mvt_source"] ?></h3>


                            </fieldset>

                            <fieldset class="col-md-6">
                                <legend class="lg_rech" id="lg_rech" style="cursor: pointer;">
                                    <?= _getText("recherche") ?> <span class="glyphicon glyphicon-search"></span>
                                </legend>


                                <form class="" method="post" id="form" action="<?= $_SERVER["PHP_SELF"] ?>">
                                    <div class="form-group row">
                                        <label for="art_nom" class="control-label col-sm-2">
                                            <?php echo  _getText('abrev') ?></label>

                                        <div class="col-sm-10">
                                            <input type="text" name="art_abrev" id="art_abrev" class="form-control" value="<?php echo $_GET["art_abrev"] ?? "" ?>">

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="art_nom" class="control-label col-sm-2">
                                            <?php echo _getText("designation") ?></label>

                                        <div class="col-sm-10">
                                            <input type="text" name="art_nom" id="art_nom" class="form-control">

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



                                        </center>
                                    </div>

                                </form>

                                <div align="center" id="charge"></div>

                            </fieldset>
                            <fieldset>

                                <div class="table-responsive">

                                    <form id="formData" target="" action="<?php echo HTTP_EXEC_ADMIN ?>formPrixExec.php" method="POST">

                                        <div class="form-group row " align="right">
                                            <button style="width: 300px" type="submit" class="btn btn-success btnEnreg">
                                                <?php echo _getText("btnEnregistrer")  ?>
                                            </button>
                                        </div>

                                        <input type="hidden" name="mvt_code" id="mvt_code" value="<?php echo $_GET["mvt_code"] ?>">

                                        <table class="table table-hover table-striped   table-bordered " id="table">
                                            <thead>
                                                <tr>
                                                    <th><?php echo _getText("abrev") ?></th>
                                                    <th><?php echo _getText("abrev_old") ?></th>
                                                    <th>
                                                        <?php echo _getText("designation")  ?>
                                                    </th>
                                                    <th width="100px"><?= _getText("prix.achat") ?></th>
                                                    <th width="100px"><?php echo _getText("taux") ?></th>
                                                    <th width="120px"><?= _getText("prix.vente.estimatif") ?></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th width="150px"><?= _getText("prix.vente") ?></th>
                                                    <th width="50px"><?php echo _getText("qte_dispo_br_court") ?></th>


                                                </tr>
                                            </thead>

                                        </table>

                                        <div class="form-group row " align="right">
                                            <button style="width: 300px" type="submit" class="btn btn-success btnEnreg">
                                                <?php echo _getText("btnEnregistrer")  ?>
                                            </button>
                                        </div>

                                    </form>

                                </div style="">

                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once("../footer.php");

/*<?php echo HTTP_PAGE_CREATION ?>formarticle.php?code='+ data +'  */

?>


<script type="application/javascript">
    $(document).ready(function($) {

        $("#form").hide("slow");

        $("#lg_rech").click(function(event) {
            $("#form").toggle("slow");
        });

        var var_url = "?art_nom=" + $("#art_nom").val() + "";
        var_url += "&art_abrev=" + $("#art_abrev").val() + "";
        var_url += "&mvt_code=" + $("#mvt_code").val() + "";


        var data = $('#table').DataTable({
            responsive: true,
            "bFilter": false,
            "oLanguage": {
                "sUrl": "<?php echo HTTP_LANG_DATATABLE ?>fr/fr_FR.txt"
            },
            "processing": true,
            "serverSide": true,
            "createdRow": function(row, data, dataIndex) {

                /*var sE =  parseInt(data[5]) ;
                var sS = parseInt(data[6]) ;

                var p = ((sE - sS) * 100) / sE ;*/


                /*if( data[8] == 0 ){
                    $(row).addClass('redClass');
                }*/
            },
            ajax: "<?= HTTP_AJAX_CREATION . 'ajaxlistearticlePrix.php' ?>" + var_url,
            "aoColumnDefs": [{
                    "aTargets": [2],
                    "mData": 2,
                    "visible": true,
                    "mRender": function(data, type, full) {

                        var txt = data;


                        <?php

                        if ($utilisateur->habilitationButton("/stock/pages/creation/listearticle.php", "btnModifier", $_SESSION["prf_code"])) {

                        ?>

                            txt = '<span><a style="text-decoration:none;cursor:pointer" onClick="affiche_modal_poccess(\'<?php echo HTTP_PAGE_CREATION ?>formarticle.php?mvt_code=' + <?= $_GET["mvt_code"] ?> + '&page=majPrix&code=' + full[8] + '\')" >' + data + '</a></span>';

                        <?php } ?>

                        return txt;
                    }
                },

                {
                    "aTargets": [3],
                    "mData": 3,
                    "visible": true,
                    "mRender": function(data, type, full) {

                        var txt = '<input style="width:100px;text-align:right;font-weight: bold;" onchange="calculer(' + full[6] + ')" tag="' + full[6] + '" style="text-align:right" step=".01" type="number" id="dtmvt_prix_achat|' + full[6] + '" name="dtmvt_prix_achat|' + full[6] + '" class="form-control" value="' + data + '">';


                        return txt;
                    }
                },
                {
                    "aTargets": [8],
                    "mData": 8,
                    "visible": false,
                    "mRender": function(data, type, full) {

                        var txt = data;


                        return txt;
                    }
                },
                {
                    "aTargets": [7],
                    "mData": 7,
                    "visible": false,
                    "mRender": function(data, type, full) {

                        var txt = data;


                        return txt;
                    }
                },
                {
                    "aTargets": [6],
                    "mData": 6,
                    "visible": false,
                    "mRender": function(data, type, full) {

                        var txt = data;


                        return txt;
                    }
                },
                {
                    "aTargets": [9],
                    "mData": 9,
                    "visible": false,
                    "mRender": function(data, type, full) {

                        var txt = data;

                        return txt;
                    }
                },
                {
                    "aTargets": [5],
                    "mData": 5,
                    "visible": true,
                    "mRender": function(data, type, full) {


                        var txt = formatMoney(data);

                        return '<input name="' + 'prix_vente_estimatif|' + full[6] + '" readonly style="width:130px;text-align:right;font-weight: bold;" class="form-control" type="text" value="' + txt + '"  id="' + 'prix_vente_estimatif|' + full[6] + '" align="right">';
                    }
                },

                {
                    "aTargets": [10],
                    "mData": 10,
                    "visible": true,
                    "mRender": function(data, type, full) {


                        var txt = (data);

                        return '<span style="height:30px;width:20px;text-align:center" onclick="copy_prix(' + full[6] + ')"  class="btn btn-success btn-sm">...</span><input name="' + 'dtmvt_prix_vente|' + full[6] + '"  style="width:130px;text-align:right;font-weight: bold;" class="form-control" type="number"  value="' + txt + '"  id="' + 'dtmvt_prix_vente|' + full[6] + '" align="right"><input type="hidden" name="dtmvt_code|' + full[6] + '" value="' + full[6] + '">';
                    }
                },
                {
                    "aTargets": [4],
                    "mData": 4,
                    "visible": true,
                    "mRender": function(data, type, full) {

                        var selected = "";

                        var txt = '<select onchange="getTau_valeur(' + full[6] + ')" class="form-control" name="tau_code|' + full[6] + '" id="tau_code|' + full[6] + '"><?php for ($i = 0; $i < $tabTaux["cnt"]; $i++) {  ?><option ';

                        if (data == '<?php echo $tabTaux[$i]["tau_code"] ?>') {
                            txt += " selected ";
                        }

                        txt += ' tag="<?php echo $tabTaux[$i]["tau_valeur"] ?>"  value="<?php echo $tabTaux[$i]["tau_code"] ?>"><?php echo $tabTaux[$i]["tau_nom"] ?></option><?php  } ?></select>';


                        txt += '<input type="hidden" id="dtmvt_taux|' + full[6] + '" value="' + full[9] + '" name="dtmvt_taux|' + full[6] + '" >';


                        return txt;
                    }
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

        data.order([7, 'desc']).draw();


        $("#btnvalider").on("click", function() {

            $("#form").removeAttr('target');

            var var_url = "?art_nom=" + $("#art_nom").val() + "";
            var_url += "&art_abrev=" + $("#art_abrev").val() + "";
            var_url += "&mvt_code=" + $("#mvt_code").val() + "";

            data.ajax.url("<?= HTTP_AJAX_CREATION ?>ajaxlistearticlePrix.php" + var_url).load();

            data.order([7, 'desc']).draw();

            new $.fn.dataTable.FixedHeader(data);

        });



        $("#tau_code").trigger('change');

    });


    function replaceAll(string, search, replace) {
        return string.split(search).join(replace);
    }

    function calculer(i) {

        var dtmvt_prix_achat = document.getElementById("dtmvt_prix_achat|" + i).value;


        document.getElementById("prix_vente_estimatif|" + i).value = formatMoney(document.getElementById("dtmvt_taux|" + i).value * dtmvt_prix_achat);


    }


    function copy_prix(i) {

        var prix_vente_estimatif = document.getElementById("prix_vente_estimatif|" + i).value;

        document.getElementById("dtmvt_prix_vente|" + i).value = replaceAll(prix_vente_estimatif, ' ', '');

    }


    function getTau_valeur(i) {
        var Select = document.getElementById("tau_code|" + i);
        /*for (var i=0;i<Select.length;i++) {
            if(Select.value == Select[i].getAttribute('value') )
                var val =Select[i].getAttribute('tag');
        }*/

        var val = Select.options[Select.selectedIndex].getAttribute('tag');
        document.getElementById("dtmvt_taux|" + i).value = val;

        calculer(i);

    }
</script>