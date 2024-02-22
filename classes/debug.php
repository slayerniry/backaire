<?php

/**
 * Liste de fonctions utilisees par Ganesha.
 *
 * @author		Georges Caldeira <gcaldeira@anemalab.org>
 * @package		GaneshaInc
 */

/**
 * Affiche un commentaire en HTML
 * @param	string	$txt	chaine a afficher en commentaire
 * @access	public
 * @see
 */
function put_debug($txt)
{
	return "<!-- " . $txt . " // -->\n";
}

/**
 * Affiche une chaine de debug et termine le script
 * @param	string	$val	valeur a afficher
 * @access	public
 */
function debug($val = '')
{
	if (is_array($val)) {
		print('<pre>');
		print_r($val);
		print('</pre>');
	} else {
		$val .= '';
		if ($val == '') {
			print("<pre>\n");
			print_r(debug_backtrace());
			print("</pre>\n");
		} else {
			print("DEBUG : " . $val);
		}
	}
	exit();
}




function replace_texte_etat_decode($str)
{

	$balise = array("<em>", "</em>", "<sup>", "</sup>", "<br />", "<br>", "/", ",", ";");

	if ($str == '')
		$str = ' ';

	$texte = str_replace($balise, " ", $str);


	$texte = str_replace("&#039;", ("'"), $texte);
	$texte = str_replace("&quot;", ("'"), $texte);
	$texte = str_replace("&amp;", ("&"), $texte);
	$texte = str_replace("&lt;", ("<"), $texte);
	$texte = str_replace("&gt;", (">"), $texte);
	$texte = str_replace("&nbsp;", (" "), $texte);
	$texte = str_replace("&iexcl;", ("¡"), $texte);
	$texte = str_replace("&cent;", ("¢"), $texte);
	$texte = str_replace("&pound;", ("£"), $texte);
	$texte = str_replace("&curren;", ("¤"), $texte);
	$texte = str_replace("&yen;", ("¥"), $texte);
	$texte = str_replace("&brvbar;", ("¦"), $texte);
	$texte = str_replace("&sect;", ("§"), $texte);
	$texte = str_replace("&uml;", ("¨"), $texte);
	$texte = str_replace("&copy;", ("©"), $texte);
	$texte = str_replace("&ordf;", ("ª"), $texte);
	$texte = str_replace("&laquo;", ("«"), $texte);
	$texte = str_replace("&not;", ("¬"), $texte);
	$texte = str_replace("&shy;", ("­"), $texte);
	$texte = str_replace("&reg;", ("®"), $texte);
	$texte = str_replace("&macr;", ("¯"), $texte);
	$texte = str_replace("&deg;", ("°"), $texte);
	$texte = str_replace("&plusmn;", ("±"), $texte);
	$texte = str_replace("&sup2;", ("²"), $texte);
	$texte = str_replace("&sup3;", ("³"), $texte);
	$texte = str_replace("&acute;", ("´"), $texte);
	$texte = str_replace("&micro;", ("µ"), $texte);
	$texte = str_replace("&para;", ("¶"), $texte);
	$texte = str_replace("&middot;", ("·"), $texte);
	$texte = str_replace("&cedil;", ("¸"), $texte);
	$texte = str_replace("&sup1;", ("¹"), $texte);
	$texte = str_replace("&ordm;", ("º"), $texte);
	$texte = str_replace("&raquo;", ("»"), $texte);
	$texte = str_replace("&frac14;", ("¼"), $texte);
	$texte = str_replace("&frac12;", ("½"), $texte);
	$texte = str_replace("&frac34;", ("¾"), $texte);
	$texte = str_replace("&iquest;", ("¿"), $texte);
	$texte = str_replace("&Agrave;", ("À"), $texte);
	$texte = str_replace("&Aacute;", ("Á"), $texte);
	$texte = str_replace("&Acirc;", ("Â"), $texte);
	$texte = str_replace("&Atilde;", ("Ã"), $texte);
	$texte = str_replace("&Auml;", ("Ä"), $texte);
	$texte = str_replace("&Aring;", ("Å"), $texte);
	$texte = str_replace("&AElig;", ("Æ"), $texte);
	$texte = str_replace("&Ccedil;", ("Ç"), $texte);
	$texte = str_replace("&Egrave;", ("È"), $texte);
	$texte = str_replace("&Eacute;", ("É"), $texte);
	$texte = str_replace("&Ecirc;", ("Ê"), $texte);
	$texte = str_replace("&Euml;", ("Ë"), $texte);
	$texte = str_replace("&Igrave;", ("Ì"), $texte);
	$texte = str_replace("&Iacute;", ("Í"), $texte);
	$texte = str_replace("&Icirc;", ("Î"), $texte);
	$texte = str_replace("&Iuml;", ("Ï"), $texte);
	$texte = str_replace("&ETH;", ("Ð"), $texte);
	$texte = str_replace("&Ntilde;", ("Ñ"), $texte);
	$texte = str_replace("&Ograve;", ("Ò"), $texte);
	$texte = str_replace("&Oacute;", ("Ó"), $texte);
	$texte = str_replace("&Ocirc;", ("Ô"), $texte);
	$texte = str_replace("&Otilde;", ("Õ"), $texte);
	$texte = str_replace("&Ouml;", ("Ö"), $texte);
	$texte = str_replace("&times;", ("×"), $texte);
	$texte = str_replace("&Oslash;", ("Ø"), $texte);
	$texte = str_replace("&Ugrave;", ("Ù"), $texte);
	$texte = str_replace("&Uacute;", ("Ú"), $texte);
	$texte = str_replace("&Ucirc;", ("Û"), $texte);
	$texte = str_replace("&Uuml;", ("Ü"), $texte);
	$texte = str_replace("&Yacute;", ("Ý"), $texte);
	$texte = str_replace("&THORN;", ("Þ"), $texte);
	$texte = str_replace("&szlig;", ("ß"), $texte);
	$texte = str_replace("&agrave;", ("à"), $texte);
	$texte = str_replace("&aacute;", ("á"), $texte);
	$texte = str_replace("&acirc;", ("â"), $texte);
	$texte = str_replace("&atilde;", ("ã"), $texte);
	$texte = str_replace("&auml;", ("ä"), $texte);
	$texte = str_replace("&aring;", ("å"), $texte);
	$texte = str_replace("&aelig;", ("æ"), $texte);
	$texte = str_replace("&ccedil;", ("ç"), $texte);
	$texte = str_replace("&egrave;", ("è"), $texte);
	$texte = str_replace("&eacute;", ("é"), $texte);
	$texte = str_replace("&ecirc;", ("ê"), $texte);
	$texte = str_replace("&euml;", ("ë"), $texte);
	$texte = str_replace("&igrave;", ("ì"), $texte);
	$texte = str_replace("&iacute;", ("í"), $texte);
	$texte = str_replace("&icirc;", ("î"), $texte);
	$texte = str_replace("&iuml;", ("ï"), $texte);
	$texte = str_replace("&eth;", ("ð"), $texte);
	$texte = str_replace("&ntilde;", ("ñ"), $texte);
	$texte = str_replace("&ograve;", ("ò"), $texte);
	$texte = str_replace("&oacute;", ("ó"), $texte);
	$texte = str_replace("&ocirc;", ("ô"), $texte);
	$texte = str_replace("&otilde;", ("õ"), $texte);
	$texte = str_replace("&ouml;", ("ö"), $texte);
	$texte = str_replace("&divide;", ("÷"), $texte);
	$texte = str_replace("&oslash;", ("ø"), $texte);
	$texte = str_replace("&ugrave;", ("ù"), $texte);
	$texte = str_replace("&uacute;", ("ú"), $texte);
	$texte = str_replace("&ucirc;", ("û"), $texte);
	$texte = str_replace("&uuml;", ("ü"), $texte);
	$texte = str_replace("&yacute;", ("ý"), $texte);
	$texte = str_replace("&thorn;", ("þ"), $texte);
	$texte = str_replace("&yuml;", ("ÿ"), $texte);
	$texte = str_replace("&prime;", ("'"), $texte);



	return (utf8_decode(($texte)));
}


