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
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                Files</a>
            </h4>
          </div>
          <div id="collapse1" class="panel-collapse collapse in">
            <ul class="list-group">
              <li class="list-group-item"><span class="badge">253</span> New</li>
              <li class="list-group-item"><span class="badge">17</span> Deleted</li>
              <li class="list-group-item"><span class="badge">3</span> Reported</li>
            </ul>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                Blog</a>
            </h4>
          </div>
          <div id="collapse2" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item"><span class="badge">12</span> New</li>
              <li class="list-group-item"><span class="badge">5</span> Deleted</li>
            </ul>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                Settings</a>
            </h4>
          </div>
          <div id="collapse3" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item"><span class="badge">1</span> Users Reported</li>
              <li class="list-group-item"><span class="badge">5</span> User Waiting Activation</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
    <h4>Today Stats:</h4>
          Visits<span class="pull-right strong">- 15%</span>
          <div class="progress">
            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width:15%">15%</div>
          </div>
          20 New Users<span class="pull-right strong">+ 30%</span>
          <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width:30%">30%</div>
          </div>
          359 Downloads<span class="pull-right strong">+ 8%</span>
          <div class="progress">
            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="8" aria-valuemin="0" aria-valuemax="100" style="width:8%">8%</div>
          </div>
    </div>
    <div class="col-sm-4">
    <h4>This Month Stats:</h4>
          Visits<span class="pull-right strong">+ 45%</span>
          <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width:45%">45%</div>
          </div>
          395 New Users<span class="pull-right strong">+ 57%</span>
          <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width:57%">57%</div>
          </div>
          12.593 Downloads<span class="pull-right strong">+ 25%</span>
          <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:25%">25%</div>
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