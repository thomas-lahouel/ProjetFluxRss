<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulaire de connection</title>
        <link type="text/css" href="Views/Connection.css" rel="stylesheet" media="all"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body id="formConn">
    <div class="card text-center"   style="width: 18rem;">
        <div class="card-body" id="colform">
            <nav class="navbar navbar-dark bg-dark" id="maNav">
                <a class="navbar-brand" href="?action=afficherPage">Retour à la page d'acceuil</a>
            </nav>
            <h5 class="card-title">Connection administrateur</h5>
            <form method="post" action="?action=sauthentifier">
                <div class="form-group">
                    <label for="exampleInputEmail1">Pseudo</label>
                    <input name="txtPseudo" type="text" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mot de passe</label>
                    <input name="txtPassword"  type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </div>
    </div>
    </body>
</html>