function replace_texte_etat($str)
{



	$balise = array("<em>", "</em>", "<sup>", "</sup>", "<br />");

	if ($str == '')
		$str = ' ';

	$texte = str_replace($balise, " ", $str);

	$texte = str_replace("&#039;", ("'"), $texte);
	$texte = str_replace("&quot;", ("'"), $texte);
	$texte = str_replace("&amp;", ("&"), $texte);
	$texte = str_replace("&lt;", ("<"), $texte);
	$texte = str_replace("&gt;", (">"), $texte);
	$texte = str_replace("&nbsp;", (" "), $texte);
	$texte = str_replace("&iexcl;", ("¡"), $texte);
	$texte = str_replace("&cent;", ("¢"), $texte);
	$texte = str_replace("&pound;", ("£"), $texte);
	$texte = str_replace("&curren;", ("¤"), $texte);
	$texte = str_replace("&yen;", ("¥"), $texte);
	$texte = str_replace("&brvbar;", ("¦"), $texte);
	$texte = str_replace("&sect;", ("§"), $texte);
	$texte = str_replace("&uml;", ("¨"), $texte);
	$texte = str_replace("&copy;", ("©"), $texte);
	$texte = str_replace("&ordf;", ("ª"), $texte);
	$texte = str_replace("&laquo;", ("«"), $texte);
	$texte = str_replace("&not;", ("¬"), $texte);
	$texte = str_replace("&shy;", ("­"), $texte);
	$texte = str_replace("&reg;", ("®"), $texte);
	$texte = str_replace("&macr;", ("¯"), $texte);
	$texte = str_replace("&deg;", ("°"), $texte);
	$texte = str_replace("&plusmn;", ("±"), $texte);
	$texte = str_replace("&sup2;", ("²"), $texte);
	$texte = str_replace("&sup3;", ("³"), $texte);
	$texte = str_replace("&acute;", ("´"), $texte);
	$texte = str_replace("&micro;", ("µ"), $texte);
	$texte = str_replace("&para;", ("¶"), $texte);
	$texte = str_replace("&middot;", ("·"), $texte);
	$texte = str_replace("&cedil;", ("¸"), $texte);
	$texte = str_replace("&sup1;", ("¹"), $texte);
	$texte = str_replace("&ordm;", ("º"), $texte);
	$texte = str_replace("&raquo;", ("»"), $texte);
	$texte = str_replace("&frac14;", ("¼"), $texte);
	$texte = str_replace("&frac12;", ("½"), $texte);
	$texte = str_replace("&frac34;", ("¾"), $texte);
	$texte = str_replace("&iquest;", ("¿"), $texte);
	$texte = str_replace("&Agrave;", ("À"), $texte);
	$texte = str_replace("&Aacute;", ("Á"), $texte);
	$texte = str_replace("&Acirc;", ("Â"), $texte);
	$texte = str_replace("&Atilde;", ("Ã"), $texte);
	$texte = str_replace("&Auml;", ("Ä"), $texte);
	$texte = str_replace("&Aring;", ("Å"), $texte);
	$texte = str_replace("&AElig;", ("Æ"), $texte);
	$texte = str_replace("&Ccedil;", ("Ç"), $texte);
	$texte = str_replace("&Egrave;", ("È"), $texte);
	$texte = str_replace("&Eacute;", ("É"), $texte);
	$texte = str_replace("&Ecirc;", ("Ê"), $texte);
	$texte = str_replace("&Euml;", ("Ë"), $texte);
	$texte = str_replace("&Igrave;", ("Ì"), $texte);
	$texte = str_replace("&Iacute;", ("Í"), $texte);
	$texte = str_replace("&Icirc;", ("Î"), $texte);
	$texte = str_replace("&Iuml;", ("Ï"), $texte);
	$texte = str_replace("&ETH;", ("Ð"), $texte);
	$texte = str_replace("&Ntilde;", ("Ñ"), $texte);
	$texte = str_replace("&Ograve;", ("Ò"), $texte);
	$texte = str_replace("&Oacute;", ("Ó"), $texte);
	$texte = str_replace("&Ocirc;", ("Ô"), $texte);
	$texte = str_replace("&Otilde;", ("Õ"), $texte);
	$texte = str_replace("&Ouml;", ("Ö"), $texte);
	$texte = str_replace("&times;", ("×"), $texte);
	$texte = str_replace("&Oslash;", ("Ø"), $texte);
	$texte = str_replace("&Ugrave;", ("Ù"), $texte);
	$texte = str_replace("&Uacute;", ("Ú"), $texte);
	$texte = str_replace("&Ucirc;", ("Û"), $texte);
	$texte = str_replace("&Uuml;", ("Ü"), $texte);
	$texte = str_replace("&Yacute;", ("Ý"), $texte);
	$texte = str_replace("&THORN;", ("Þ"), $texte);
	$texte = str_replace("&szlig;", ("ß"), $texte);
	$texte = str_replace("&agrave;", ("à"), $texte);
	$texte = str_replace("&aacute;", ("á"), $texte);
	$texte = str_replace("&acirc;", ("â"), $texte);
	$texte = str_replace("&atilde;", ("ã"), $texte);
	$texte = str_replace("&auml;", ("ä"), $texte);
	$texte = str_replace("&aring;", ("å"), $texte);
	$texte = str_replace("&aelig;", ("æ"), $texte);
	$texte = str_replace("&ccedil;", ("ç"), $texte);
	$texte = str_replace("&egrave;", ("è"), $texte);
	$texte = str_replace("&eacute;", ("é"), $texte);
	$texte = str_replace("&ecirc;", ("ê"), $texte);
	$texte = str_replace("&euml;", ("ë"), $texte);
	$texte = str_replace("&igrave;", ("ì"), $texte);
	$texte = str_replace("&iacute;", ("í"), $texte);
	$texte = str_replace("&icirc;", ("î"), $texte);
	$texte = str_replace("&iuml;", ("ï"), $texte);
	$texte = str_replace("&eth;", ("ð"), $texte);
	$texte = str_replace("&ntilde;", ("ñ"), $texte);
	$texte = str_replace("&ograve;", ("ò"), $texte);
	$texte = str_replace("&oacute;", ("ó"), $texte);
	$texte = str_replace("&ocirc;", ("ô"), $texte);
	$texte = str_replace("&otilde;", ("õ"), $texte);
	$texte = str_replace("&ouml;", ("ö"), $texte);
	$texte = str_replace("&divide;", ("÷"), $texte);
	$texte = str_replace("&oslash;", ("ø"), $texte);
	$texte = str_replace("&ugrave;", ("ù"), $texte);
	$texte = str_replace("&uacute;", ("ú"), $texte);
	$texte = str_replace("&ucirc;", ("û"), $texte);
	$texte = str_replace("&uuml;", ("ü"), $texte);
	$texte = str_replace("&yacute;", ("ý"), $texte);
	$texte = str_replace("&thorn;", ("þ"), $texte);
	$texte = str_replace("&yuml;", ("ÿ"), $texte);
	$texte = str_replace("&prime;", ("'"), $texte);



	return  $texte;
}

