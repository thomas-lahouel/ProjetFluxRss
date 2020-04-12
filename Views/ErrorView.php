<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Page erreur</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Erreur!</h1>
            <div class="alert alert-danger" role="alert">
                <?php
                if(isset($tabErreur)){
                    foreach ($tabErreur as $value) {
                        echo $value;
                    }
                }
                ?>
            </div>
        </div>
    </div>
    </body>
</html>
