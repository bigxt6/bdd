<?php
require_once("../conf/global.php");

$client_id = null;
$ouvrage_id = null;

if (isset($_POST['client_id']) && !empty($_POST['client_id'])) {
    $client_id = $_POST['client_id'];
}

if (isset($_POST['ouvrage_id']) && !empty($_POST['ouvrage_id'])) {
    $ouvrage_id = $_POST['ouvrage_id'];
}

if (!$client_id && !$ouvrage_id) {
    http_response_code(400);
    exit();
}

$mysqli = new mysqli($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['pass'], $GLOBALS['schema']);
$mysqli->set_charset("utf8");

/*** SQL À INSÉRER ICI ***/
/**
 * Implémentez la requête permettant d'ajouter un pret de l'ouvrage
 * $ouvrage_id au client $client_id aujourd'hui.
 */
$query = "INSERT ...";

$mysqli->query($query);

if ($mysqli->affected_rows !== 1) {
    http_response_code(400);
    echo "{}";
    exit();
}

http_response_code(201);
echo "{}";