function replace_texte_speciaux2($str)
{

	$texte = str_replace("'", "%", $str);

	$texte = str_replace("*", "%", $texte);

	$texte = htmlentities($texte);

	return $texte;
}

function replace_texte_speciaux_excel($str)
{
	$texte = str_replace("&prime;", "'", $str);

	$texte = html_entity_decode(($texte));

	return $texte;
}


/**
 * ! tsy mahazo kitiana intsony
 */
function replace_texte_speciaux($str)
{

	$balise = array("<em>", "</em>", "<sup>", "</sup>", "<br />");

	if ($str == '')
		$str = ' ';

	$texte = str_replace($balise, " ", $str);

	$texte = str_replace("’", "&prime;", $texte);
	$texte = str_replace("'", "&prime;", $texte);
	$texte = str_replace("<", "&lt;", $texte);
	$texte = str_replace(">", "&gt;", $texte);
	$texte = str_replace(" ", "&nbsp;", $texte);
	$texte = str_replace("¡", "&iexcl;", $texte);
	$texte = str_replace("¢", "&cent;", $texte);
	$texte = str_replace("£", "&pound;", $texte);
	$texte = str_replace("¤", "&curren;", $texte);
	$texte = str_replace("¥", "&yen;", $texte);
	$texte = str_replace("¦", "&brvbar;", $texte);
	$texte = str_replace("§", "&sect;", $texte);
	$texte = str_replace("¨", "&uml;", $texte);
	$texte = str_replace("©", "&copy;", $texte);
	$texte = str_replace("ª", "&ordf;", $texte);
	$texte = str_replace("«", "&laquo;", $texte);
	$texte = str_replace("¬", "&not;", $texte);
	$texte = str_replace("­", "&shy;", $texte);
	$texte = str_replace("®", "&reg;", $texte);
	$texte = str_replace("¯", "&macr;", $texte);
	$texte = str_replace("°", "&deg;", $texte);
	$texte = str_replace("±", "&plusmn;", $texte);
	$texte = str_replace("²", "&sup2;", $texte);
	$texte = str_replace("³", "&sup3;", $texte);
	$texte = str_replace("´", "&acute;", $texte);
	$texte = str_replace("µ", "&micro;", $texte);
	$texte = str_replace("¶", "&para;", $texte);
	$texte = str_replace("·", "&middot;", $texte);
	$texte = str_replace("¸", "&cedil;", $texte);
	$texte = str_replace("¹", "&sup1;", $texte);
	$texte = str_replace("º", "&ordm;", $texte);
	$texte = str_replace("»", "&raquo;", $texte);
	$texte = str_replace("¼", "&frac14;", $texte);
	$texte = str_replace("½", "&frac12;", $texte);
	$texte = str_replace("¾", "&frac34;", $texte);
	$texte = str_replace("¿", "&iquest;", $texte);
	$texte = str_replace("À", "&Agrave;", $texte);
	$texte = str_replace("Á", "&Aacute;", $texte);
	$texte = str_replace("Â", "&Acirc;", $texte);
	$texte = str_replace("Ã", "&Atilde;", $texte);
	$texte = str_replace("Ä", "&Auml;", $texte);
	$texte = str_replace("Å", "&Aring;", $texte);
	$texte = str_replace("Æ", "&AElig;", $texte);
	$texte = str_replace("Ç", "&Ccedil;", $texte);
	$texte = str_replace("È", "&Egrave;", $texte);
	$texte = str_replace("É", "&Eacute;", $texte);
	$texte = str_replace("Ê", "&Ecirc;", $texte);
	$texte = str_replace("Ë", "&Euml;", $texte);
	$texte = str_replace("Ì", "&Igrave;", $texte);
	$texte = str_replace("Í", "&Iacute;", $texte);
	$texte = str_replace("Î", "&Icirc;", $texte);
	$texte = str_replace("Ï", "&Iuml;", $texte);
	$texte = str_replace("Ð", "&ETH;", $texte);
	$texte = str_replace("Ñ", "&Ntilde;", $texte);
	$texte = str_replace("Ò", "&Ograve;", $texte);
	$texte = str_replace("Ó", "&Oacute;", $texte);
	$texte = str_replace("Ô", "&Ocirc;", $texte);
	$texte = str_replace("Õ", "&Otilde;", $texte);
	$texte = str_replace("Ö", "&Ouml;", $texte);
	$texte = str_replace("×", "&times;", $texte);
	$texte = str_replace("Ø", "&Oslash;", $texte);
	$texte = str_replace("Ù", "&Ugrave;", $texte);
	$texte = str_replace("Ú", "&Uacute;", $texte);
	$texte = str_replace("Û", "&Ucirc;", $texte);
	$texte = str_replace("Ü", "&Uuml;", $texte);
	$texte = str_replace("Ý", "&Yacute;", $texte);
	$texte = str_replace("Þ", "&THORN;", $texte);
	$texte = str_replace("ß", "&szlig;", $texte);
	$texte = str_replace("à", "&agrave;", $texte);
	$texte = str_replace("á", "&aacute;", $texte);
	$texte = str_replace("â", "&acirc;", $texte);
	$texte = str_replace("ã", "&atilde;", $texte);
	$texte = str_replace("ä", "&auml;", $texte);
	$texte = str_replace("å", "&aring;", $texte);
	$texte = str_replace("æ", "&aelig;", $texte);
	$texte = str_replace("ç", "&ccedil;", $texte);
	$texte = str_replace("è", "&egrave;", $texte);
	$texte = str_replace("é", "&eacute;", $texte);
	$texte = str_replace("ê", "&ecirc;", $texte);
	$texte = str_replace("ë", "&euml;", $texte);
	$texte = str_replace("ì", "&igrave;", $texte);
	$texte = str_replace("í", "&iacute;", $texte);
	$texte = str_replace("î", "&icirc;", $texte);
	$texte = str_replace("ï", "&iuml;", $texte);
	$texte = str_replace("ð", "&eth;", $texte);
	$texte = str_replace("ñ", "&ntilde;", $texte);
	$texte = str_replace("ò", "&ograve;", $texte);
	$texte = str_replace("ó", "&oacute;", $texte);
	$texte = str_replace("ô", "&ocirc;", $texte);
	$texte = str_replace("õ", "&otilde;", $texte);
	$texte = str_replace("ö", "&ouml;", $texte);
	$texte = str_replace("÷", "&divide;", $texte);
	$texte = str_replace("ø", "&oslash;", $texte);
	$texte = str_replace("ù", "&ugrave;", $texte);
	$texte = str_replace("ú", "&uacute;", $texte);
	$texte = str_replace("û", "&ucirc;", $texte);
	$texte = str_replace("ü", "&uuml;", $texte);
	$texte = str_replace("ý", "&yacute;", $texte);
	$texte = str_replace("þ", "&thorn;", $texte);
	$texte = str_replace("ÿ", "&yuml;", $texte);
	$texte = str_replace("œ", "oe", $texte);

	return ($texte);
}


