<?php 
require_once("../../config.inc.php");
require_once("../../session.php");
loadRessource("fr") ;

$tab['utilisateur'] = array();

require_once(RP_MODELS . "utilisateur.class.php");
require_once(RP_MODELS . "profil.class.php");

$profil = new profil();
$utilisateur = new utilisateur();


if($_GET["code"]>0){
    $critereutilisateur["ann_code"] = $_SESSION["ann_code"];
    $critereutilisateur["eta_code"] = $_SESSION["eta_code"];
    $critereutilisateur["user_code"] = $_GET["code"];
    $tab['utilisateur'] = $utilisateur->lireParCritere($critereutilisateur);
}else{
    
   $tab['utilisateur'] = array();
}


$critereprofil["ann_code"] = $_SESSION["ann_code"];
$critereprofil["eta_code"] = $_SESSION["eta_code"];
$tab['profil'] = $profil->lireParCritere($critereprofil);

?>


<script src="<?php echo HTTP_PAGE ?>select2/dist/js/select2.min.js" type="text/javascript"></script>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">
        <?php echo _getText("utilisateur")  ?>
    </h4>
</div>

<div class="modal-body">
    <fieldset>
        <form class="" data-toggle="validator" method="post" id="form" action="<?php echo HTTP_EXEC_ADMIN ?>formutilisateurExec.php">

            <input type="hidden" name="user_code" value="<?php echo $_GET['code'] ?>" />


            <div class="form-group row">
                <label for="prf_code" class="control-label col-sm-2">
                    <?php echo _getText('profil')  ?></label>

                <div class="col-sm-10">
                    <select class="form-control" id="prf_code" name="prf_code" required style="width: 200px">
                        <option></option>
                        <?php for($i=0;$i<$tab['profil']['cnt'];$i++){

                            $selected = ( $tab['utilisateur'][0]['prf_code']  == $tab['profil'][$i]['prf_code'] ? "selected":"" );

                        ?>
                        <option <?= $selected ?> value="<?php echo $tab['profil'][$i]['prf_code']  ?>">
                            <?php echo $tab['profil'][$i]['prf_nom']  ?>
                        </option>
                        <?php } ?>
                    </select>

                </div>
            </div>
            <div class="form-group row">
                <label for="user_matricule" class="control-label col-sm-2">
                    <?php echo _getText('matricule')  ?></label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" name="user_matricule" id="user_matricule" placeholder="<?php echo _getText('matricule')  ?>" value="<?php echo $tab['utilisateur'][0]['user_matricule']  ?>">

                </div>
            </div>

            <div class="form-group row">
                <label for="user_nom" class="control-label col-sm-2">
                    <?php echo _getText('nom')  ?></label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" name="user_nom" id="user_nom" placeholder="<?php echo _getText('nom')  ?>" value="<?php echo $tab['utilisateur'][0]['user_nom']  ?>">

                </div>
            </div>

            <div class="form-group row">
                <label for="user_prenom" class="control-label col-sm-2">
                    <?php echo _getText('prenom')  ?></label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" name="user_prenom" id="user_prenom" placeholder="<?php echo _getText('prenom')  ?>" value="<?php echo $tab['utilisateur'][0]['user_prenom']  ?>">

                </div>
            </div>

            <div class="form-group row">
                <label for="user_login" class="control-label col-sm-2">
                    <?php echo _getText('login')  ?></label>

                <div class="col-sm-10">
                    <input required type="text" class="form-control" name="user_login" id="user_login" placeholder="<?php echo _getText('login')  ?>" value="<?php echo $tab['utilisateur'][0]['user_login']  ?>">

                </div>
            </div>


            <div class="form-group row ">
                <center><button type="submit" class="btn btn-success">
                        <?php echo _getText("btnValider")  ?></button></center>
            </div>

        </form>
    </fieldset>
</div>

<script>
    $(document).ready(function() {

        $('select').select2();

    });

</script>
