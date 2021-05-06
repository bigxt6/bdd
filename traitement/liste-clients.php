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
     * Implémentez la requête permettant de lire le CodeClient, Prénom et Nom
     * des clients dont le nom ou le prénom commence par $first_letters.
     */
    $query = "SELECT ...";

    if (isset($_GET['onlyBorrower']) && $_GET['onlyBorrower']) {
        /*** SQL À INSÉRER ICI ***/
        /**
         * Implémentez la requête permettant de lire le CodeClient, Prénom et Nom
         * des clients dont le nom ou le prénom commence par $first_letters et qui ont
         * un emprunt en cours.
         */
        $query = "SELECT ...";
    }

    $data = $mysqli->query($query);

    while ($row = $data->fetch_assoc()) {
        $client = [
            'id' => $row['CodeClient'],
            'name' => $row['Prenom']." ".$row['Nom']
        ];
        array_push($output, $client);
    }
} else {
    /*** SQL À INSÉRER ICI ***/
    /**
     * Implémentez la requête permettant de lire tous les clients.
     * Attention au format de la date de cotisation !
     */
    $query = "SELECT ...";

    $data = $mysqli->query($query);

    while ($row = $data->fetch_assoc()) {
        $client = [
            'id' => $row['CodeClient'],
            'nom' => $row['Nom'],
            'prenom' => $row['Prenom'],
            'adresse' => $row['Adresse'],
            'cp' => $row['CP'],
            'ville' => $row['Ville'],
            'date' => $row['DateCotisFormatee']
        ];
        array_push($output, $client);
    }
}

echo json_encode($output);