function replace_texte_speciaux_parpourcent($str)
{

	$balise = array("<em>", "</em>", "<sup>", "</sup>", "<br />");

	if ($str == '')
		$str = ' ';

	$texte = str_replace($balise, " ", $str);

	$texte = str_replace("’", "%", $texte);
	$texte = str_replace("'", "%", $texte);
	$texte = str_replace("<", "%", $texte);
	$texte = str_replace(">", "%", $texte);
	$texte = str_replace(" ", "%", $texte);
	$texte = str_replace("¡", "%", $texte);
	$texte = str_replace("¢", "%", $texte);
	$texte = str_replace("£", "%", $texte);
	$texte = str_replace("¤", "%", $texte);
	$texte = str_replace("¥", "%", $texte);
	$texte = str_replace("¦", "%", $texte);
	$texte = str_replace("§", "%", $texte);
	$texte = str_replace("¨", "%", $texte);
	$texte = str_replace("©", "%", $texte);
	$texte = str_replace("ª", "%", $texte);
	$texte = str_replace("«", "%", $texte);
	$texte = str_replace("¬", "%", $texte);
	$texte = str_replace("­", "%", $texte);
	$texte = str_replace("®", "%", $texte);
	$texte = str_replace("¯", "%", $texte);
	$texte = str_replace("°", "%", $texte);
	$texte = str_replace("±", "%", $texte);
	$texte = str_replace("²", "%", $texte);
	$texte = str_replace("³", "%", $texte);
	$texte = str_replace("´", "%", $texte);
	$texte = str_replace("µ", "%", $texte);
	$texte = str_replace("¶", "%", $texte);
	$texte = str_replace("·", "%", $texte);
	$texte = str_replace("¸", "%", $texte);
	$texte = str_replace("¹", "%", $texte);
	$texte = str_replace("º", "%", $texte);
	$texte = str_replace("»", "%", $texte);
	$texte = str_replace("¼", "%", $texte);
	$texte = str_replace("½", "%", $texte);
	$texte = str_replace("¾", "%", $texte);
	$texte = str_replace("¿", "%", $texte);
	$texte = str_replace("À", "%", $texte);
	$texte = str_replace("Á", "%", $texte);
	$texte = str_replace("Â", "%", $texte);
	$texte = str_replace("Ã", "%", $texte);
	$texte = str_replace("Ä", "%", $texte);
	$texte = str_replace("Å", "%", $texte);
	$texte = str_replace("Æ", "%", $texte);
	$texte = str_replace("Ç", "%", $texte);
	$texte = str_replace("È", "%", $texte);
	$texte = str_replace("É", "%", $texte);
	$texte = str_replace("Ê", "%", $texte);
	$texte = str_replace("Ë", "%", $texte);
	$texte = str_replace("Ì", "%", $texte);
	$texte = str_replace("Í", "%", $texte);
	$texte = str_replace("Î", "%", $texte);
	$texte = str_replace("Ï", "%", $texte);
	$texte = str_replace("Ð", "%", $texte);
	$texte = str_replace("Ñ", "%", $texte);
	$texte = str_replace("Ò", "%", $texte);
	$texte = str_replace("Ó", "%", $texte);
	$texte = str_replace("Ô", "%", $texte);
	$texte = str_replace("Õ", "%", $texte);
	$texte = str_replace("Ö", "%", $texte);
	$texte = str_replace("×", "%", $texte);
	$texte = str_replace("Ø", "%", $texte);
	$texte = str_replace("Ù", "%", $texte);
	$texte = str_replace("Ú", "%", $texte);
	$texte = str_replace("Û", "%", $texte);
	$texte = str_replace("Ü", "%", $texte);
	$texte = str_replace("Ý", "%", $texte);
	$texte = str_replace("Þ", "%", $texte);
	$texte = str_replace("ß", "%", $texte);
	$texte = str_replace("à", "%", $texte);
	$texte = str_replace("á", "%", $texte);
	$texte = str_replace("â", "%", $texte);
	$texte = str_replace("ã", "%", $texte);
	$texte = str_replace("ä", "%", $texte);
	$texte = str_replace("å", "%", $texte);
	$texte = str_replace("æ", "%", $texte);
	$texte = str_replace("ç", "%", $texte);
	$texte = str_replace("è", "%", $texte);
	$texte = str_replace("é", "%", $texte);
	$texte = str_replace("ê", "%", $texte);
	$texte = str_replace("ë", "%", $texte);
	$texte = str_replace("ì", "%", $texte);
	$texte = str_replace("í", "%", $texte);
	$texte = str_replace("î", "%", $texte);
	$texte = str_replace("ï", "%", $texte);
	$texte = str_replace("ð", "%", $texte);
	$texte = str_replace("ñ", "%", $texte);
	$texte = str_replace("ò", "%", $texte);
	$texte = str_replace("ó", "%", $texte);
	$texte = str_replace("ô", "%", $texte);
	$texte = str_replace("õ", "%", $texte);
	$texte = str_replace("ö", "%", $texte);
	$texte = str_replace("÷", "%", $texte);
	$texte = str_replace("ø", "%", $texte);
	$texte = str_replace("ù", "%", $texte);
	$texte = str_replace("ú", "%", $texte);
	$texte = str_replace("û", "%", $texte);
	$texte = str_replace("ü", "%", $texte);
	$texte = str_replace("ý", "%", $texte);
	$texte = str_replace("þ", "%", $texte);
	$texte = str_replace("ÿ", "%", $texte);
	$texte = str_replace("œ", "%", $texte);

	return ($texte);
}


