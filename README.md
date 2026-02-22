# Testaufgabe Koviko

Ein kleines PHP-Projekt zur Verwaltung von Fahrzeugen mit CRUD-Funktionalität und JavaScript-Validierung.

## Features

Nutzer können mit diesem Programm:

- Fahrzeuge anlegen
- existierende Fahrzeuge bearbeiten
- existierende Fahrzeuge löschen
- alle existierenden Fahrzeuge aus der Datenbank auflisten

Dabei werden:

- Nutzereingaben validiert
- Fehlerhafte oder schadhafte Eingaben abgefangen
- Daten datenbankestützt gespeichert (MariaDB)

## Verwendete Technologien

- PHP 8.2.12
- MySQL / MariaDB
- HTML5 / CSS3
- XAMPP for Windows 8.2.12
- Apache 2.4.58

## Voraussetzungen

- PHP >= 8.0
- MySQL >= 5.7
- Apache
- XAMPP (empfohlen)

## Installation

1. Repository klonen:
   git clone https://github.com/MMernitz/kovikoaufgabe.git

2. Projekt in das htdocs Verzeichnis von XAMPP verschieben

3. Erstellen Sie eine Datenbank in phpMyAdmin. Sie dann die Datei database.sql aus dem Verzeichnis "sql" importieren.

4. Erstellen Sie eine Tabelle in phpMyAdmin. Sie können dafür die Datei cars_seed.sql im Verzeichnis "sql" verwenden.

5. Zugangsdaten in backend/dbconnect.php anpassen

6. Apache und MySQL starten

7. Projekt im Browser öffnen:
   http://localhost/koviko/frontend/

## Betrieb

Verwenden Sie die Links im Header oder der Indexseite, um neue Fahrzeuge anzulegen oder die bereits existierenden auflisten zu lassen.
Ein Klick auf "Logo" bringt Sie zurück zur Startseite. Sollten keine Fahrzeuge in der Datenbank existieren, gibt es einen entsprechenden
Hinweise mit einem Link zur Erstellseite.

## Datenbankstruktur

| Feld     | Typ           |
| -------- | ------------- |
| id       | INT (PK, AI)  |
| brand    | VARCHAR (100) |
| model    | VARCHAR (100) |
| year     | YEAR          |
| mileage  | INT           |
| fuel     | ENUM (...)    |
| location | VARCHAR (150) |

## Projektstruktur

- /assets -> Skripte und Styling
- /backend -> Datenbankverbindung
- /frontend -> Frontend-PHP-Dateien mit Funktionen
- /frontend/views -> Frontend-Dateien ohne Funktionen (reine Darstellung)
- /inc -> Hilfsfunktionen, Header und Footer
- /sql -> Verzeichnis für SQL-Skripts

## Sicherheit

- Prepared Statements mit PDO
- Validierung der Eingabedaten per JavaScript und PHP
- HTML-Escaping über eigene Funktion e()

## Zugänglichkeit

In Lighthouse wurden wenigstens 90% Accessibility in jeder Komponente erreicht:

- index.view.php: 100%
- new.php: 96%
- list.php: 100%
- edit.php: 96%

Die Anwendung ist komplett per Tastatur steuerbar.

## Mögliche Erweiterungen

- Benutzerverwaltung mit unterschiedlichen Rollen
- existieren Rollen, sollte dbconnect.php die Rolle nicht mehr hardcodiert enthalten
- Suchfunktion
- Paginierung der Ergebnisliste
- Sortierung nach Nutzereingabe
- location von VARCHAR in tatsächliche Geo-Daten ändern und Positionsauswahl ermöglichen
- Frontend durch Framework (React, Vue, etc.) realisieren
- Internationalisierung und entsprechende Schaltfläche im Header
- responsive Design zur besseren Darstellung in verschiedenen Endgeräten
- Verwendung von Icons auf Schaltflächen zur besseren Lesbarkeit
- automatische Tests

## Lizenz

An dieser Stelle stehen üblicherweise Lizenzinformationen.

## Zeitplan

### Soll-Zeit

- Planungsphase: 1-2 h
- Datenbank: 1 h
- Backend: 2-3 h
- Frontend: 3-5 h
- (semi-)manuelles Testen: 1 h
- gesamt: 8-14 h

### IST-Zeit

- Planungsphase: 1 h
- Datenbank erstellen and Tabelle anlegen: 30 min
- Frontend: 4 h 20 min (inklusive Tests)
- Backend: 2 h 20 min (inklusive Tests)
- ReadMe schreiben und GitHub-Repo erstellen: 1h
- gesamt: 9h10 min
