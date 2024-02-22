<?php

define("FORMATDATETIME", "Y-m-d");

/**
 * 
 * Liste des fonctions utilis�es pour g�rer le temps (heures et dates)

 * Retourne la valeur de la date courante au format datestamp
 * @return	integer	valeur datestamp de la date courante
 * @access	public
 */
function dateTimestamp()
{
	$date = getdate();
	return ($date["0"]);
}

/**
 * Retourne une date compl�re (avec heure) en utilisant le format FormatDateTime
 * @param	integer	$date	date a traiter
 * @access	public
 */
function ReplaceDateTime($date)
{
	if ($date == '') {
		return ('');
	}
	return (date(FORMATDATETIME, $date));
}

/**
 * Retourne une date (sans l'heure) en utilisant le format formatDate
 * @param	integer	$date	timestamp date a traiter
 * @access	public
 */
function ReplaceDate($date)
{
	if (
		$date == '' ||
		$date < 0 || $date > 2147382000
	) {
		//2147382000 = timestamp max accept� � peu pr�s. (19 Janvier 2038)
		return ('');
	}
	return (date(FORMATDATETIME, $date));
}

/**
 * retourne une chaine au format voulu (0=>hh:mm:ss, 1=>2 h 36 mn)
 * @param	string	$val	valeur a afficher en sec
 * @param	integer	$format	indique le format du retour
 * @return string heure au format voulu
 * @access	public
 */
function ReplaceTime($val, $format = 0)
{
	$h = intval(intval($val) / 3600);
	if ($h < 10 && $format == 0) {
		$h =  "0" . $h;
	}

	$m = ((intval($val) / 60) % 60);
	if ($m < 10 && $format == 0) {
		$m =  "0" . $m;
	}

	$s = (intval($val) % 60);
	if ($s < 10 && $format == 0) {
		$s = "0" . $s;
	}

	switch ($format) {
		case 0:
			$res = $h . ':' . $m . ':' . $s;
			break;
		case 1:
			$res = ($h > 0 ? $h . ' h ' : '');
			$res .= ($m > 0 ? $m . ' mn ' : '');
			$res .= ($s > 0 || strlen($res) == 0 ? $s . ' s' : '');
			break;
	}
	return ($res);
}

/**
 * toTimeStamp()
 * Retourne le timestamp (en secondes) d'une date (au format JJ/MM/AA)
 * @param	string	$date	la date � convertir
 * @return integer	timestamp
 * @access public
 **/
function toTimeStamp($date = '')
{
	if ($date == '' || $date == '01/01/70') {
		//Si la date est vide, retourne le timestamp du jour
		return mktime(0, 0, 0, Date('m'), Date('d'), Date('Y'));;
	} else {
		$ret = explode('/', $date);
		$ret[0] = isset($ret[0]) ? $ret[0] : 0;
		$ret[1] = isset($ret[1]) ? $ret[1] : 0;
		$ret[2] = isset($ret[2]) ? $ret[2] : 0;
		$res = mktime(0, 0, 0, $ret[1], $ret[0], $ret[2]);
		return ($res === -1 ? '01/01/70' : $res);
	}
}

/**
 * Retourne le temps en secondes d'un temps au format hh:mm:ss
 * @param	string	$time	le temps � convertir
 * @return integer temps en secondes
 * @access public
 **/
function toSeconds($time = '')
{
	$ret = explode(':', $time);
	$ret[0] = (!isset($ret[0])) ? 0 : $ret[0];
	$ret[1] = (!isset($ret[1]) || isset($ret[1]) > 59) ? 0 : $ret[1];
	$ret[2] = (!isset($ret[2]) || isset($ret[2]) > 59) ? 0 : $ret[2];
	return $ret[0] * 3600 + $ret[1] * 60 + $ret[2];
}

/**
 * ExtractTime()
 * Retourne l'heure timestamp (en secondes) d'une date
 * @param	integer	$timestamp	la date � convertir
 * @return integer	timestamp
 * @access public
 **/
