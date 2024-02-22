<?php
$tab_php_self = explode("/", $_SERVER['PHP_SELF']);
require_once($_SERVER["DOCUMENT_ROOT"] . "/" .  $tab_php_self[1] . "/" . "config.inc.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/" .  $tab_php_self[1] . "/" . "session.php");
loadRessource("fr");
require_once(RP_MODELS . "mvtdetail.class.php");
require_once(RP_MODELS . "mvtdetailsortie.class.php");

$mvtdetail = new mvtdetail();
$mvtdetailsortie = new mvtdetailsortie();


$criteremvtdetail["dtmvt_code"] = $_GET["code"];
$dataREST = $mvtdetail->lireRESTParCritere($criteremvtdetail);

if ($dataREST["mvt_type"] == "E") {
	$data = $mvtdetail->lireParCritere($criteremvtdetail);
} else {
	$data = $mvtdetailsortie->lireParCritere($criteremvtdetail);
}


?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">
		<?php echo _getText("info")  ?>
	</h4>
</div>
<div class="modal-body">
	<fieldset>

		<div class="row">
			<div class="col-md-6">

				<table class="table">
					<!--<tr>
						<td><b> <?php echo _getText("source.destination") ?> : </b></td>
						<td><?php echo $data[0]["mvt_source"] ?></td>
					</tr>-->
					<tr>
						<td><b> <?php echo _getText("abrev") . " " . _getText("article") ?> : </b></td>
						<td><?php echo $data[0]["art_abrev"] ?></td>
					</tr>
					<tr>
						<td><b> <?php echo _getText("nom")  . " " . _getText("article") ?> : </b></td>
						<td><?php echo $data[0]["art_nom"] ?></td>
					</tr>
					<tr>
						<td><b> <?php echo _getText("date") . " " . _getText("mouvement")  ?> : </b></td>
						<td><?php echo convertDateFormatGregorien($data[0]["mvt_date"]) ?></td>
					</tr>

					<tr>
						<td><b> <?php echo _getText("type")  . " " . _getText("mouvement") ?> : </b></td>
						<td><span class="badge"><?php echo $data[0]["mvt_type"] ?></span></td>
					</tr>

				</table>


			</div>
			<div class="col-md-6">

				<table class="table">
					<tr>
						<td><b> <?php echo _getText("qte") ?> : </b></td>
						<td><span class=""><?php echo  $dataREST[0]["REST_2"] . "/" .  $data[0]["dtmvt_qte"]  ?></span></td>
					</tr>
					<tr>
						<td><b> <?php echo _getText("nbr.jour.peremption") ?> : </b></td>
						<td><span class="badge"><?php echo $data[0]["dtmvt_nbr_jour_peremption"] ?></span></td>
					</tr>

					<?php if ($data[0]["dtmvt_date_peremption"] != "") {  ?>
						<tr>
							<td><b><?php echo _getText("date.peremption") ?> : </b></td>
							<td><?php echo  convertDateFormatGregorien($data[0]["dtmvt_date_peremption"])  ?></td>
						</tr>
					<?php } ?>
					<tr>
						<td><b><?= _getText("saisie") ?> : </b></td>
						<td><span class="badge"><?= $data[0]["user_login"] ?></span></td>
					</tr>
				</table>




			</div>
		</div>
	</fieldset>
	<fieldset>
		<form class="" data-toggle="validator" method="post" id="form" action="<?php echo HTTP_EXEC_ADMIN ?>formVerouilleDetailMvtExec.php">

			<input type="hidden" name="dtmvt_code" value="<?php echo $data[0]["dtmvt_code"] ?>">
			<input type="hidden" name="mvt_type" value="<?php echo $data[0]["mvt_type"] ?>">
			<input type="hidden" name="art_code" value="<?php echo $data[0]["art_code"] ?>">



			<div class="form-group row">
				<label for="" class="control-label col-sm-2">
					<?php
					echo _getText('btnVerouiller');


					if ($data[0]["dtmvt_verouille"] == 1) {
						$checked_O = "checked";
					} else {
						$checked_N = "checked";
					}

					?></label>
				<div class="col-sm-10">
					<div class="col-xs-3">
						<label for="dtmvt_verouille_O" class="control-label">
							<input disabled <?= $checked_O ?> class="form-control" type="radio" name="dtmvt_verouille" value="1" id="dtmvt_verouille_O"><?= _getText("btnOui")  ?></label>
					</div>
					<div class="col-xs-3">
						<label for="dtmvt_verouille_N" class="control-label">
							<input disabled <?= $checked_N  ?> class="form-control" type="radio" name="dtmvt_verouille" value="0" id="dtmvt_verouille_N"><?= _getText("btnNon")  ?></label>
					</div>

				</div>
			</div>
		</form>
	</fieldset>
</div>
<script type="text/javascript">
	$(document).ready(function() {});
</script>