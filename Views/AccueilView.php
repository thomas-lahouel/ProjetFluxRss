<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-dark bg-dark" id="maNav">
    <!--action null-->
    <a class="navbar-brand" href="?action=">Site de news</a>
    <a href="?action=afficherForm">
        <button class="btn btn-outline-success my-2 my-sm-0">Se connecter</button>
    </a>
</nav>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Les news</h1>
        <a href="?action=rafraichir">
            <button class="btn btn-outline-success my-2 my-sm-0">Rafraichir les News</button>
        </a>
        <ul class="list-group">
            <?php
            if (!empty($tabNews)){ //$tabNews vient du controleur
                foreach ($tabNews as $n){
                    echo "<a href='".$n->getUrl()."'><li class='list-group-item'>". $n->getDate(). "<br> " .$n->getTitre()."</li></a><br>";
                }
            }
            else{
                echo "Il n'y a aucune news à afficher";
            }
            ?>
        </ul>
    </div>
    <ul class="pagination justify-content-end">
        <?php
        if(isset($page)) {
            if ($page != 1) { ?>
                <li class="page-item"><a class="page-link" href="?action=&page=<?php echo $page - 1; ?>">Precedent</a></li>
                <?php
            }
            if (isset($nbPage)) {
                for ($i = 1; $i <= $nbPage; $i++): ?>
                    <li class="page-item"><a class="page-link" href="?action=&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php
                endfor;
            }
            if ($page != $nbPage) { ?>
                <li class="page-item"><a class="page-link" href="?action=&page=<?php echo $page + 1; ?>">Suivant</a></li>
                <?php
            }
        }
        ?>
    </ul>
</div>
</body>
</html>


