<?php
require_once __DIR__ . ('/../inc/functions.php');
require_once __DIR__ . ('/../backend/dbconnect.php');

$carId = e($_POST['id']);


if (empty(e($_POST['brand'])) || empty(e($_POST['model'])) || empty(e($_POST['year'])) || empty(e($_POST['mileage'])) || empty(e($_POST['fuel'])) || empty(e($_POST['location']))) {
    var_dump($_POST);
    die('Ungültige Eingabe');
}

if (!empty(e($carId))) {
    // edit existing 
    $editStmt = $pdo->prepare('UPDATE `cars` 
                                SET `brand` = :brand, 
                                    `model` = :model, 
                                    `year` = :bYear, 
                                    `mileage` = :mileage, 
                                    `fuel` = :fuel, 
                                    `location` = :currentLocation 
                                WHERE id = :id');
    $editStmt->bindValue('brand', e($_POST['brand']));
    $editStmt->bindValue('model', e($_POST['model']));
    $editStmt->bindValue('bYear', e($_POST['year']), PDO::PARAM_INT);
    $editStmt->bindValue('mileage', e($_POST['mileage']), PDO::PARAM_INT);
    $editStmt->bindValue('fuel', e($_POST['fuel']));
    $editStmt->bindValue('currentLocation', e($_POST['location']));
    $editStmt->bindValue('id', e($carId), PDO::PARAM_INT);
    $editStmt->execute();
} else {
    // create new 
    $newStmt = $pdo->prepare('INSERT INTO cars (brand, model, year, mileage, fuel, location) VALUES (:brand, :model, :bYear, :mileage, :fuel, :currentLocation) ');
    $newStmt->bindValue('brand', e($_POST['brand']));
    $newStmt->bindValue('model', e($_POST['model']));
    $newStmt->bindValue('bYear', e($_POST['year']), PDO::PARAM_INT);
    $newStmt->bindValue('mileage', e($_POST['mileage']), PDO::PARAM_INT);
    $newStmt->bindValue('fuel', e($_POST['fuel']));
    $newStmt->bindValue('currentLocation', e($_POST['location']));
    $newStmt->execute();
}
header('Location: list.php');
exit;
