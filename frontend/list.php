<?php
require_once __DIR__ . ('/../inc/functions.php');
require_once __DIR__ . ('/../inc/header.php');
require_once __DIR__ . ('/../backend/dbconnect.php');


// fetch all
$stmt = $pdo->prepare('SELECT * FROM `cars` ORDER BY `id` DESC');
$stmt->execute();


$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<segment class="list-segment">
    <h2 class="list-headline">Alle Fahrzeuge</h2>
    <?php if (count($results) <= 0) : ?>
        <div class="no-cars">
            <p>Es sind keine Fahrzeuge in der Datenbank gelistet. Legen Sie <a href="./new.php">hier</a> ein Neues an.</p>
        </div>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Marke</th>
                    <th>Modell</th>
                    <th>Baujahr</th>
                    <th>Laufleistung</th>
                    <th>Kraftstoff</th>
                    <th>Aktueller Standort</th>
                    <th>Aktionen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $carItem) : ?>
                    <tr>
                        <td><?php echo e($carItem['brand']) ?></td>
                        <td><?php echo e($carItem['model']) ?></td>
                        <td><?php echo e($carItem['year']) ?></td>
                        <td><?php echo e($carItem['mileage']) ?></td>
                        <td><?php echo e($carItem['fuel']) ?></td>
                        <td><?php echo e($carItem['location']) ?></td>
                        <td>
                            <ul class="list-actions">
                                <li class="action-edit"><a href="./edit.php?<?php echo http_build_query(['car' => e($carItem['id'])]); ?>">Anpassen</a></li>
                                <li class="action-delete"><a href="./delete.php?<?php echo http_build_query(['car' => e($carItem['id'])]); ?>">Löschen</a></li>
                            </ul>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</segment>
<?php endif; ?>

<?php

require_once __DIR__ . ('/../inc/footer.php');
?>