function remplacerCaracteresSpeciaux($chaine)
{
	$caracteresSpeciaux = array(
		'À' => '&Agrave;', 'Á' => '&Aacute;', 'Â' => '&Acirc;', 'Ã' => '&Atilde;', 'Ä' => '&Auml;',
		'Å' => '&Aring;', 'Æ' => '&AElig;', 'Ç' => '&Ccedil;', 'È' => '&Egrave;', 'É' => '&Eacute;',
		'Ê' => '&Ecirc;', 'Ë' => '&Euml;', 'Ì' => '&Igrave;', 'Í' => '&Iacute;', 'Î' => '&Icirc;',
		'Ï' => '&Iuml;', 'Ð' => '&ETH;', 'Ñ' => '&Ntilde;', 'Ò' => '&Ograve;', 'Ó' => '&Oacute;',
		'Ô' => '&Ocirc;', 'Õ' => '&Otilde;', 'Ö' => '&Ouml;', 'Ø' => '&Oslash;', 'Ù' => '&Ugrave;',
		'Ú' => '&Uacute;', 'Û' => '&Ucirc;', 'Ü' => '&Uuml;', 'Ý' => '&Yacute;', 'Þ' => '&THORN;',
		'ß' => '&szlig;', 'à' => '&agrave;', 'á' => '&aacute;', 'â' => '&acirc;', 'ã' => '&atilde;',
		'ä' => '&auml;', 'å' => '&aring;', 'æ' => '&aelig;', 'ç' => '&ccedil;', 'è' => '&egrave;',
		'é' => '&eacute;', 'ê' => '&ecirc;', 'ë' => '&euml;', 'ì' => '&igrave;', 'í' => '&iacute;',
		'î' => '&icirc;', 'ï' => '&iuml;', 'ð' => '&eth;', 'ñ' => '&ntilde;', 'ò' => '&ograve;',
		'ó' => '&oacute;', 'ô' => '&ocirc;', 'õ' => '&otilde;', 'ö' => '&ouml;', 'ø' => '&oslash;',
		'ù' => '&ugrave;', 'ú' => '&uacute;', 'û' => '&ucirc;', 'ü' => '&uuml;', 'ý' => '&yacute;',
		'þ' => '&thorn;', 'ÿ' => '&yuml;',
	);

	$chaine = strtr($chaine, $caracteresSpeciaux);

	return $chaine;
}

