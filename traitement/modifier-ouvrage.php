<?php
require_once("../conf/global.php");

if (isset($_POST['submit']) && isset($_GET['id'])) {
    if (isset($_POST['titre']) && !empty($_POST['titre'])
        && isset($_POST['auteur']) && !empty($_POST['auteur'])
        && isset($_POST['dateparu']) && !empty($_POST['dateparu'])
        && isset($_POST['editeur']) && !empty($_POST['editeur'])
        && isset($_POST['isbn']) && !empty($_POST['isbn'])) {

        $mysqli = new mysqli($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['pass'], $GLOBALS['schema']);
        $mysqli->set_charset("utf8");

        $isoDate = DateTime::createFromFormat('d/m/Y', $_POST['dateparu']);

        /*** SQL À INSÉRER ICI ***/
        /**
         * Implémentez la requête permettant de mettre à jour tous les champs de la table Ouvrages
         * Utilisez la fonction format() pour convertir la date $isoDate au format ISO.
         */
        $query = "UPDATE ...";

        $mysqli->query($query);

        if ($mysqli->affected_rows === 1) {
            $_SESSION['update-ouvrage']['ok'] = "Ouvrage mis à jour !";
            header('Location: ../ouvrages.php');
        } else {
            $_SESSION['update-ouvrage']['ko'] = "Une erreur est survenue. Veuillez réessayer.";
            header('Location: ../ouvrages.php');
        }
    } else {
        $_SESSION['update-ouvrage']['ko'] = "Merci de remplir tous les champs du formulaire.";
        header('Location: ../maj-ouvrage.php?id='.$_GET['id']);
    }
} else {
    header('Location: ../ouvrages.php');
}