DROP DATABASE IF EXISTS restaurantDB;
CREATE DATABASE IF NOT EXISTS restaurantDB;
USE restaurantDB;

CREATE TABLE restaurant (
    name VARCHAR(50) NOT NULL,
    address VARCHAR(100) NOT NULL,
    city VARCHAR(50) NOT NULL,
    country VARCHAR(50) NOT NULL,
    phone INT(8) NOT NULL,
    email VARCHAR(100) NOT NULL,
    closing_day VARCHAR(9) NOT NULL,
    opening_time TIME NOT NULL,
    closing_time TIME NOT NULL
);

CREATE TABLE user (
    user_id VARCHAR(20) PRIMARY KEY,
    name VARCHAR(20) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    birth_date DATE NOT NULL,
    password VARCHAR(255) NOT NULL,
    profile ENUM('CLIENT', 'EMPLOYEE') NOT NULL DEFAULT 'CLIENT'
);

CREATE TABLE dinnerTable (
    number INT AUTO_INCREMENT PRIMARY KEY,
    capacity INT(2) NOT NULL
);

CREATE TABLE reservationSchedule (
    schedule_id INT AUTO_INCREMENT PRIMARY KEY,
    table_number INT,
    time TIME NOT NULL,
    date DATE NOT NULL,
    FOREIGN KEY (table_number)
        REFERENCES dinnerTable (number)
);

CREATE TABLE reservation (
    reservation_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(20),
    schedule_id INT,
    number_of_people INT(2) NOT NULL,
    FOREIGN KEY (user_id)
        REFERENCES user (user_id),
    FOREIGN KEY (schedule_id)
        REFERENCES reservationSchedule (schedule_id)
        ON DELETE CASCADE
);


CREATE TABLE drink (
    drink_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    ml INT(3) NOT NULL,
    price DECIMAL(10 , 2 ) NOT NULL,
    type VARCHAR(50) NOT NULL,
    alcoholic BOOLEAN NOT NULL
);

CREATE TABLE dishes (
    dishes_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(255),
    price DECIMAL(10 , 2 ) NOT NULL,
    type VARCHAR(255) NOT NULL,
    allergens VARCHAR(50) NOT NULL
);

CREATE TABLE dessert (
    dessert_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(150),
    price DECIMAL(10 , 2 ) NOT NULL,
    allergens VARCHAR(50) NOT NULL
);