function uploadFichierPhoto($source, $classImg, $type_return)
{
	// Vérifier si le fichier a été correctement envoyé
	if ($source["tmp_name"] != "") {
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($source["name"], PATHINFO_EXTENSION));

		// Liste des extensions d'image autorisées
		$allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');

		// Tester l'extension du fichier
		if (!in_array($imageFileType, $allowedExtensions)) {
			$msg = _gettext("fichier.non.valide") . $imageFileType . " <> " . implode(', ', $allowedExtensions);
			$uploadOk = 0;
		}

		// Vérifier la taille du fichier mediumblob 16Mo
		if ($source["size"] > 16000 * 1000) {
			$msg = "Taille de fichier trop grande " . $source["size"] / 1000 . " Ko > " . 16000 * 1000 .  " ko ";
			$uploadOk = 0;
		}

		if ($uploadOk) {
			$target_file = RP_IMPORT . dateTimestamp() . "." . $imageFileType;

			$tabFile = explode("/", $target_file);
			foreach ($tabFile as $key => $value) {
				$file = $value;
			}

			// Déplacer le fichier téléchargé vers l'emplacement cible
			if (move_uploaded_file($source["tmp_name"], $target_file)) {

				if ($type_return == 1) {
					return $file;
				} else {
					return '<img class=" w-100 ' . $classImg . '"  src="data:image/' . $imageFileType . ';base64,' . base64_encode(file_get_contents($target_file)) . '" />';
				}
			}
		} else {
			// Retourner le message d'erreur s'il y a eu des problèmes lors du téléchargement
			return $msg;
		}
	} else {
		// Aucun fichier n'a été sélectionné
		return "";
	}
}