function ExtractTime($timestamp)
{
	$val = ReplaceDateTime($timestamp);
	$res = 0;
	if (strlen($val) > 0) {
		$tab = explode(' ', $val);
		$tab = explode(':', $tab[1]);
		$res = ($tab[0] * 3600) + ($tab[1] * 60) + $tab[2];
	}
	return ($res);
}

function laDate()
{
	$tMois = array(
		"janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout",
		"septembre", "octobre", "novembre", "decembre"
	);

	$tJours = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
	$tCal   = array("Lun", "Mar", "Mer", "Jeu", "Ven", "Sam", "Dim");
	$tSem   = array('Sem', 'Semaine', 'Jour');
	return $tJours[date("w")] . " " . date("j") . (date("j") == 1 ? "er " : " ") . $tMois[date("n") - 1] . " " . date("Y");
}

function laDate2()
{
	$tMois = array(
		"janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout",
		"septembre", "octobre", "novembre", "decembre"
	);

	$tJours = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
	$tCal   = array("Lun", "Mar", "Mer", "Jeu", "Ven", "Sam", "Dim");
	$tSem   = array('Sem', 'Semaine', 'Jour');
	return date("j") . (date("j") == 1 ? "er " : " ") . $tMois[date("n") - 1] . " " . date("Y");
}

/**
   /**
 * convertir le format de la date DD-MM-YYYY en YYYY-MM-DD
 * format MySQL
 * @access public
 **/
function convertDateFormat($str)
{
	$tmp = $str;
	$Y = substr($tmp, -4, 4);
	$M = substr($tmp, 3, 2);
	$D = substr($tmp, 0, 2);
	$tmp = $Y . '-' . $M . '-' . $D;
	return $tmp;
}

/**
 * convertir le format de la date DD-MM-YYYY en YYYY-MM-DD
 * format MySQL
 * @access public
 **/
function convertDateToFormatBase($str, $ch)
{
	$tmp = $str;
	$Y = substr($tmp, -4, 4);
	$M = substr($tmp, 3, 2);
	$D = substr($tmp, 0, 2);
	$tmp = $Y . $ch . $M . $ch . $D;
	return $tmp;
}



/**
 * convertir le format de la date YYYY-MM-DD en DD-MM-YYYY 
 * @access public   
 **/
function convertDateFormat2($str)
{
	$tmp = $str;
	$Y = substr($tmp, 0, 4);
	$M = substr($tmp, 5, 2);
	$D = substr($tmp, -2, 2);
	$tmp = $D . '-' . $M . '-' . $Y;
	return $tmp;
}


/**
 * convertir le format de la date YYYY-MM-DD en DD-MM-YYYY 
 * @access public   
 **/
function convertDateFormat3($str, $ch)
{
	$tmp =   str_replace("00:00:00", "", $str);

	$tmp = str_replace(" ", "", $tmp);
	$Y = substr($tmp, 0, 4);
	$M = substr($tmp, 5, 2);
	$D = substr($tmp, -2, 2);
	$tmp = $D . $ch . $M . $ch . $Y;
	return $tmp;
}

/**
 * ReplaceDateFr()
 * Retourne une date au format dd mois annee (mois textuel en fran�ais)
 * @param	integer	$timestamp	la date � convertir
 * @return string	timestamp
 * @access public
 **/
function ReplaceDateFr($date_timestamp)
{
	$tMois = array(
		"janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout",
		"septembre", "octobre", "novembre", "decembre"
	);

	return date("j", $date_timestamp) . (date("j", $date_timestamp) == 1 ? "er " : " ") . $tMois[date("n", $date_timestamp) - 1] . " " . date("Y", $date_timestamp);
}

/**
 * GetToday()
 * Retourne la date d'aujourd'hui au format dd/mm/YYYY
 * @return string	timestamp
 * @access public
 **/
