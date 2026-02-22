<?php

require_once __DIR__ . ('/../inc/functions.php');
require_once __DIR__ . ('/../backend/dbconnect.php');

$deleteCar = e($_GET['car']);

// delete existing
if (isset($deleteCar) && !empty(e($deleteCar))) {
    $deleteStmt = $pdo->prepare('DELETE FROM `cars` WHERE `id` = :carId');
    $deleteStmt->bindValue('carId', e($deleteCar));
    $deleteStmt->execute();
}


header('Location: list.php');
exit;
