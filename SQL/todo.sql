-- Débute le script
START TRANSACTION;

CREATE DATABASE IF NOT EXISTS TodoList;

-- select the database to use it 
USE TodoList; 

CREATE TABLE IF NOT EXISTS task (
    id int(10) NOT NULL AUTO_INCREMENT,
    title varchar(50) NOT NULL,
    description varchar(50) NOT NULL,
    important boolean NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO `task` (`title`, `description`, `important`) VALUES
('Faire les courses', 'Acheter du lait, des œufs et du pain', false),
('Réviser pour l examen', 'Relire les chapitres 4 à 6 du manuel', true),
('Appeler le médecin', 'Prendre rendez-vous pour une consultation', true),
('Nettoyer la maison', 'Passer l aspirateur et laver les vitres', false),
('Payer les factures', 'Règler la facture d électricité et de gaz', true);
