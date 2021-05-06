<?php require_once("./conf/global.php"); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Bibliothèque</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/select2.min.js"></script>
    <script src="./js/common.js"></script>
    <script src="./js/home.js"></script>
    <link href="./css/bootstrap.min.css" rel="stylesheet"/>
    <link href="./css/select2.min.css" rel="stylesheet"/>
    <link href="./css/select2-bootstrap4.min.css" rel="stylesheet"/>
    <link href="./css/home.css" rel="stylesheet"/>
</head>
<body>
<?php require_once("./fragments/navbar.php"); ?>
<main class="container">
    <div class="alert alert-dismissible">
        <span></span>
        <button onclick="close_alert('.alert')" type="button" class="btn-close"></button>
    </div>
    <section>
        <div>
            <h1 class="my-4">Prêter un ouvrage</h1>
            <label for="client-pret" class="mb-1">Nom/prénom du client : </label>
            <div class="mb-3">
                <select
                        class="client-pret-input form-control"
                        name="client-pret"
                        id="client-pret"></select>
            </div>
            <label for="ouvrage-pret" class="mb-1">Titre/éditeur/auteur de l'ouvrage : </label>
            <div class="mb-3">
                <select
                        class="ouvrage-pret-input form-control"
                        name="ouvrage-pret"
                        id="ouvrage-pret"></select>
            </div>
            <button id="ajouter-pret" class="btn btn-lg btn-primary">Enregistrer</button>
        </div>
        <div>
            <h1 class="my-4">Récupérer un ouvrage</h1>
            <label for="client-rendu" class="mb-1">Nom/prénom du client : </label>
            <div class="mb-3">
                <select
                        class="client-rendu-input form-control"
                        name="client-rendu"
                        id="client-rendu"></select>
            </div>
            <label for="ouvrage-rendu" class="mb-1">Titre/éditeur/auteur de l'ouvrage : </label>
            <div class="mb-3">
                <select
                        class="ouvrage-rendu-input form-control"
                        name="ouvrage-rendu"
                        id="ouvrage-rendu"></select>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Prénom</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Date de Prêt</th>
                        <th scope="col">Rendre</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <?php require_once("./fragments/footer.php") ?>
</main>
</body>
</html>