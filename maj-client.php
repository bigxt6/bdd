<?php
    require_once("./conf/global.php");

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $mysqli = new mysqli($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['pass'], $GLOBALS['schema']);
        $mysqli->set_charset("utf8");

        /*** SQL À INSÉRER ICI ***/
        /**
         * Implémentez la requête permettant de lire le client n° $_GET['id'].
         * Attention au format de la date de cotisation !
         */
        $query = "SELECT ...";

        $data = $mysqli->query($query);

        $fetchedData = true;
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Bibliothèque</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/common.js"></script>
    <link href="./css/bootstrap.min.css" rel="stylesheet"/>
    <link href="./css/maj.css" rel="stylesheet"/>
</head>
<body>
<?php require_once("./fragments/navbar.php"); ?>
<main class="container">
    <?php
        if (isset($_SESSION['update-client'])) {

            $class = isset($_SESSION['update-client']['ok']) ? 'alert-success' : 'alert-danger';

            echo '<div class="alert alert-dismissible '.$class.'">
                    <span></span>
                  </div>';

            unset($_SESSION['update-client']);
        }
    ?>
    <section>
        <h1>Mise à jour d'un client</h1>

        <?php
        if (isset($fetchedData) && $fetchedData) {
            $client = $data->fetch_array();
            ?>
            <span class="code-client">CodeClient : <?php echo $client['CodeClient']; ?></span>
            <form action="traitement/modifier-client.php?id=<?php echo $client['CodeClient']; ?>" method="post">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom : </label><input id="nom" name="nom" type="text" class="form-control" value="<?php echo $client['Nom'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prenom : </label><input id="prenom" name="prenom" type="text" class="form-control" value="<?php echo $client['Prenom'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="adresse" class="form-label">Adresse : </label><input id="adresse" name="adresse" type="text" class="form-control" value="<?php echo $client['Adresse'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="cp" class="form-label">Code postal : </label><input id="cp" name="cp" type="text" class="form-control" value="<?php echo $client['CP'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="ville" class="form-label">Ville : </label><input id="ville" name="ville" type="text" class="form-control" value="<?php echo $client['Ville'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="datecotis" class="form-label">Date de cotisation : </label><input id="datecotis" name="datecotis" type="text" class="form-control" value="<?php echo $client['DateCotisFormatee'] ?>" required>
                </div>
                <button type="submit" name="submit" class="btn btn-success mb-3">Mettre à jour</button>
            </form>
            <?php
        }
        ?>
    </section>
    <?php require_once("fragments/footer.php") ?>
</main>
</body>
</html>