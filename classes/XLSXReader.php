<?php

function exportExcel($tab)
{

	// Créer une nouvelle instance de Spreadsheet
	$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

	// Ajouter les données dans la feuille de calcul
	$worksheet = $spreadsheet->getActiveSheet();
	$worksheet->fromArray($tab);

	// Créer un objet Writer pour le format Excel 2007
	$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

	// Chemin du fichier à télécharger
	$file = RP_XLSX .  'fichier' . dateTimestamp()  . '.xlsx';

	// Enregistrer le fichier Excel
	$writer->save($file);

	// Nom du fichier de sortie
	$filename = 'Etat_' . dateTimestamp()  . '.xlsx';

	// Envoi des en-têtes HTTP pour le téléchargement
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="' . $filename . '"');
	header('Content-Length: ' . filesize($file));

	// Lecture du fichier et envoi au client
	readfile($file);
}