function uploadFichier($source)
{
	// Vérifier si un fichier a été sélectionné
	if ($source["tmp_name"] != "") {

		$uploadOk = 1;
		$allowedExtensions = array('pdf', 'doc', 'docx', 'xls', 'xlsx', 'txt');
		$fileExtension = strtolower(pathinfo($source["name"], PATHINFO_EXTENSION));

		// Vérifier l'extension du fichier
		if (!in_array($fileExtension, $allowedExtensions)) {
			$msg = _gettext("fichier.non.valide") . $fileExtension . " <> " . implode(', ', $allowedExtensions);
			$uploadOk = 0;
		}

		// Si l'extension est valide, procéder à l'upload
		if ($uploadOk) {
			$target_file = RP_PJ . "" . dateTimestamp() . "." . $fileExtension;

			// Utiliser move_uploaded_file pour déplacer le fichier
			if (move_uploaded_file($source["tmp_name"], $target_file)) {
				// Retourner le nom du fichier après l'upload
				return "" . dateTimestamp() . "." . $fileExtension;
			} else {
				// En cas d'échec de l'upload
				return "erreur upload serveur";
			}
		} else {
			// En cas d'extension de fichier invalide
			return $msg;
		}
	} else {
		// Si aucun fichier n'a été sélectionné
		return "";
	}
}


