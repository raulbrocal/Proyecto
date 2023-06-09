USE restaurantDB;
-- Usuario master
INSERT INTO user (user_id, name, surname, email, phone, birth_date, password, profile) 
VALUES ('master', 'Usuario', 'Master', 'master@example.com', '123456789', '2000-01-01', '$2y$10$ImxwCZyBCtrQ6z6vF9.Ty.a66lCpM84tCdCvOAfz/Ftc5A9Ia48Iu', 'EMPLOYEE');
          
-- Información del restaurante
INSERT INTO restaurant (name, address, city, country, phone, email, closing_day, opening_time, closing_time)
VALUES ("Crew Bar","Carrer Platja n3", "Port Adriano", "Islas Baleares", 638440177, "crewbar@gmail.com", "Domingo", "08:00", "22:00");

-- Mesas en el restaurante
INSERT INTO dinnerTable (capacity)
VALUES (4), (4), (4), (4), (4), (6), (6), (2), (2), (2), (2), (2), (8), (6), (2);

-- Menú
INSERT INTO drink (name, ml, type, price, alcoholic)
VALUES
('Agua', 500, 'Refresco', 2.20, FALSE),
('Coca-Cola', 355, 'Refresco', 2.50, FALSE),
('Coca-Cola Zero', 355, 'Refresco', 2.50, FALSE),
('Pepsi', 355, 'Refresco', 2.50, FALSE),
('Pepsi Max', 355, 'Refresco', 2.50, FALSE),
('Sprite', 355, 'Refresco', 2.50, FALSE),
('Fanta Naranja', 355, 'Refresco', 2.50, FALSE),
('Fanta Limón', 355, 'Refresco', 2.50, FALSE),
('7UP', 355, 'Refresco', 2.50, FALSE),
('Schweppes', 355, 'Refresco', 2.50, FALSE),
('Aquarius Naranja', 355, 'Refresco', 2.75, FALSE),
('Aquarius Limón', 355, 'Refresco', 2.75, FALSE),
('Bitter Kas', 355, 'Refresco', 2.50, FALSE),
('Nestea Limón', 355, 'Refresco', 3.00, FALSE),
('Cabernet Sauvignon', 750, 'Vino tinto', 25.00, TRUE),
('Merlot', 750, 'Vino tinto', 20.00, TRUE),
('Pinot Noir', 750, 'Vino tinto', 35.00, TRUE),
('Malbec', 750, 'Vino tinto', 28.00, TRUE),
('Chardonnay', 750, 'Vino blanco', 22.00, TRUE),
('Sauvignon Blanc', 750, 'Vino blanco', 18.00, TRUE),
('Pinot Grigio', 750, 'Vino blanco', 20.00, TRUE),
('Prosecco', 750, 'Vino espumoso', 30.00, TRUE),
('Champagne', 750, 'Vino espumoso', 50.00, TRUE),
('Cava', 750, 'Vino espumoso', 25.00, TRUE),
('Margarita', 250, 'Cóctel', 8.50, TRUE),
('Mojito', 250, 'Cóctel', 9.00, TRUE),
('Daiquiri', 250, 'Cóctel', 7.50, TRUE),
('Piña Colada', 250, 'Cóctel', 8.00, TRUE),
('Cosmopolitan', 250, 'Cóctel', 10.00, TRUE),
('Manhattan', 250, 'Cóctel', 12.00, TRUE),
('Bloody Mary', 250, 'Cóctel', 9.50, TRUE),
('Gin Tonic', 250, 'Cóctel', 7.50, TRUE),
('Negroni', 250, 'Cóctel', 11.00, TRUE);

