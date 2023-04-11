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

CREATE TABLE reservation (
    reservation_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    number_of_people INT(11) UNSIGNED NOT NULL,
    indoor BOOLEAN NOT NULL DEFAULT TRUE,
    comment VARCHAR(255)
);

CREATE TABLE user (
    userId INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    profile ENUM('CLIENT', 'EMPLOYEE') NOT NULL DEFAULT 'CLIENT'
);

CREATE TABLE dinnerTable (
    number INT AUTO_INCREMENT PRIMARY KEY,
    userId INT,
    description VARCHAR(255),
    capacity INT NOT NULL,
    FOREIGN KEY (userId)
        REFERENCES user (userId)
);

CREATE TABLE menu (
    menu_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(255)
);

CREATE TABLE meal (
    meal_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(255),
    price DECIMAL(10 , 2 ),
    menu_id INT,
    FOREIGN KEY (menu_id)
        REFERENCES menu (menu_id)
);

CREATE TABLE drink (
    drink_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    alcoholic BOOLEAN NOT NULL DEFAULT FALSE,
    description VARCHAR(255),
    price DECIMAL(10 , 2 ),
    menu_id INT,
    FOREIGN KEY (menu_id)
        REFERENCES menu (menu_id)
);

CREATE TABLE dessert (
    dessert_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(255),
    price DECIMAL(10 , 2 ),
    menu_id INT,
    FOREIGN KEY (menu_id)
        REFERENCES menu (menu_id)
);