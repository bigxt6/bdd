<?php
require_once("../conf/global.php");

$mysqli = new mysqli($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['pass'], $GLOBALS['schema']);
$mysqli->set_charset("utf8");

if ($mysqli->connect_errno) {
    echo "Echec à la connexion : ".$mysqli->connect_error;
}

$output = [];

if (isset($_GET['minifiedList']) && $_GET['minifiedList']) {
    $client_id = null;
    $ouvrage_id = null;

    if (isset($_GET['client_id']) && !empty($_GET['client_id'])) {
        $client_id = $_GET['client_id'];
    }

    if (isset($_GET['ouvrage_id']) && !empty($_GET['ouvrage_id'])) {
        $ouvrage_id = $_GET['ouvrage_id'];
    }

    /*** SQL À INSÉRER ICI ***/
    /**
     * Implémentez la requête permettant de lire, pour tous les prets, l'id du prêt,
     * le nom et prénom de l'emprunteur, le titre de l'ouvrage emprunté et la date de prêt
     * Attention au format de la date de pret !
     */
    $query = "SELECT ...";

    if ($client_id) {
        /*** SQL À INSÉRER ICI ***/
        /**
         * L'OPERATEUR .= SIGNIFIE QUE LE CONTENU DE LA CHAINE DE CARACTÈRES COMPLÈTE
         * LA REQUËTE PRÉCÉDENTE, ELLE NE LA REMPLACE PAS.
         *
         * Ajoutez le code SQL nécessaire pour compléter la requête précédente
         * afin qu'elle n'affiche que les prêts dont le CodeClient de l'emprunteur vaut $client_id
         */
        $query .= " AND ...";
    }

    if ($ouvrage_id) {
        /*** SQL À INSÉRER ICI ***/
        /**
         * L'OPERATEUR .= SIGNIFIE QUE LE CONTENU DE LA CHAINE DE CARACTÈRES COMPLÈTE
         * LA REQUËTE PRÉCÉDENTE, ELLE NE LA REMPLACE PAS.
         *
         * Ajoutez le code SQL nécessaire pour compléter la requête précédente
         * afin qu'elle n'affiche que les prêts dont le CodeOuvrage de l'ouvrage vaut $ouvrage_id
         */
        $query .= " AND ...";
    }

    if (isset($_GET['onlyCurrent']) && $_GET['onlyCurrent']) {
        /*** SQL À INSÉRER ICI ***/
        /**
         * L'OPERATEUR .= SIGNIFIE QUE LE CONTENU DE LA CHAINE DE CARACTÈRES COMPLÈTE
         * LA REQUËTE PRÉCÉDENTE, ELLE NE LA REMPLACE PAS.
         *
         * Ajoutez le code SQL nécessaire pour compléter la requête précédente
         * afin qu'elle n'affiche que les prêts en cours
         */
        $query .= " AND ...";
    }

    $data = $mysqli->query($query);


    while ($row = $data->fetch_assoc()) {
        $client = [
            'id' => $row['id'],
            'prenom' => $row['Prenom'],
            'nom' => $row['Nom'],
            'titre' => $row['Titre'],
            'date' => $row['DatePretFormatte']
        ];
        array_push($output, $client);
    }
} else {
    /*** SQL À INSÉRER ICI ***/
    /**
     * Implémentez la requête permettant de lire, pour tous les prets, l'id du prêt,
     * le nom et prénom de l'emprunteur, le titre de l'ouvrage emprunté, la date de prêt
     * et la date de retour.
     * Attention aux format des dates !
     */
    $query = "SELECT ...";

    $data = $mysqli->query($query);

    while ($row = $data->fetch_assoc()) {
        $ouvrage = [
            'id' => $row['id'],
            'nom' => $row['Nom'],
            'prenom' => $row['Prenom'],
            'titre' => $row['Titre'],
            'datePret' => $row['DatePretFormatte'],
            'dateRetour' => $row['DateRetourFormatte']
        ];
        array_push($output, $ouvrage);
    }
}

echo json_encode($output);