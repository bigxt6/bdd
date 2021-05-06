<?php
    require_once("./conf/global.php");

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $mysqli = new mysqli($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['pass'], $GLOBALS['schema']);
        $mysqli->set_charset("utf8");

        /*** SQL À INSÉRER ICI ***/
        /**
         * Implémentez la requête permettant de lire l'ouvrage n° $_GET['id'].
         * Attention au format de la date de parution !
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
    <link href="./css/bootstrap.min.css" rel="stylesheet"/>
    <link href="./css/maj.css" rel="stylesheet"/>
</head>
<body>
<?php require_once("fragments/navbar.php"); ?>
<main class="container">
    <section>
        <h1>Mise à jour d'un ouvrage</h1>

        <?php
        if (isset($fetchedData) && $fetchedData) {
            $ouvrage = $data->fetch_array();
            ?>
            <span class="code-ouvrage">CodeOuvrage : <?php echo $ouvrage['CodeOuvra']; ?></span>
            <form action="traitement/modifier-ouvrage.php?id=<?php echo $ouvrage['CodeOuvra']; ?>" method="post">
                <div class="mb-3">
                    <label for="titre" class="form-label">Titre : </label><input id="titre" name="titre" type="text" class="form-control" value="<?php echo $ouvrage['Titre'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="auteur" class="form-label">Auteur : </label><input id="auteur" name="auteur" type="text" class="form-control" value="<?php echo $ouvrage['Auteur'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="dateparu" class="form-label">Date de parution : </label><input id="dateparu" name="dateparu" type="text" class="form-control" value="<?php echo $ouvrage['DateParuFormatee'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="editeur" class="form-label">Editeur : </label><input id="editeur" name="editeur" type="text" class="form-control" value="<?php echo $ouvrage['Editeur'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="isbn" class="form-label">ISBN : </label><input id="isbn" name="isbn" type="text" class="form-control" value="<?php echo $ouvrage['ISBN'] ?>" required>
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