function GetToday()
{
	return date("d/m/Y");
}

function GetToday2()
{
	return date("Y-m-d");
}

/**
 * GetCurrentYear()
 * Retourne l'ann�e en cours au format dd/mm/YYYY
 * @return string	timestamp
 * @access public
 **/
function GetCurrentYear()
{
	return date("Y");
}
function GetCurrentMounth()
{
	return date("m");
}

function GetCurrentTime()
{
	return date("H:i");
}

/**
 * convertir le format de la date YYYY-MM-DD en DD-MM-YYYY 
 * @access public   
 **/
function convertDateFormatGregorien($str)
{
	$tmp = "";
	if ($str != "") {
		$tmp = $str;
		$Y = substr($tmp, 0, 4);
		$M = substr($tmp, 5, 2);
		$D = substr($tmp, -2, 2);
		$tmp = $D . '/' . $M . '/' . $Y;
	}

	return $tmp;
}

/**
 * convertir le format de la date YYYY-MM-DD en DD-MM-YYYY 
 * @access public   
 **/
function convertDateFormat4($str)
{
	$tmp = $str;
	$Y = substr($tmp, 0, 4);
	$M = substr($tmp, 5, 2);
	$D = substr($tmp, 8, 2);
	$tmp = $D . '/' . $M . '/' . $Y;
	return $tmp;
}

function add_date($givendate, $day = 0, $mth = 0, $yr = 0)
{
	$cd = strtotime($givendate);
	$newdate = date('Y-m-d ', mktime(
		date('h', $cd),
		date('i', $cd),
		date('s', $cd),
		date('m', $cd) + $mth,
		date('d', $cd) + $day,
		date('Y', $cd) + $yr
	));
	return $newdate;
}

/**
 * affichage d'un nombre r�el en x chiffre apr�s la virgule
 * @access	public
 */
function printNombre($nb, $x)
{
	$tmp = $nb;
	$pos = strrpos($tmp, ".");
	if ($pos == FALSE) {
		$tmp = $nb;
	} else {
		$tmp1 = substr($tmp, 0, $pos);
		$tmp2 = substr($tmp, $pos + 1, $x);
		$tmp = $tmp1 . '.' . $tmp2;
	}
	return $tmp;
}


function nn_crypt($data)
{
	return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function formatCurrency($montant)
{
	if ($montant > 0)
		return  number_format($montant, 0, ".", " ");
	else
		return "0";
}

function list_dir($chemin)
{
	$tab = array();
	$i = 0;

	if ($dir = opendir($chemin)) {
		while ($file = readdir($dir)) {
			if ($file > 0) {
				$tab[$i] =  $file;
				$i++;
			}
		}
		closedir($dir);
	}

	return $tab;
}


function listeMois()
{

	$res = array();

	$tMois = array(
		"janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout",
		"septembre", "octobre", "novembre", "decembre"
	);

	$i = 1;
	foreach ($tMois as $key => $value) {
		$res[$i]["num"] = $i;
		$res[$i]["mois"] = $value;

		$i++;
	}

	return $res;
}

function formaterNumeroTelephone($numero)
{
	// Supprimer tous les caractères non numériques du numéro de téléphone
	$numero = preg_replace('/[^0-9]/', '', $numero);

	// Vérifier si le numéro a la longueur attendue
	if (strlen($numero) !== 10) {
		// Le numéro de téléphone n'a pas la longueur attendue
		return 'Numéro de téléphone invalide';
	}

	// Extraire les parties du numéro de téléphone
	$partie1 = substr($numero, 0, 3);
	$partie2 = substr($numero, 3, 2);
	$partie3 = substr($numero, 5, 3);
	$partie4 = substr($numero, 8, 2);

	// Former le numéro de téléphone formaté
	$numeroFormate = $partie1 . ' ' . $partie2 . ' ' . $partie3 . ' ' . $partie4;

	return $numeroFormate;
}
