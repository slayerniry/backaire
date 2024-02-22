<?php
require_once "header.php";
?>

<div class="well">

    <fieldset>
        <center style="color:silver;font-size:30px;">
            <h3>
                <?= _getText("message.bienvenue") . " : " . ($_SESSION["user_nom"]) ?>&nbsp;<?= _getText("profil") . " : " . ($_SESSION["user_profil"]) ?>
            </h3>
            <div><?= replace_texte_speciaux($date_long) ?></div>
            <div id='horloge'></div>
        </center>
    </fieldset>

</div>
<div class="row">
    <div class="col-sm-3">
        <div class="well">
            <h4>Users</h4>
            <p>1 Million</p>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="well">
            <h4>Pages</h4>
            <p>100 Million</p>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="well">
            <h4>Sessions</h4>
            <p>10 Million</p>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="well">
            <h4>Bounce</h4>
            <p>30%</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="well">
            <p>Text</p>
            <p>Text</p>
            <p>Text</p>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="well">
            <p>Text</p>
            <p>Text</p>
            <p>Text</p>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="well">
            <p>Text</p>
            <p>Text</p>
            <p>Text</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-8">
        <div class="well">
            <p>Text</p>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="well">
            <p>Text</p>
        </div>
    </div>
</div>


<?php require_once "footer.php"; ?>

<script type="text/javascript">
    function refresh() {
        var t = 1000; // rafraîchissement en millisecondes
        setTimeout('showDate()', t)
    }

    function showDate() {
        var date = new Date()
        var h = date.getHours();
        var m = date.getMinutes();
        var s = date.getSeconds();
        if (h < 10) {
            h = '0' + h;
        }
        if (m < 10) {
            m = '0' + m;
        }
        if (s < 10) {
            s = '0' + s;
        }
        var time = h + ':' + m + ':' + s
        document.getElementById('horloge').innerHTML = time;
        refresh();
    }

    jQuery(document).ready(function($) {

        showDate();
    });
</script>