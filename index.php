<?php


$tab_php_self = explode("/", $_SERVER['PHP_SELF']);

require_once($_SERVER["DOCUMENT_ROOT"] . "/" .  $tab_php_self[1] . "/" . "config.inc.php");
require_once(RP_MODELS . "utilisateur.class.php");


if (isset($_GET['langue']))
    $langue = $_GET['langue'];
else
    $langue = "fr";

loadRessource($langue);
// 
?>


<html lang="fr">

<head>
    <link rel="stylesheet" href="<?php echo HTTP_PAGE ?>css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo HTTP_PAGE ?>css/bootstrap-theme.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo HTTP_PAGE ?>css/style.css" crossorigin="anonymous">

    <style>
        @charset "utf-8";

        #demotext {
            color: blue;
            background: #FFFFFF;
            text-shadow: 1px 3px 0 #969696, 1px 13px 5px #aba8a8;
            color: #FFFFFF;
            background: #FFFFFF;
            font-size: 50px;
            font-weight: bold;
            opacity: 100%;

        }

        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box
        }

        .limiter {
            width: 100%;
            margin: 0 auto
        }

        .container-login100 {
            width: 100%;
            min-height: 100vh;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            padding: 15px;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            z-index: 1
        }

        .container-login100::before {
            content: "";
            display: block;
            position: absolute;
            z-index: -1;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.80)
        }

        .login_topimg {
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            width: 100%;
            min-height: 185px;
            position: relative;
            background-color: #fff;
            background-size: 200px;
            background-position: center;
            padding-top: 20px;
        }

        .login_topimg img {
            width: 100%;
            height: auto
        }

        .login_topimg .logo_wrap {
            border-radius: 5px;
            background: #fff;
            padding: 13px 55px;
            position: relative;
            top: -21px;
            margin: 10px auto;
            max-width: 255px
        }

        #login .wrap-login100 {
            background-color: #fff;
            padding: 20px 45px;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
            width: 100%
        }

        .login100-form {
            width: 100%;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap
        }

        .login100-form-title {
            font-size: 25px;
            color: #243762;
            line-height: 1.2;
            text-transform: uppercase;
            text-align: center;
            width: 100%;
            display: block
        }

        .login100-form-subtitle {
            font-size: 16px;
            color: #243762;
            line-height: 1.2;
            text-align: center;
            width: 100%;
            display: block
        }

        .wrap-input100 {
            position: relative;
            width: 100%;
            z-index: 1
        }

        #login input {
            outline: none;
            border: none
        }

        #login label {
            display: inline-block;
            margin-bottom: .5rem
        }

        .input-checkbox100 {
            display: none
        }

        input {
            outline: none;
            border: none
        }

        .wrap-input100 {
            position: relative;
            width: 100%;
            z-index: 1
        }

        .input100 {
            font-size: 15px;
            line-height: 1.2;
            color: #686868;
            display: block;
            width: 100%;
            background: #e6e6e6;
            height: 45px;
            border-radius: 3px;
            padding: 0 30px 0 55px
        }

        .focus-input100 {
            display: block;
            position: absolute;
            border-radius: 3px;
            bottom: 0;
            left: 0;
            z-index: -1;
            width: 100%;
            height: 100%;
            box-shadow: 0px 0px 0px 0px;
            color: rgba(211, 63, 141, 0.6)
        }

        .symbol-input100 {
            font-size: 15px;
            color: #999999;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            align-items: center;
            position: absolute;
            border-radius: 25px;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            padding-left: 23px;
            padding-bottom: 5px;
            pointer-events: none;
            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            -moz-transition: all 0.4s;
            transition: all 0.4s
        }

        ::-webkit-input-placeholder {
            opacity: 1;
            -webkit-transition: opacity .5s;
            transition: opacity .5s
        }

        :-moz-placeholder {
            opacity: 1;
            -moz-transition: opacity .5s;
            transition: opacity .5s
        }

        ::-moz-placeholder {
            opacity: 1;
            -moz-transition: opacity .5s;
            transition: opacity .5s
        }

        :-ms-input-placeholder {
            opacity: 1;
            -ms-transition: opacity .5s;
            transition: opacity .5s
        }

        ::placeholder {
            opacity: 1;
            transition: opacity .5s
        }

        *:focus::-webkit-input-placeholder {
            opacity: 0
        }

        *:focus:-moz-placeholder {
            opacity: 0
        }

        *:focus::-moz-placeholder {
            opacity: 0
        }

        *:focus:-ms-input-placeholder {
            opacity: 0
        }

        *:focus::placeholder {
            opacity: 0
        }

        .lnr {
            speak: none;
            font-style: normal;
            font-weight: 400;
            font-variant: normal;
            text-transform: none;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .flex-sb-m {
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            justify-content: space-between;
            -ms-align-items: center;
            align-items: center
        }

        .w-full {
            width: 100%
        }

        .p-b-30 {
            padding-bottom: 30px
        }

        .input-checkbox100:checked+.label-checkbox100::before {
            color: #09569B
        }

        .label-checkbox100::before {
            content: "\f00c";
            font-family: FontAwesome;
            font-size: 13px;
            color: transparent;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            width: 18px;
            height: 18px;
            border-radius: 2px;
            background: #fff;
            border: 1px solid #e6e6e6;
            left: 0;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            transform: translateY(-50%)
        }

        .label-checkbox100 {
            font-size: 14px;
            font-weight: normal;
            color: #999999;
            line-height: 1.2;
            display: block;
            position: relative;
            padding-left: 26px;
            cursor: pointer
        }

        .m-b-16 {
            margin-bottom: 16px
        }

        .p-b-55 {
            padding-bottom: 55px
        }

        .container-login100-form-btn {
            width: 100%;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;

        }





        .label-checkbox100::before {
            content: "\f00c";
            font-family: FontAwesome;
            font-size: 13px;
            color: transparent;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            width: 18px;
            height: 18px;
            border-radius: 3px;
            background: #fff;
            border: 2px solid #09569B;
            left: 0;
            top: 48%;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            transform: translateY(-50%)
        }

        #login button:hover {
            cursor: pointer
        }

        .login100-form-btn {
            font-size: 16px;
            line-height: 1.5;
            color: #fff;
            text-transform: uppercase;
            width: 100%;
            height: 45px;
            border-radius: 3px;
            background: #006633 !important;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 25px;
            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            -moz-transition: all 0.4s;
            transition: all 0.4s
        }

        .login100-form-btn:hover {
            background-color: #73c17c !important;
            
        }

        #login button {
            outline: none !important;
            border: none
        }

        @media (max-width: 768px) {
            .container {
                width: 750px
            }

            #login .wrap-login100 {
                padding: 27px
            }

            .login_topimg .logo_wrap {
                padding: 5px 55px
            }
        }

        .scrollable {
            font-weight: bold;
            max-height: 200px;
            /* Hauteur maximale de la liste */
            overflow: hidden;
            /* Masquer le débordement pour éviter les barres de défilement */
        }

        .paused {
            animation-play-state: paused !important;
            /* Mettre en pause l'animation du défilement */
        }
    </style>


    <title><?= _getText("titre_logiciel") ?></title>
