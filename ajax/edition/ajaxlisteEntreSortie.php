<?php

require_once("../../config.inc.php");

require_once(RP_MODELS . "mvtdetail.class.php");

$mvtdetail = new mvtdetail();

$critere = array();


if (isset($_POST) && $_POST["mvt_date_min"] != "") {
	$critere = $_POST;
} else {
	$critere["mvt_date_min"] = "";
	$critere["mvt_date_max"] = "";
}


$tab['mvtdetail'] = $mvtdetail->lireEntreSortie($critere);

if ($tab['mvtdetail']['cnt'] == 0) { ?>

	<tr>
		<td></td>
	</tr>


	<?php } else {

	for ($i = 0; $i < $tab['mvtdetail']['cnt']; $i++) {  ?>
		<tr>
			<td>
				<?php echo $tab['mvtdetail'][$i]['art_abrev'] . " " . $tab['mvtdetail'][$i]['art_nom']  ?>
			</td>


			<td align="right">
				<?php echo formatCurrency($tab['mvtdetail'][$i]['prix_S']) ?>
			</td>
			<td align="right">
				<?php echo $tab['mvtdetail'][$i]['qte_E'] ?>
			</td>
			<td align="right">
				<?php echo ($tab['mvtdetail'][$i]['qte_S'] == "" ? 0 : $tab['mvtdetail'][$i]['qte_S']) ?>
			</td>
			<?php
			if ($tab['mvtdetail'][$i]['qte_S'] != "") {

				$entre = (int) $tab['mvtdetail'][$i]['qte_E'];
				$sortie = (int)  $tab['mvtdetail'][$i]['qte_S'];
				$pourcentage = (($entre - $sortie) * 100) / $entre;
				switch (true) {
					case $pourcentage <= 20:
						$priority = 'green';
						break;
					case $pourcentage <= 40:
						$priority = 'orange';
						break;
					case $pourcentage <= 60:
						$priority = 'red';
						break;
					default:
						$priority = 'black';
						break;
				}
			} else {
				$pourcentage = 0;
			}

			?>
			<td style="color: <?= $priority ?>" align="right">
				<?= $pourcentage; ?>
			</td>
		</tr>
<?php }
} ?>