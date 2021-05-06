<?php
require_once("../conf/global.php");

$mysqli = new mysqli($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['pass'], $GLOBALS['schema']);
$mysqli->set_charset("utf8");

if ($mysqli->connect_errno) {
    echo "Echec à la connexion : ".$mysqli->connect_error;
}

$output = [];

if (isset($_GET['minifiedList']) && $_GET['minifiedList']) {
    if (isset($_GET['query']) && !empty($_GET['query'])) {
        $first_letters = $_GET['query'];
    } else {
        echo "[]";
        exit();
    }

    /*** SQL À INSÉRER ICI ***/
    /**
     * Implémentez la requête permettant de lire le CodeOuvrage et le Titre
     * des Ouvrages dont le titre commence par $first_letters.
     */
    $query = "SELECT ...";

    if (isset($_GET['onlyAvailable']) && $_GET['onlyAvailable']) {
        /*** SQL À INSÉRER ICI ***/
        /**
         * Implémentez la requête permettant de lire le CodeOuvrage et le Titre
         * des Ouvrages dont le titre commence par $first_letters et qui ne sont pas
         * empruntés actuellement.
         */
        $query = "SELECT ...";
    }

    if (isset($_GET['onlyDisable']) && $_GET['onlyDisable']) {
        /*** SQL À INSÉRER ICI ***/
        /**
         * Implémentez la requête permettant de lire le CodeOuvrage et le Titre
         * des Ouvrages dont le titre commence par $first_letters et qui sont
         * empruntés actuellement.
         */
        $query = "SELECT ...";
    }

    $data = $mysqli->query($query);

    while ($row = $data->fetch_assoc()) {
        $client = [
            'id' => $row['CodeOuvra'],
            'name' => $row['Titre']
        ];
        array_push($output, $client);
    }
} else {
    /*** SQL À INSÉRER ICI ***/
    /**
     * Implémentez la requête permettant de lire tous les ouvrages.
     * Attention au format de la date de parution !
     */
    $query = "SELECT ...";

    $data = $mysqli->query($query);

    while ($row = $data->fetch_assoc()) {
        $ouvrage = [
            'id' => $row['CodeOuvra'],
            'titre' => $row['Titre'],
            'auteur' => $row['Auteur'],
            'date' => $row['DateParuFormatee'],
            'editeur' => $row['Editeur'],
            'isbn' => $row['ISBN']
        ];
        array_push($output, $ouvrage);
    }
}

echo json_encode($output);