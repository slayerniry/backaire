<?php 


require_once("../../config.inc.php");
require_once("../../session.php");

require_once(RP_MODELS . "menu.class.php");
require_once(RP_MODELS . "article.class.php");

$menu = new menu();
$article = new article();

$critere = array();

$tabTmp = $menu->liretmp($critere);


for ($i=0; $i < $tabTmp["cnt"] ; $i++) { 


	$tabOld  = explode(" ",  $tabTmp[$i]["art_abrev"] ) ;



	foreach ($tabOld as $key => $value) {
		if(trim($value) != ""){

			$critereArticle["art_abrev"] = $value ;

			$tabArticle = $article->lireParCritere($critereArticle);

			if($tabArticle["cnt"]>0 ){

				for ($j=0; $j < $tabArticle["cnt"] ; $j++) { 
					$menu->modifierArt_code( $critereArticle["art_abrev"] , $tabArticle[$j]["art_code"] );
				}// fin for

			}//fin if


		}
	}

	
	

}//fin for


die("vita");

?>