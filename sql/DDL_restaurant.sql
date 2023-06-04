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

CREATE TABLE user (
    user_id VARCHAR(20) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    surname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    birth_date DATE NOT NULL,
    password VARCHAR(255) NOT NULL,
    profile ENUM('CLIENT', 'EMPLOYEE') NOT NULL DEFAULT 'CLIENT'
);

CREATE TABLE dinnerTable (
    number INT AUTO_INCREMENT PRIMARY KEY,
    capacity INT NOT NULL
);

CREATE TABLE reservationSchedule (
    schedule_id INT AUTO_INCREMENT PRIMARY KEY,
    table_number INT,
    start_time TIME,
    availability BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (table_number)
        REFERENCES dinnerTable (number)
);

CREATE TABLE reservation (
    reservation_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(20),
    schedule_id INT,
    date DATE NOT NULL,
    time TIME NOT NULL,
    number_of_people INT(11) UNSIGNED NOT NULL,
    FOREIGN KEY (user_id)
        REFERENCES user (user_id),
    FOREIGN KEY (schedule_id)
        REFERENCES reservationSchedule (schedule_id)
);

CREATE TABLE drink (
    drink_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    ml INT(3) NOT NULL,
    price DECIMAL(10 , 2 ) NOT NULL,
    type VARCHAR(50) NOT NULL,
    alcoholic BOOLEAN NOT NULL
);

CREATE TABLE dishes (
    dishes_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(255),
    price DECIMAL(10 , 2 ) NOT NULL,
    type VARCHAR(255) NOT NULL,
    allergens VARCHAR(50) NOT NULL
);

CREATE TABLE dessert (
    dessert_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(255),
    price DECIMAL(10 , 2 ) NOT NULL,
    allergens VARCHAR(50) NOT NULL
);

/*CREATE TABLE menu (
    menu_id INT AUTO_INCREMENT PRIMARY KEY,
    price DECIMAL(8 , 2 ) NOT NULL,
    number_id INT NOT NULL,
    drink_id INT,
    dishes_id INT,
    dessert_id INT,
    FOREIGN KEY (number_id)
        REFERENCES dinnerTable (number)
);

CREATE TABLE menuDrink (
    menu_id INT,
    drink_id INT,
    FOREIGN KEY (menu_id)
        REFERENCES menu (menu_id),
    FOREIGN KEY (drink_id)
        REFERENCES drink (drink_id)
);

CREATE TABLE menuDishes (
    menu_id INT,
    dishes_id INT,
    FOREIGN KEY (menu_id)
        REFERENCES menu (menu_id),
    FOREIGN KEY (dishes_id)
        REFERENCES dishes (dishes_id)
);

CREATE TABLE menuDessert (
    menu_id INT,
    dessert_id INT,
    FOREIGN KEY (menu_id)
        REFERENCES menu (menu_id),
    FOREIGN KEY (dessert_id)
        REFERENCES dessert (dessert_id)
);