<?php require_once("./conf/global.php"); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Bibliothèque</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/ouvrages.js"></script>
    <script src="./js/common.js"></script>
    <link href="./css/bootstrap.min.css" rel="stylesheet"/>
    <link href="./css/fontawesome.min.css" rel="stylesheet"/>
    <link href="./css/regular.css" rel="stylesheet"/>
    <link href="./css/ouvrages.css" rel="stylesheet"/>
</head>
<body>
<?php require_once("./fragments/navbar.php"); ?>
<main class="container">
    <div class="alert common-alert alert-dismissible">
        <span></span>
        <button onclick="close_alert('.alert')" type="button" class="btn-close"></button>
    </div>
    <?php
    if (isset($_SESSION['update-ouvrage'])) {
        $class = isset($_SESSION['update-ouvrage']['ok']) ? 'alert-success' : 'alert-danger';

        echo '<div class="alert php-alert alert-dismissible '.$class.'">
                    <span>'.($_SESSION['update-ouvrage']['ok'] ?: $_SESSION['update-ouvrage']['ko']).'</span>
                    <button onclick="close_alert(\'.php-alert\')" type="button" class="btn-close"></button>
                  </div>';

        echo '<script>$(".php-alert").show();</script>';

        unset($_SESSION['update-ouvrage']);
    }
    ?>
    <section>
        <h1>Liste des ouvrages</h1>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">CodeOuvrage</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Date de parution</th>
                    <th scope="col">Editeur</th>
                    <th scope="col">ISBN</th>
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