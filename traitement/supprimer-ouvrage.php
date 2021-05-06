<?php
require_once("../conf/global.php");

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
} else {
    echo "[]";
    exit();
}

$mysqli = new mysqli($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['pass'], $GLOBALS['schema']);
$mysqli->set_charset("utf8");

/*** SQL À INSÉRER ICI ***/
/**
 * Implémentez la requête permettant de lire l'ouvrage n° $id (pour être sur qu'il existe).
 */
$query = "SELECT ...";

$data = $mysqli->query($query);

if ($data->num_rows !== 1) {
    http_response_code(404);
    echo "{}";
    exit();
}

/*** SQL À INSÉRER ICI ***/
/**
 * Implémentez la requête permettant de supprimer l'ouvrage n° $id.
 */
$query = "DELETE ...";

$mysqli->query($query);

if ($mysqli->affected_rows !== 1) {
    http_response_code(404);
    echo "{}";
    exit();
}

http_response_code(200);
echo "{}";