<?php
$tab_php_self = explode("/", $_SERVER['PHP_SELF']);

require_once($_SERVER["DOCUMENT_ROOT"] . "/" .  $tab_php_self[1] . "/" . "config.inc.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/" .  $tab_php_self[1] . "/" . "session.php");

require_once(RP_MODELS . "utilisateur.class.php");

$u = new utilisateur();

$critere['user_code'] = $_SESSION["user_code"];
$tabUser = $u->lireParCritere($critere);

unset($tabUser["cnt"]);

$user_question = "";
$user_reponse = "";

foreach ($tabUser as $key => $value) {
    $user_question = $value["user_question"];
    $user_reponse = $value["user_reponse"];
}


loadRessource("fr");



?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">
        <?php echo _getText("modification_pwd")  ?>
    </h4>
</div>

<div class="modal-body">
    <form class="" data-toggle="validator" method="post" id="form" action="<?php echo HTTP_EXEC_ADMIN ?>fromchangementmdpExec.php">
        <fieldset>
            <legend><?= _getText("mot.de.passe.oublie") ?></legend>
            <div class="form-group row">
                <label for="user_question" class="control-label col-sm-2">
                    <?php echo _getText('question.secret')  ?></label>

                <div class="col-sm-10">
                    <input required type="text" class="form-control" name="user_question" id="user_question" placeholder="<?php echo _getText('question')  ?>" value="<?= $user_question ?>">

                </div>
            </div>
            <div class="form-group row">
                <label for="user_reponse" class="control-label col-sm-2">
                    <?php echo _getText('reponse')  ?></label>

                <div class="col-sm-10">
                    <input required type="text" class="form-control" name="user_reponse" id="user_reponse" placeholder="<?php echo _getText('reponse')  ?>" value="<?= $user_reponse ?>">

                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend><?= _getText("mot.de.passe")  ?></legend>


            <input type="hidden" name="user_code" value="<?php echo $_SESSION['user_code'] ?>" />

            <div class="form-group row">
                <label for="user_pwd" class="control-label col-sm-2">
                    <?php echo _getText('ancien_pwd')  ?></label>

                <div class="col-sm-10">
                    <input required type="password" class="form-control" name="user_pwd" id="user_pwd" placeholder="<?php echo _getText('ancien_pwd')  ?>" value="">

                </div>
            </div>

            <div class="form-group row">
                <label for="user_pwd_new" class="control-label col-sm-2">
                    <?php echo _getText('nouveau_pwd')  ?></label>

                <div class="col-sm-10">
                    <input required type="password" class="form-control" name="user_pwd_new" id="user_pwd_new" placeholder="<?php echo _getText('nouveau_pwd')  ?>" value="">

                </div>
            </div>

            <div class="form-group row">
                <label for="user_pwd_confirm" class="control-label col-sm-2">
                    <?php echo _getText('confirmation')  ?></label>

                <div class="col-sm-10">
                    <input required type="password" class="form-control" name="user_pwd_confirm" id="user_pwd_confirm" placeholder="<?php echo _getText('confirmation')  ?>" value="">

                </div>
            </div>


        </fieldset>


        <div class="form-group row ">
            <center><button type="submit" class="btn btn-success">
                    <?php echo _getText("btnValider")  ?></button></center>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {


    });
</script>