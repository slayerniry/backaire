<?php 

phpinfo();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Exemple de défilement Bootstrap 3</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .scrollable {
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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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

            $('#startButton').click(function() {
                isPaused = false;
                container.removeClass('paused');
                scrollContent();
            });

            $('#stopButton').click(function() {
                isPaused = true;
                container.addClass('paused');
            });

            scrollContent();
        });
    </script>
</head>

<body>
    <div class="list-group scrollable">
        <a href="#" class="list-group-item">Réduction des pertes grâce à l'utilisation de la méthode FIFO.</a>
        <a href="#" class="list-group-item">Possibilité d'opter pour un paiement différé des approvisionnements ou des facturations</a>
        <a href="#" class="list-group-item">Possibilité d'archiver les approvisionnements ou les facturations afin d'alléger la charge de traitement des données.</a>
        <a href="#" class="list-group-item">Répartition des responsabilités et prévention des erreurs avec la gestion multi-utilisateur.</a>
        <a href="#" class="list-group-item">Prise de décision éclairée basée sur des statistiques et des graphiques en temps réel.</a>
        <a href="#" class="list-group-item">Ces fonctionnalités offrent une modernisation significative de la gestion de stock, améliorant l'efficacité opérationnelle et la gestion des ressources.</a>
    </div>

    <button id="startButton" class="btn btn-primary">Démarrer</button>
    <button id="stopButton" class="btn btn-danger">Arrêter</button>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>