DROP DATABASE IF EXISTS restaurantDB;
CREATE DATABASE IF NOT EXISTS restaurantDB;
USE restaurantDB;

CREATE TABLE restaurant (
  name VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  city VARCHAR(255) NOT NULL,
  country VARCHAR(255) NOT NULL,
  phone INT(8) NOT NULL,
  email VARCHAR(255) NOT NULL,
  social VARCHAR(255) NOT NULL,
  closing_day INT(1) NOT NULL,
  opening_time TIME NOT NULL,
  closing_time TIME NOT NULL
);

CREATE TABLE T_Client (
    jugadorId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombreCompleto VARCHAR(200) DEFAULT NULL,
    usuario VARCHAR(100),
    CONSTRAINT T_Jugador_ibfk_1 FOREIGN KEY (usuario)
        REFERENCES T_Usuario (usuario)
);

CREATE TABLE T_Torneo (
    ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombreTorneo VARCHAR(100) DEFAULT NULL,
    fecha DATE NULL,
    estado ENUM('No finalizado', 'Finalizado') DEFAULT 'No finalizado',
    numJugadores INT DEFAULT 0,
    campeon VARCHAR(100) DEFAULT 'Por decidir ...'
);

 CREATE TABLE T_Partido (
    partidoId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ronda ENUM('Cuartos', 'Semifinal', 'Final') NOT NULL,
    torneoId INT,
    jugadorA INT,
    jugadorB INT,
    ganador INT DEFAULT NULL,
    CONSTRAINT T_Partido_ibfk_1 FOREIGN KEY (jugadorA)
        REFERENCES T_Jugador (jugadorId),
    CONSTRAINT T_Partido_ibfk_2 FOREIGN KEY (jugadorB)
        REFERENCES T_Jugador (jugadorId),
    CONSTRAINT T_Partido_ibfk_3 FOREIGN KEY (torneoId)
        REFERENCES T_Torneo (ID)
        ON DELETE CASCADE
);

-- Ejecutar test.php
-- Insertar jugadores

INSERT INTO T_Jugador (nombreCompleto, usuario) VALUES ('Javi Abandono', 'javi');
INSERT INTO T_Jugador (nombreCompleto, usuario) VALUES ('Sergio Serrano', 'sergio');
INSERT INTO T_Jugador (nombreCompleto, usuario) VALUES ('Daniel Okolo', 'okolo');
INSERT INTO T_Jugador (nombreCompleto, usuario) VALUES ('Yeray Rus', 'yeray');
INSERT INTO T_Jugador (nombreCompleto, usuario) VALUES ('Stewart Jordi', 'stewart');
INSERT INTO T_Jugador (nombreCompleto, usuario) VALUES ('Adrián Castillo', 'castillo');
INSERT INTO T_Jugador (nombreCompleto, usuario) VALUES ('Fernando Alonso', 'fernando');
INSERT INTO T_Jugador (nombreCompleto, usuario) VALUES ('Jaume Altazona', 'jaume');