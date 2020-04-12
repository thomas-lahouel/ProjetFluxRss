<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-dark bg-dark" id="maNav">
    <a class="navbar-brand" href="#">Page de l'admin</a>
    <!--Bouton de deconnection-->
    <a href="?action=sedeconnecter">
        <button class="btn btn-outline-success my-2 my-sm-0">Se deconnecter</button>
    </a>

</nav>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Liste des fluxs</h1>
        <ul class="list-group">
            <?php
            if (isset($tabFlux)){
                foreach ($tabFlux as $f){
                    echo "<a href='".$f->getUrl()."'><li class='list-group-item'>".$f->getUrl()."</li></a><br>";
                    echo "<a class=\"alert alert-danger\" href='?action=supprimerFlux&url=".$f->getUrl()."'><div>Supprimer</div></a><br>";
                }
            }
            else{
                echo "Aucun flux à lister !";
            }
            ?>
        </ul>
    </div>
    <div class="container">
        <h2>Ajouter un flux</h2>
        <form title="ajouter news" method="post" action="?action=ajouterFlux">
            <div class="form-group">
                <label for="exampleInputEmail1">URL</label>
                <input name="url" type="text" class="form-control" required >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <input name="description"  type="text" class="form-control" id="exampleInputPassword1" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">titre</label>
                <input name="titre"  type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nombre de News</label>
                <input name="nbNews" type="number" class="form-control" min="1" max="30" required>
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>
    <a href="?action=" class="badge badge-warning">Retour à l'acceuil</a>
</div>
</body>
</html>