</head>

<body>
    <div class="limiter" id="login">
        <div class="container-login100" style="background-color: #663333;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <fieldset style=" opacity: 70%;">
                            <center>
                                <div id="demotext"><?= _getText("titre_logiciel") ?></div>
                            </center>
                        </fieldset>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <div class="login_topimg">
                            <center>
                                <img src="<?= HTTP_IMG . "logo.jpg" ?>" style="width: 150px;">
                            </center>
                        </div>
                        <div class="wrap-login100">
                            <fieldset>
                                <form class="login100-form validate-form" method="POST" action="<?php echo HTTP_EXEC ?>login.php">
                                    <span class="login100-form-title "><?= _getText("connecte.vous") ?></span> <span class="login100-form-subtitle m-b-16"> <?= _getText("votre.compte") ?></span>
                                    <div class="wrap-input100 validate-input m-b-16" data-validate="Valid email is required: ex@abc.xyz">
                                        <input value="<?= $_GET["l"] ?? "" ?>" class="input100" type="text" id="user_login" name="user_login" placeholder="<?= _getText("login") ?>"> <span class="focus-input100"></span> <span class="symbol-input100"> <span class="glyphicon glyphicon-user"></span> </span>
                                    </div>
                                    <div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
                                        <input value="<?= $_GET["mdp"] ?? "" ?>" class="input100" type="password" name="user_pwd" placeholder="<?= _getText("mot.de.passe") ?>"> <span class="focus-input100"></span> <span class="symbol-input100"> <span class="glyphicon glyphicon-lock"></span> </span>
                                    </div>



                                    <?php
                                    if (isset($_GET["err"]) && $_GET["err"] == 1) {
                                    ?>

                                        <div class="alert alert-danger">
                                            <?php echo _getText("message.login") ?>
                                        </div>

                                    <?php } ?>

                                    <div class="container-login100-form-btn p-t-25">
                                        <button class="login100-form-btn"><?= _getText("btnValider") ?></button>
                                    </div>
                                    <hr />
                                </form>
                            </fieldset>
                            <?php
                            if (isset($_GET["err"]) && $_GET["err"] == 1) {



                                $u = new utilisateur();

                                $critere["user_login"] = $_GET["l"] ?? "niry";

                                if ($critere["user_login"] != "") {

                                    $tabU = $u->lireParCritere($critere);
                                    unset($tabU["cnt"]);

                                    $q = "";
                                    foreach ($tabU as $key => $value) {
                                        $q =  $value["user_question"]; ?>

                                        <fieldset>
                                            <legend><?= _getText("question.secret")  ?></legend>
                                            <form method="POST" action="<?php echo HTTP_EXEC ?>question.php">
                                                <label for="" class="col-sm-2"><?= _getText("question") ?></label>

                                                <input readonly type="text" name="user_question" id="user_question" class="form-control" value="<?= $q ?>" required="required" title="">
                                                <input type="hidden" name="user_login" value="<?= $_GET["l"] ?? "" ?>">

                                                <label for="user_reponse" class="col-sm-2"><?= _getText("reponse") ?></label>
                                                <input type="text" name="user_reponse" id="inputuser_reponse" class="form-control" value="" required="required" title="">
                                                <hr>
                                                <div class="container-login100-form-btn p-t-25">

                                                    <button style="width:100%;" class="btn btn-success"><?= _getText("btnValider") ?></button>
                                                </div>
                                                <?php
                                                if (isset($_GET["r"]) && $_GET["r"] == 1) {
                                                ?>

                                                    <div class="alert alert-danger">
                                                        <b><?php echo _getText("reponse.incorect") ?></b>
                                                    </div>

                                                <?php } ?>
                                            </form>
                                        </fieldset>
                                <?php }
                                }
                                ?>

                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script src="pages/js/jquery-3.3.1.min.js"></script>
<script src="pages/js/bootstrap.min.js"></script>


<script>
    $(document).ready(function() {
        var container = $('.scrollable');
        var contentHeight = container[0].scrollHeight;
        var containerHeight = container.height();
        var scrollDuration = 5000;
        var isPaused = false;

        function scrollContent() {
            if (!isPaused) {
                container.animate({
                    scrollTop: contentHeight - containerHeight
                }, scrollDuration, 'linear', function() {
                    container.animate({
                        scrollTop: 0
                    }, scrollDuration, 'linear', function() {
                        scrollContent();
                    });
                });
            }
        }

        container.mouseenter(function() {
            isPaused = true;
            container.addClass('paused');
        });

        container.mouseleave(function() {
            isPaused = false;
            container.removeClass('paused');
            scrollContent();
        });

        $('#toggleButton').click(function() {
            isPaused = !isPaused;
            container.toggleClass('paused');
            if (!isPaused) {
                scrollContent();
            }
        });

        scrollContent();
    });
</script>


<script>
    var button = document.getElementById("toggleButton");
    var icon = button.querySelector("span");

    button.addEventListener("click", function() {
        if (icon.classList.contains("glyphicon-play")) {
            icon.classList.remove("glyphicon-play");
            icon.classList.add("glyphicon-stop");
        } else {
            icon.classList.remove("glyphicon-stop");
            icon.classList.add("glyphicon-play");
        }
    });



    // Effacer tous les cookies
    function clearCookies() {
        var cookies = document.cookie.split(";");
        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i];
            var eqPos = cookie.indexOf("=");
            var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
            document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
        }
    }

    // Effacer les valeurs de saisie automatique
    function clearAutoFill() {
        var inputs = document.querySelectorAll("input[type='text'], input[type='password'], input[type='email'], input[type='tel'], input[type='number']");
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].value = "";
        }
    }

    // Appeler les fonctions pour effacer les cookies et la saisie automatique
    clearCookies();
    //clearAutoFill();

    // R&eacute;cup&eacute;rer l'&eacute;l&eacute;ment du formulaire
    var inputElement = document.getElementById("user_login");

    // D&eacute;sactiver la saisie automatique
    inputElement.setAttribute("autocomplete", "off");
</script>