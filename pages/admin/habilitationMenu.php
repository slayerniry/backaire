<?php require_once("../header.php");

if ($utilisateur->habilitationMenu($_SERVER["SCRIPT_NAME"], $_SESSION["prf_code"])) {

	require_once(RP_MODELS . "parametre.class.php");
	require_once(RP_MODELS . "profil.class.php");
	require_once(RP_MODELS . "menu.class.php");
	require_once(RP_MODELS . "profil_menu.class.php");
	require_once(RP_MODELS . "tarif.class.php");
	require_once(RP_MODELS . "type_reference.class.php");


	$parametre = new parametre();
	$profil = new profil();
	$menu = new menu();
	$profil_menu = new profil_menu();
	$tarif = new tarif();
	$type_reference = new type_reference();


	$tab_menu_parent = array();
	$tab = array();
	$tab2 = array();
	$menu_parent = $parametre->lireParKey("MENU_PARENT");
	$tab = explode(",", $menu_parent);


	foreach ($tab as $key => $value) {
		$tab2 = explode("|", $value);

		$tab_menu_parent[$key]["code"] = $tab2[0];
		$tab_menu_parent[$key]["nom"] = $tab2[1];
	}

	$tabProfil = $profil->lireParCritere(array());


	$prf_code = 0;

	$tab_profil_menu = array();
	$tabTypeRefProfil = array();

	if (isset($_POST["prf_code"])) {

		$critereProfilMenu["prf_code"] = $_POST["prf_code"];

		$tab_profil_menu = $profil_menu->lireParCritere($critereProfilMenu);

		$tabTypeRefProfil = $tarif->lireTable2($_POST["prf_code"], "profil_autre", "prf_code");
	} else if (isset($_GET["prf_code"])) {

		$critereProfilMenu["prf_code"] = $_GET["prf_code"];

		$tab_profil_menu = $profil_menu->lireParCritere($critereProfilMenu);

		$tabTypeRefProfil = $tarif->lireTable2($_GET["prf_code"], "profil_autre", "prf_code");
	} // fin if


	function Ischecked($tab, $src)
	{

		foreach ($tab as $key => $value) {

			if (isset($value["menu_principale"])) {
				if ($value["menu_principale"] == $src)
					return "checked";
			}

			if (isset($value["men_id"])) {
				if ($value["men_id"] == $src)
					return "checked";
			}
		}

		return "";
	}

	$tabTypeRef = $type_reference->lireParCritere(array());


?>

	<link rel="stylesheet" href="../css/tree.css" crossorigin="anonymous">

	<style type="text/css">
		.form-check-input[type=checkbox] {
			padding-top: 10px;
			border-radius: .25em;
			height: 18px;
			width: 18px;
			background-color: green !important;
		}
	</style>

	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title">
			<?php echo _getText("habilitation")  ?>
		</h4>
	</div>

	<div class="modal-body">
		<div class="row">


			<div class="col-md-9">
				<div class="row">
					<div class="col-md-12">

						<fieldset class="col-md-6">
							<legend><?php echo _getText("recherche") ?></legend>
							<form class="" data-toggle="validator" method="post" id="form" action="<?php echo $_SERVER["PHP_SELF"] ?>">

								<div class="form-group row">
									<label for="inv_ref" id="lb_inv_ref" class="control-label col-sm-2">
										<?php echo _getText('profil')  ?></label>

									<div class="col-sm-10">
										<select class="form-control" name="prf_code" id="prf_code">
											<option value="0"></option>
											<?php for ($i = 0; $i < $tabProfil["cnt"]; $i++) { ?>
												<option value="<?php echo $tabProfil[$i]["prf_code"] ?>"><?php echo $tabProfil[$i]["prf_nom"] ?></option>
											<?php } ?>
										</select>

									</div>
								</div>
								<div class="form-group row ">
									<center><button type="submit" class="btn btn-success">
											<?php echo _getText("btnValider")  ?></button></center>
								</div>

							</form>
						</fieldset>

					</div>
				</div>
				<div class=" row">
					<div class="col-md-12 ">
						<hr>
					</div>
				</div>
				<hr>



				<div class="panel with-nav-tabs panel-info">
					<div class="panel-heading">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#MENU" data-toggle="tab" aria-expanded="true">
									<?php echo _getText("liste.menu.bouton") ?></a>
							</li>
							<li class="">
								<a href="#AUTRE" data-toggle="tab" aria-expanded="false">
									<?= _getText("autre") ?> </a>
							</li>

						</ul>
					</div>
					<div class="panel-body">
						<div class="tab-content">
							<div class="tab-pane fade active in" id="MENU">

								<form method="post" name="formMAJ" id="formMAJ" action="<?= HTTP_EXEC_ADMIN ?>formhabilitationMenuExec.php">


									<input type="hidden" name="prf_code" id="prf_code2" value="<?php echo $_POST["prf_code"] ?? "" ?>">

									<div class="tree well">
										<ul>
											<?php

											$tab_menu_parent2 = $tab_menu_parent;

											foreach ($tab_menu_parent as $key => $value) {


												$checked = Ischecked($tab_menu_parent2, $value["code"]);


											?>
												<li><input <?= $checked ?> type="checkbox" class="form-check-input" id="men_id_<?= $value["code"] ?>" name="<?= $value["code"] ?>" value="<?= $value["code"] ?>">
													<span><i class="icon-folder-open"></i><?php echo $value["nom"] ?>
													</span> <span class="badge">
														<?php

														$critereMenu['men_parent'] = $value["code"];
														$tab_menu = $menu->lireParCritere($critereMenu);

														echo  $tab_menu["cnt"]   ?> </span>
													<ul>

														<?php
														for ($i = 0; $i < $tab_menu["cnt"]; $i++) {


															$checked = Ischecked($tab_profil_menu, $tab_menu[$i]["men_id"]);

														?>

															<li> <input <?= $checked ?> type="checkbox" class="form-check-input" id="men_id_<?= $value["code"] .  $tab_menu[$i]["men_id"]  ?>" name="men_id_<?= $tab_menu[$i]["men_id"] ?>" value="<?= $tab_menu[$i]["men_id"] ?>">



																<span style="width: 250px;text-align: left;" class="btn btn-success" title=""><i class="glyphicon glyphicon-<?php echo $tab_menu[$i]["men_icon"] ?>"></i> <?php echo $tab_menu[$i]["men_nom"] ?></span>

																<span class="badge">
																	<?php

																	$critereMenu2['men_parent2'] = $tab_menu[$i]["men_id"];
																	$tab_menu2 = $menu->lireParCritere($critereMenu2);

																	echo $tab_menu2["cnt"];

																	?>
																</span>
																<!--<span class="badge"><?= $tab_menu[$i]["men_id"] ?></span>-->

																<ul>

																	<?php



																	for ($j = 0; $j < $tab_menu2["cnt"]; $j++) {

																		$checked = Ischecked($tab_profil_menu, $tab_menu2[$j]["men_id"]);
																	?>

																		<li>
																			<input <?= $checked ?> type="checkbox" class="form-check-input" id="men_id_<?= $value["code"] . $tab_menu[$i]["men_id"]  ?>_<?= $tab_menu2[$j]["men_id"] ?>" name="men_id_<?= $tab_menu[$i]["men_id"] ?>_<?= $tab_menu2[$j]["men_id"] ?>" value="<?= $tab_menu2[$j]["men_id"] ?>">


																			<span style="width: 100px"><i class="icon-folder-open"></i><?= $tab_menu2[$j]["men_nom"]  ?></span>
																			<span class="badge">
																				<?php

																				$critereMenu3['men_parent3'] = $tab_menu2[$j]["men_id"];
																				$tab_menu3 = $menu->lireParCritere($critereMenu3);

																				echo $tab_menu3["cnt"] ?>
																			</span>

																			<!--<span class="badge"><?= $tab_menu2[$j]["men_id"] ?></span>-->
																			<i></i>
																			<div class="pull-right btn-group btn-group-sm"> <?php echo $tab_menu2[$j]["men_html"] ?>
																			</div>


																			<ul>
																				<?php

																				for ($k = 0; $k < $tab_menu3["cnt"]; $k++) {

																					$checked = Ischecked($tab_profil_menu, $tab_menu3[$k]["men_id"]);


																				?>
																					<li><input <?php echo $checked ?> type="checkbox" class="form-check-input" id="men_id_<?= $value["code"] . $tab_menu[$i]["men_id"] ?>_<?= $tab_menu2[$j]["men_id"] ?>_<?= $tab_menu3[$k]["men_id"] ?>" name="men_id_<?= $tab_menu[$i]["men_id"] ?>_<?= $tab_menu2[$j]["men_id"] ?>_<?= $tab_menu3[$k]["men_id"] ?>" value="<?= $tab_menu3[$k]["men_id"] ?>">
																						<span style="width: 100px"><i class="icon-folder-open"></i><?php echo  $tab_menu3[$k]["men_nom"] ?></span>

																						<span class="badge">
																							<?php

																							$critereMenu4['men_parent3'] = $tab_menu3[$k]["men_id"];
																							$tab_menu4 = $menu->lireParCritere($critereMenu4);

																							echo $tab_menu4["cnt"] ?>
																						</span>
																						<div class="pull-right btn-group btn-group-sm"> <?php echo $tab_menu3[$k]["men_html"] ?>
																						</div>

																					</li>

																				<?php } ?>

																			</ul>

																		</li>

																	<?php } ?>
																</ul>
															</li>

														<?php } ?>

													</ul>

												</li>
											<?php   } // fin for menu parent 
											?>
										</ul>
									</div>


									<?php

									if ($utilisateur->habilitationButton($_SERVER["SCRIPT_NAME"], "btnValider", $_SESSION["prf_code"])) {

									?>
										<center><button type="submit" id="btnEnreg" class="btn btn-success">
												<?php echo _getText("btnValider")  ?></button></center>

									<?php } ?>

								</form>
							</div>
							<div class="tab-pane" id="AUTRE">

								<form method="post" id="formMAJAutre" action="<?= HTTP_EXEC_ADMIN ?>formhabilitationAutreExec.php">


									<div class="col-md-6">

										<ul class="list-group">
											<?php
											if (isset($tabTypeRefProfil["cnt"]))
												unset($tabTypeRefProfil["cnt"]);

											for ($i = 0; $i < 3; $i++) {

												foreach ($tabTypeRefProfil as $key => $value) {
													$chk = "";
													if ($tabTypeRef[$i]["tpr_code"] == $value["tpr_code"]) {
														$chk = "checked";
														break;
													}
												}

											?>
												<li class="list-group-item">
													<div class="row">
														<div class="col-md-8"><span class="glyphicon glyphicon-option-horizontal"></span>&nbsp;<b><?= $tabTypeRef[$i]["tpr_nom"]  ?></b></div>
														<div class="col-md-4"><input <?= $chk ?? "" ?> name="<?= $i  ?>" type="checkbox" class="form-control" value="<?= $tabTypeRef[$i]["tpr_code"]  ?>"></div>
													</div>
												</li>

											<?php }  ?>
										</ul>
									</div>
									<div class="col-md-6">
										<ul class="list-group">
											<?php
											for ($i = 3; $i < $tabTypeRef["cnt"]; $i++) {

												foreach ($tabTypeRefProfil as $key => $value) {
													$chk = "";
													if ($tabTypeRef[$i]["tpr_code"] == $value["tpr_code"]) {
														$chk = "checked";
														break;
													}
												}
											?>
												<li class="list-group-item">
													<div class="row">
														<div class="col-md-8"><span class="glyphicon glyphicon-option-horizontal"></span><b>&nbsp;<?= $tabTypeRef[$i]["tpr_nom"]  ?></b></div>
														<div class="col-md-4"><input <?= $chk ?? "" ?> name="<?= $i  ?>" type="checkbox" class="form-control" value="<?= $tabTypeRef[$i]["tpr_code"]  ?>"></div>
													</div>
												</li>
											<?php }  ?>
										</ul>
									</div>


									<input type="hidden" name="prf_code" id="prf_codeAutre" class="form-control" value="">

									<?php

									if ($utilisateur->habilitationButton($_SERVER["SCRIPT_NAME"], "btnValider", $_SESSION["prf_code"])) {

									?>
										<div class="form-group">
											<center>
												<button type="submit" class="btn btn-success"><?= _getText("btnValider") . " " . _getText("autre") ?></button>
											</center>
										</div>
									<?php } ?>


								</form>
							</div>
						</div>
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
								<?= _getText("formulaire") ?>
							</legend>

							<ol>
								<li>
									<?= _getText("select.list") ?>
								</li>
								<li>
									<?php echo _getText("cliquer.bouton") ?> <span class="btn btn-success">
										<?php echo _getText("btnValider")  ?>
									</span> <?php echo _getText("pour.affiche.menu") ?>
								</li>
								<li>
									<input type="checkbox" class="form-check-input"> <?= _getText("coche.menu.bouton") ?>

								</li>
								<li>
									<?php echo _getText("cliquer.bouton") ?> <span class="btn btn-success">
										<?php echo _getText("btnValider")  ?>
									</span> <?php echo _getText("pour.enregistrer") ?>
								</li>

							</ol>


						</fieldset>

					</div>
				</div>
			</div>
		</div>
	</div>

	<?php require_once("../footer.php")  ?>

	<script>
		$(function() {

			$("#prf_code").change(function(event) {

				$("#prf_codeAutre").val($(this).val());

				$("#form").submit();

			});


			$('#formMAJ').on('submit', function(e) {

				if ($("#prf_code").val() == 0) {
					alert("Profil obligatoire ! ");

					e.preventDefault();
				}

			});


			$('#formMAJAutre').on('submit', function(e) {

				if ($("#prf_code").val() == 0) {
					alert("Profil obligatoire ! ");

					e.preventDefault();
				}

			});


			//$(".tree").find(' > ul > li > ul > li ').hide('fast');
			//$(".tree").find(' > ul > li > ul > li > ul > li ').hide('fast');
			//$(".tree").find(' > ul > li > ul > li > ul > li > ul > li ').hide('fast');

			$('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Cacher');
			$('.tree li.parent_li > span').on('click', function(e) {
				var children = $(this).parent('li.parent_li').find(' > ul > li');
				if (children.is(":visible")) {
					children.hide('fast');
					$(this).attr('title', 'Afficher').find(' > i').addClass('icon-folder-close').removeClass('icon-folder-open');
				} else {
					children.show('fast');
					$(this).attr('title', 'Cacher').find(' > i').addClass('icon-folder-open').removeClass('icon-folder-close');
				}
				e.stopPropagation();
			});

			$('.tree li a').after('');


			$("input[type='checkbox']").change(function(event) {


				if ($(this).is(':checked')) {

					$(this).parent().find("input[type='checkbox']").each(function(index, el) {

						$(this).prop('checked', 'checked');
					});


				} else {
					$(this).parent().find("input[type='checkbox']").each(function(index, el) {

						$(this).prop('checked', '');
					});
				}



			});

			$("#prf_code").val(0);


			<?php if (isset($_POST["prf_code"])) { ?>

				$("#prf_code").val("<?php echo $_POST["prf_code"] ?>");

				$("#prf_code2").val("<?php echo $_POST["prf_code"] ?>");

				$("#prf_codeAutre").val("<?php echo $_POST["prf_code"] ?>");

			<?php } ?>


			<?php if (isset($_GET["prf_code"])) { ?>

				$("#prf_code").val("<?php echo $_GET["prf_code"] ?>");

				$("#prf_code2").val("<?php echo $_GET["prf_code"] ?>");

				$("#prf_codeAutre").val("<?php echo $_GET["prf_code"] ?>");

			<?php } ?>

		});
	</script>

<?php } else {
	require_once(RP_MAIN . "pages/vide.php");
} ?>