<?php 

require_once("../../config.inc.php");

loadRessource("fr") ;

?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">
        Recherche multi article
    </h4>
</div>

<div class="modal-body">
    <div class="row clearfix">
    	<div class="col-md-4">

    		<b>Nombre d'article(s) &agrave; rechercher :</b>
    		
    	</div>
    	<div class="col-md-2">

    		<input class="form-control" style="width:75px;text-align: right;" min="2" max="99" type="number" step="1" id="member" name="member" value="2">	
    	</div>	
    	<div class="col-md-2">
    		<a onclick="addFields()" style="width:200px" class="btn btn-info">Cr&eacute;er</a>
    	</div>
	</div>
	<div class="row clearfix">
        <hr>
    	<div class="col-md-12" id="container">
    	</div>
    </div>	
    <div class="row clearfix">
    	<div class="col-md-12" align="center" >
    		<hr>
    		<button onclick="valider()" style="width:200px" class="btn btn-success">OK</button>


    	</div>
    </div>		

</div>

<script type="text/javascript">

function valider() {

    var number = document.getElementById("member").value ;

    var art_abrev = "" ;

    for (i=0;i<number;i++){

        var test = document.getElementById("art_abrev|" + i ).value ;

        if(test.trim() !="" )
            art_abrev = art_abrev + document.getElementById("art_abrev|" + i ).value  + "," ;


    }

    
    $("#art_abrev").val(art_abrev);


    $('.modal').modal('hide');


}	

function addFields(){
    // Generate a dynamic number of inputs
    var number = document.getElementById("member").value;

    if(number > 99){

    	alert("Trop nombreux");

    	document.getElementById("member").value = 99 ;

    	exit;
    }

    // Get the element where the inputs will be added to
    var container = document.getElementById("container");
    // Remove every children it had before
    while (container.hasChildNodes()) {
        container.removeChild(container.lastChild);
    }
    for (i=0;i<number;i++){
        // Append a node with a random text

        if(i < 9){
        	container.appendChild(document.createTextNode(" Ref article 0" + (i+1) + " : " ));
        }else{
        	container.appendChild(document.createTextNode(" Ref article " + (i+1) + " : " ));
        }

        // Create an <input> element, set its type and name attributes
        var input = document.createElement("input");
        input.type = "text";
        input.id = "art_abrev|" + i;

        container.appendChild(input);
        // Append a line break 

        if(i % 2 != 0)
        	container.appendChild(document.createElement("br"));

        //container.appendChild(document.createElement("br"));
    }


}
	
</script>