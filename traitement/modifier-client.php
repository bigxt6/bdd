<?php
require_once("../conf/global.php");

if (isset($_POST['submit']) && isset($_GET['id'])) {
    if (isset($_POST['nom']) && !empty($_POST['nom'])
        && isset($_POST['prenom']) && !empty($_POST['prenom'])
        && isset($_POST['adresse']) && !empty($_POST['adresse'])
        && isset($_POST['cp']) && !empty($_POST['cp'])
        && isset($_POST['ville']) && !empty($_POST['ville'])
        && isset($_POST['datecotis']) && !empty($_POST['datecotis'])) {

        $mysqli = new mysqli($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['pass'], $GLOBALS['schema']);
        $mysqli->set_charset("utf8");

        $isoDate = DateTime::createFromFormat('d/m/Y', $_POST['datecotis']);

        /*** SQL À INSÉRER ICI ***/
        /**
         * Implémentez la requête permettant de mettre à jour tous les champs de la table Clients
         * Utilisez la fonction format() pour convertir la date $isoDate au format ISO.
         */
        $query = "UPDATE ...";

        $mysqli->query($query);

        if ($mysqli->affected_rows === 1) {
            $_SESSION['update-client']['ok'] = "Client mis à jour !";
            header('Location: ../clients.php');
        } else {
            $_SESSION['update-client']['ko'] = "Une erreur est survenue. Veuillez réessayer.";
            header('Location: ../clients.php');
        }
    } else {
        $_SESSION['update-client']['ko'] = "Merci de remplir tous les champs du formulaire.";
        header('Location: ../maj-clients.php?id='.$_GET['id']);
    }
} else {
    header('Location: ../clients.php');
}