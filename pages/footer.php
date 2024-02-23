<?php if (isset($_GET["code"])) { ?>
    <div class="myAlert-top alert alert-success" style="padding-top: 20px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <fieldset>
            <legend><?php echo _getText("info")  ?></legend>
            <ul>
                <?= $msg  ?>
            </ul>
        </fieldset>

    </div>
<?php } ?>



</div>
</div>
</div>
</body>

</html>


<!-- Modal HTML -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Content will be loaded here from "remote.php" file -->
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="confirm-modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <?php echo _getText("confirm_suppr")  ?>
                </h4>
            </div>
            <div class="modal-body" id="modal-body-confirm">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="modal-btn-si">
                    <?php echo _getText("btnOui")  ?></button>
                <button type="button" class="btn btn-primary" id="modal-btn-no">
                    <?php echo _getText("btnNon")  ?></button>
            </div>
        </div>
    </div>
</div>


<?php if (isset($_GET["e"])) {

    switch ($_GET["e"]) {
        case 0:
            $msg = '<fieldset>  <span  class=" text-danger">Ancien mot de passe non valide</span></fieldset>';
            break;
        case 1:

            $msg = '<fieldset><span  class=" text-success">Mise &agrave; jour du mot de passe effectu&eacute;</span></fieldset>';
            break;
        case 2:

            $msg = '<fieldset><span  class=" text-danger">Confirmation du mot de passe non valide</span></fieldset>';
            break;
    }




?>
    <div id="modalIndex" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="confirm-modal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" ">
                <div class=" modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <?php echo _getText("info")  ?>
                </h4>
            </div>
            <div class="modal-body" id="modal-body-confirm">
                <p>
                    <?= $msg   ?>
                </p>
            </div>

        </div>
    </div>
    </div>
<?php } ?>
<!--
<?php if (isset($_GET["code"])) { ?>
    <div id="modalExec" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="confirm-modal">
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
                            <?= $msg  ?>
                        </ul>
                    </fieldset>
                </div>

            </div>
        </div>
    </div>
<?php } ?>
-->




<script type="text/javascript" disabled>


    // Créer un élément de chargement
    var loader = document.createElement("div");
    loader.classList.add("loader");
    document.body.appendChild(loader);

    // Attacher un écouteur d'événements pour afficher l'élément de chargement au début du chargement
    window.addEventListener("load", function() {
        loader.style.display = "none";
    });

    // Afficher l'élément de chargement dès que le chargement commence
    window.addEventListener("beforeunload", function() {
        loader.style.display = "block";
    });

    function affiche_modal_poccess(url) {
        $("#myModal").modal({
            show: true,
            remote: url
        });
    }

    function confirm_proccess(url, msg) {
        if (confirm(msg)) {
            location.href = url;
        }
    }

    $(document).ready(function() {


        var refererHref = "<?= $_SERVER['REQUEST_URI'] ?>";

        // Find the li element with an href containing the specific value
        $('#slider-container li').find('a').filter(function() {
            return $(this).attr('href').indexOf(refererHref) !== -1;
        }).parent().addClass('active');

        // Gérer le basculement du slider lors du clic sur le bouton
        $('#toggle-slider-button').click(function() {
            $('#slider-container').slideToggle();
        });

        $('.nav-sidebar').on('click', 'li.parent', function() {
            $(this).siblings('li:not(.parent)').toggle("slow");
        });


        $(".myAlert-top").show();
        setTimeout(function() {
            $(".myAlert-top").hide("slow");
        }, 2000);

        $('.select2').select2();

        //modal sur mot de passe
        <?php if (isset($_GET["e"])) { ?>

            $('#modalIndex').modal('show');

        <?php } ?>


        //modal apres exec
        <?php if (isset($_GET["code"])) { ?>

            $('#modalExec').modal('show');

        <?php } ?>

        $('input[type=file]').change(function() {
            var t = $(this).val();
            var labelText = '<?php echo  _getText("fichier")  ?> : ' + t.substr(12, t.length);
            $(this).prev('label').text(labelText);
        })

        $('[data-toggle="popover"]').popover();

        $(".btnupdate").click(function() {

            var url = $(this).attr("url");

            $("#myModal").modal({
                show: true,
                remote: url
            });
        });


        // codes works on all bootstrap modal windows in application
        $('.modal').on('hidden.bs.modal', function(e) {
            $(this).removeData();
        });


        /* activate sidebar */
        $('#sidebar').affix({
            offset: {
                top: 235
            }
        });

        /* activate scrollspy menu */
        var $body = $(document.body);
        var navHeight = $('.navbar').outerHeight(true) + 10;

        $body.scrollspy({
            target: '#leftCol',
            offset: navHeight
        });

        var title = "";
        var data = $('.datatable_no_ajax').DataTable({
            "bFilter": true,
            "pagingType": "simple",

            dom: 'Bfrtip',
            buttons: [{
                    extend: 'pdf',
                    title: title,
                    messageTop: '',
                    messageBottom: "Date d'edition : " + anio()
                },
                {
                    extend: 'excel',
                    title: title,
                    messageTop: '',
                    messageBottom: "Date d'edition : " + anio()
                }
            ],

            "oLanguage": {
                // switch lang here with a PHP variable 
                "sUrl": "<?php echo HTTP_LANG_DATATABLE ?>fr/fr_FR.txt"
            }
        });

        data.order([0, 'desc']).draw();

        var modalConfirm = function(callback) {

            var url = "";

            $(".btn-confirm").on("click", function() {

                var message = $(this).attr("confirm-message");

                url = $(this).attr("url");;

                $("#modal-body-confirm").html(message);

                $("#confirm-modal").modal('show');
            });

            $("#modal-btn-si").on("click", function() {
                callback(url);
                $("#confirm-modal").modal('hide');
            });

            $("#modal-btn-no").on("click", function() {
                callback(false);
                $("#confirm-modal").modal('hide');
            });
        };

        modalConfirm(function(url) {

            if (url) {
                location.href = url;
            } else {

            }
        });


    });
</script>