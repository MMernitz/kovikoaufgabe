CREATE TABLE cars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marke VARCHAR(100) NOT NULL,
    modell VARCHAR(100) NOT NULL,
    baujahr YEAR NOT NULL,
    kilometerstand INT NOT NULL,
    kraftstoff ENUM('Benzin','Diesel','Elektro','Hybrid') NOT NULL,
    standort VARCHAR(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;