INSERT INTO dishes (name, description, price, type, allergens)
VALUES 
('Ensalada César', 'Lechuga romana, pollo, crutones, queso parmesano, salsa César', 9.50, 'entrante', 'frutos secos'),
('Gazpacho', 'Sopa fría de tomate, pimiento, pepino, ajo y aceite de oliva', 6.50, 'entrante', 'apio, sulfitos'),
('Croquetas de jamón', 'Croquetas caseras de jamón serrano', 8.00, 'entrante', 'gluten, huevo, lácteos'),
('Tabulé', 'Ensalada libanesa de cuscús, tomate, pepino, cebolla, perejil, menta y limón', 7.50, 'entrante', 'frutos secos'),
('Hummus', 'Puré de garbanzos, tahini, aceite de oliva y limón', 6.00, 'entrante', 'sésamo'),
('Salmorejo', 'Sopa fría de tomate, pan, ajo, aceite de oliva y jamón serrano', 7.00, 'entrante', 'gluten, sulfitos'),
('Fingers de queso', 'Queso manchego frito con mermelada casera de tomate', 9.00, 'entrante', 'lácteos'),
('Tortilla de patatas', 'Tortilla de patatas con cebolla', 8.00, 'entrante', 'huevo'),
('Carpaccio de calabacín', 'Calabacín laminado con queso parmesano, rúcula y aceite de oliva', 9.50, 'entrante', 'lácteos'),
('Boquerones en vinagre', 'Boquerones marinados en vinagre y aceite de oliva', 7.50, 'entrante', 'pescado'),
('Calamares a la romana', 'Calamares rebozados y fritos', 10.00, 'entrante', 'gluten, moluscos'),
('Pulpo a la gallega', 'Pulpo cocido con pimentón y aceite de oliva', 12.00, 'entrante', 'moluscos'),
('Ensaladilla rusa', 'Ensaladilla de patata, zanahoria, guisantes, atún, huevo y mayonesa', 6.50, 'entrante', 'huevo, pescado'),
('Gambas al ajillo', 'Gambas salteadas en aceite de oliva, ajo y guindilla', 11.00, 'entrante', 'marisco'),
('Tostada de salmón ahumado', 'Tostada de pan con salmón ahumado, queso crema y eneldo', 9.50, 'entrante', 'lácteos, pescado'),
('Entrecot a la parrilla', 'Jugoso entrecot a la parrilla con patatas y verduras al grill', 22.50, 'carne', 'Gluten, lactosa'),
('Solomillo', 'Delicioso solomillo envuelto en hojaldre con patatas y salsa de champiñones', 28.75, 'carne', 'Gluten, huevo, frutos secos'),
('Rabo de toro', 'Rabo de toro cocido a fuego lento con patatas y verduras', 18.95, 'carne', 'Apio'),
('Chuletón de buey', 'Impresionante chuletón de buey a la brasa con patatas y pimientos', 32.90, 'carne', 'Lactosa'),
('Cordero asado', 'Cordero asado con patatas y cebolla caramelizada', 19.75, 'carne', 'Lactosa'),
('Costillas BBQ', 'Costillas de cerdo a la BBQ con patatas fritas y ensalada', 16.20, 'carne', 'Lactosa, sulfitos'),
('Bistec a la plancha', 'Bistec de ternera a la plancha con patatas y ensalada', 14.95, 'carne', 'Lactosa'),
('Hamburguesa', 'Hamburguesa de ternera casera con patatas y ensalada', 13.50, 'carne', 'Gluten, lactosa'),
('Lomo de cerdo', 'Lomo de cerdo asado con patatas y ensalada', 15.25, 'carne', 'Lactosa'),
('Pollo al curry', 'Pollo en salsa de curry con arroz basmati', 13.95, 'carne', 'Lactosa'),
('Escalope de ternera', 'Escalope de ternera con patatas fritas y ensalada', 14.50, 'carne', 'Gluten, lactosa'),
("Salmón a la parrilla", "Salmón a la parrilla con limón y hierbas", 15.99, "pescado", "sin alérgenos"),
("Paella de marisco", "Arroz con mariscos y verduras", 22.50, "pescado", "sin alérgenos"),
("Lubina al horno", "Lubina al horno con patatas y tomate", 17.99, "pescado", "sin alérgenos"),
("Calamares a la romana", "Calamares rebozados y fritos", 10.50, "pescado", "contiene gluten"),
("Bacalao a la vizcaína", "Bacalao con salsa de tomate y pimientos", 19.99, "pescado", "sin alérgenos"),
("Sardinas a la parrilla", "Sardinas a la parrilla con aceite y limón", 13.50, "pescado", "sin alérgenos"),
("Trucha a la plancha", "Trucha a la plancha con ajo y perejil", 16.50, "pescado", "sin alérgenos"),
("Sopa de pescado", "Sopa de pescado con trozos de pescado, verduras y fideos", 8.99, "pescado", "sin alérgenos"),
("Boquerones en vinagre", "Boquerones marinados en vinagre y aceite de oliva", 7.50, "pescado", "sin alérgenos"),
("Rodaballo al horno", "Rodaballo al horno con patatas y cebolla", 21.99, "pescado", "sin alérgenos"),
("Brocheta de langostinos", "Brocheta de langostinos a la parrilla con verduras", 19.50, "pescado", "sin alérgenos"),
("Pepperoni", "Salsa de tomate, mozzarella y pepperoni", 10.99, "pizza", "Gluten, lactosa"),
("Cuatro quesos", "Salsa de tomate, mozzarella, gorgonzola, parmesano y provolone", 12.99, "pizza", "Gluten, lactosa"),
("Barbacoa", "Salsa barbacoa, mozzarella, pollo, bacon y cebolla", 12.99, "pizza", "Gluten, lactosa"),
("Mediterránea", "Salsa de tomate, mozzarella, aceitunas, cebolla, atún y tomate", 11.99, "pizza", "Gluten, lactosa, pescado"),
("Vegetariana", "Salsa de tomate, mozzarella, champiñones, pimiento, cebolla y aceitunas", 10.99, "pizza", "Gluten, lactosa"),
("Carbonara", "Salsa de nata, mozzarella, bacon y huevo", 12.99, "pizza", "Gluten, lactosa, huevo");

