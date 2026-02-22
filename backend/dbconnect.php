<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=koviko', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    echo 'Fehler bei der Datenbankverbindung....';
    die();
}
