document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("car-form");

  if (!form) {
    console.log("Kein Formular gefunden!");
    return;
  }

  form.addEventListener("submit", function (event) {
    let errors = [];

    let validFuels = ["Benzin", "Diesel", "Hybrid", "Elektro"];

    const brand = document.getElementById("brand").value.trim();
    const model = document.getElementById("model").value.trim();
    const year = parseInt(document.getElementById("year").value);
    const mileage = parseInt(document.getElementById("mileage").value);
    const fuel = document.getElementById("fuel").value;
    const location = document.getElementById("location").value.trim();

    const currentYear = new Date().getFullYear();

    if (brand.length < 2) {
      errors.push("Marke muss mindestens 2 Zeichen lang sein!");
      document.getElementById("brand").classList.add("input-error");
    }

    if (model.length < 1) {
      errors.push("Modell darf nicht leer sein.");
      document.getElementById("model").classList.add("input-error");
    }

    if (isNaN(year) || year < 1900 || year > currentYear) {
      errors.push("Bitte ein gültiges Jahr eingeben.");
      document.getElementById("year").classList.add("input-error");
    }

    if (isNaN(mileage) || mileage < 0 || mileage.toString().length > 7) {
      errors.push(
        "Kilometerstand muss eine realistische, gültige Zahl größer 0 sein!",
      );
      document.getElementById("mileage").classList.add("input-error");
    }

    if (!validFuels.includes(fuel)) {
      errors.push("Kein gültiger Kraftstoff!");
      document.getElementById("fuel").classList.add("input-error");
    }

    if (location.length < 2) {
      errors.push("Standort muss mindestens 2 Zeichen lang sein.");
      document.getElementById("location").classList.add("input-error");
    }

    if (errors.length > 0) {
      event.preventDefault();
      showErrors(errors);
    }
  });
});

function showErrors(errors) {
  const errorBox = document.getElementById("error-box");
  errorBox.innerHTML = "";

  const ul = document.createElement("ul");

  errors.forEach(function (error) {
    const li = document.createElement("li");
    li.textContent = error;
    ul.appendChild(li);
  });

  errorBox.appendChild(ul);

  document.getElementById("error-box").focus();
}