function urldecodeGet($url_decode)
{
	$decoded_query_string = urldecode($url_decode);
	$_GET = [];

	// Parse the decoded query string into an associative array
	parse_str($decoded_query_string, $_GET);

	return $_GET;
}

function loadRessource($langue)
{
	global $_TEXT;

	// Prise en compte du répertoire de localisation ($_SESSION[RESS_DIR])
	$ressource_dir = RP_RESSOURCES . $langue . '/langue.res';
	if (file_exists($ressource_dir)) {
		$content = file($ressource_dir);
		$nb = count($content);
		for ($i = 0; $i < $nb; $i++) {
			$pos = strrpos("#", $content[$i]);
			if (strlen(trim($content[$i])) > 0) {
				if ($pos === false) {
					// SRR - Ajout test sur = pour supprimer les erreurs dans le fichier log - 27/10/2006
					$pos = strrpos($content[$i], "=");
					if ($pos === false) null;
					else {
						$tab = explode("=", $content[$i]);
						if (isset($tab[1]))
							$_TEXT[trim($tab[0])] = trim($tab[1]);
						else
							$_TEXT[trim($tab[0])] = "";
					}
				}
			}
		}
	} else {
		die(" Le fichier $ressource_dir est introuvable !");
	}
}


/**
 * Initialisation de la session
 * @access	public
 */
function _getText($key, $encode = 0)
{
	global $_TEXT;
	if (isset($_TEXT[$key])) {
		return  htmlentities($_TEXT[$key]);
	}
	return "[" . ($encode == 0 ? ($key) : ($key))  . "]";
}
