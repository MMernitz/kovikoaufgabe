<?php
require_once __DIR__ . ('/../inc/functions.php');
require_once __DIR__ . ('/../backend/dbconnect.php');


$carId = e($_GET['car']) ?? '';
if (empty($carId)) {
    echo 'Kein gültiges Fahrzeug!';
    die();
}
if (isset($carId) && !empty(e($carId))) {
    $stmtEdit = $pdo->prepare('SELECT * FROM cars WHERE id = :carId');
    $stmtEdit->bindValue('carId', e($carId));
    $stmtEdit->execute();
    $resultEdit = $stmtEdit->fetch(PDO::FETCH_ASSOC);
}
require_once __DIR__ . ('/../inc/header.php'); ?>

<h2 id="form-title" class="edit-headline">
    Edit Auto <?php echo e($resultEdit['brand']) . ' ' . e($resultEdit['model']); ?>
</h2>
<form action="submit.php" method="POST" class="car-form" id="car-form" aria-labelledby="form-title">
    <input type="hidden" name="id" value="<?php echo $carId; ?>" />
    <div class="form-input">
        <div class="form-input-item">
            <label for="brand">Marke: </label>
            <input type="text" name="brand" id="brand" value="<?php echo e($resultEdit['brand']); ?>" aria-required="true" required />
        </div>
        <div class="form-input-item">
            <label for="model">Modell: </label>
            <input type="text" name="model" id="model" value="<?php echo e($resultEdit['model']); ?>" aria-required="true" required />
        </div>
        <div class="form-input-item">
            <label for="year">Baujahr: </label>
            <input type="number" name="year" id="year" step="1" value="<?php echo e($resultEdit['year']); ?>" aria-required="true" required />
        </div>
        <div class="form-input-item">
            <label for="mileage">Gefahrene Kilometer: </label>
            <input type="number" name="mileage" id="mileage" value="<?php echo e($resultEdit['mileage']); ?>" aria-required="true" required />
        </div>
        <div class="form-input-item">
            <label for="fuel">Kraftstoff: </label>
            <select id="fuel" name="fuel" aria-required="true" required>
                <option value="Benzin" <?php echo e($resultEdit['fuel']) === 'Benzin' ? 'selected' : ''; ?>>Benzin</option>
                <option value="Diesel" <?php echo e($resultEdit['fuel']) === 'Diesel' ? 'selected' : ''; ?>>Diesel</option>
                <option value="Hybrid" <?php echo e($resultEdit['fuel']) === 'Hybrid' ? 'selected' : ''; ?>>Hybrid</option>
                <option value="Elektro" <?php echo e($resultEdit['fuel']) === 'Elektro' ? 'selected' : ''; ?>>Elektro</option>
            </select>
        </div>
        <div class="form-input-item">
            <label for="location">Aktueller Standort: </label>
            <input type="text" id="location" name="location" value="<?php echo e($resultEdit['location']); ?>" aria-required="true" required />
        </div>
    </div>
    <div class="error-box" id="error-box" role="alert" aria-live="assertive" tabindex="-1"></div>
    <div class="form-actions">
        <a href="./list.php" class="reset-action" id="reset">Zurück</a>
        <input class="submit-action" type="submit" value="Aktualisieren" id="submit" />
    </div>
</form>

<?php require_once __DIR__ . ('/../inc/footer.php'); ?>