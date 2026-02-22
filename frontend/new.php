<?php
require_once __DIR__ . ('/../inc/header.php');
require_once __DIR__ . ('/../backend/dbconnect.php');
?>
<h2 id="form-title" class="new-headline">Neues Fahrzeug erfassen</h2>
<form class="car-form" method="POST" action="submit.php" id="car-form" aria-labelledby="form-title">
    <div class=" form-input">
        <div class="form-input-item">
            <label for="brand">Marke: </label>
            <input type="text" name="brand" id="brand" required aria-required="true" />
        </div>
        <div class="form-input-item">
            <label for="model">Modell: </label>
            <input type="text" name="model" id="model" required aria-required="true" aria-required="true" />
        </div>
        <div class="form-input-item">
            <label for="year">Baujahr: </label>
            <input type="number" name="year" id="year" step="1" value="1990" required aria-required="true" />
        </div>
        <div class="form-input-item">
            <label for="mileage">Gefahrene Kilometer: </label>
            <input type="number" name="mileage" id="mileage" required aria-required="true" />
        </div>
        <div class="form-input-item">
            <label for="fuel">Kraftstoff: </label>
            <select id="fuel" name="fuel" required aria-required="true">
                <option value="Benzin">Benzin</option>
                <option value="Diesel">Diesel</option>
                <option value="Hybrid">Hybrid</option>
                <option value="Elektro">Elektro</option>
            </select>
        </div>
        <div class="form-input-item">
            <label for="location">Aktueller Standort: </label>
            <input type="text" id="location" name="location" required aria-required="true" />
        </div>
    </div>
    <div class="error-box" id="error-box" role="alert" aria-live="assertive" tabindex="-1"></div>
    <div class="form-actions">
        <input
            class="reset-action"
            type="reset"
            value="Zurücksetzen"
            id="reset" />
        <input
            class="submit-action"
            type="submit"
            value="Abschicken"
            id="submit" />
    </div>
</form>
<?php require_once __DIR__ . ('/../inc/footer.php') ?>