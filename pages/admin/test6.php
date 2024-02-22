<?php

require_once("../header.php");

require_once(RP_MODELS . "article.class.php");

$article = new article();

$critere["art_code"] = 1;

$tabData = $article->lireParCritere($critere);

?>

<div id="overlay">
	<span class="loader"></span>
</div>
<script type="text/javascript">
	$(window).load(function() {
		// PAGE IS FULLY LOADED  
		// FADE OUT YOUR OVERLAYING DIV
		$('#overlay').fadeOut();
	});
</script>