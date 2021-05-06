<?php require_once("./conf/global.php"); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Bibliothèque</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/common.js"></script>
    <script src="./js/prets.js"></script>
    <link href="./css/bootstrap.min.css" rel="stylesheet"/>
    <link href="./css/prets.css" rel="stylesheet"/>
</head>
<body>
<?php require_once("./fragments/navbar.php"); ?>
<main class="container">
    <div class="alert alert-dismissible">
        <span></span>
        <button onclick="close_alert('.alert')" type="button" class="btn-close"></button>
    </div>
    <section>
        <h1>Liste des prêts</h1>

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Date d'emprunt</th>
                    <th scope="col">Date de retour</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </section>
    <?php require_once("./fragments/footer.php") ?>
</main>
</body>
</html>