INSERT INTO dessert (name, description, price, allergens)
VALUES 
('Tarta de manzana', 'Deliciosa tarta de manzana casera', 3.50, 'Huevo, gluten'),
('Brownie', 'Tierno brownie de chocolate', 4.20, 'Frutos secos, soja'),
('Flan de vainilla', 'Suave y cremoso flan de vainilla', 2.75, 'Lactosa'),
('Tiramisú', 'Postre italiano de bizcochos y mascarpone', 5.00, 'Huevo, lactosa'),
('Mousse de chocolate', 'Espuma de chocolate negro y nata montada', 3.80, 'Huevo, lactosa'),
('Helado de vainilla', 'Clásico helado cremoso de vainilla', 2.00, 'Lactosa'),
('Helado de chocolate', 'Helado de fresa hecho con frutas frescas', 2.00, 'Lactosa'),
('Helado de fresa', 'Helado de fresa hecho con frutas frescas', 2.00, 'Lactosa'),
('Crema catalana', 'Postre típico catalán con caramelo quemado', 3.50, 'Huevo, lactosa'),
('Coulant de chocolate', 'Bomba de chocolate con corazón líquido', 4.75, 'Huevo, gluten'),
('Pastel de zanahoria', 'Bizcocho de zanahoria con frosting de queso', 4.25, 'Gluten, lactosa'),
('Cheesecake', 'Tarta de queso con mermelada de frutos rojos', 4.50, 'Huevo, gluten, lactosa'),
('Macedonia de frutas', 'Selección de frutas frescas cortadas en trozos', 3.00, 'Ninguno'),
('Arroz con leche', 'Postre tradicional de arroz con leche y canela', 3.25, 'Lactosa'),
('Natillas', 'Postre casero de leche, huevos y azúcar', 2.95, 'Huevo, lactosa'),
('Tarta de chocolate', 'Tarta de chocolate negro con base de galleta', 4.50, 'Gluten, lactosa'),
('Crepe de nutella', 'Crepe de harina de trigo rellena de nutella', 3.75, 'Gluten, lactosa');
