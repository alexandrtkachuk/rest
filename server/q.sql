DROP TABLE IF EXISTS carshop_cars ;
CREATE TABLE carshop_cars (id INT NOT NULL AUTO_INCREMENT , 
    price FLOAT , 
    title VARCHAR(128),
    color VARCHAR(32),
    maxSpeed INT,
    year INT,
    engineSize float,
    image VARCHAR(128),
    idManufacturer INT,
    PRIMARY KEY (id) );

DROP TABLE IF EXISTS carshop_users;
CREATE TABLE carshop_users (id INT NOT NULL AUTO_INCREMENT ,
    name VARCHAR(32),
    pass VARCHAR(128),
    email VARCHAR(64),
    role INT,
    token VARCHAR(128),
    PRIMARY KEY (id) );



DROP TABLE IF EXISTS carshop_orders ;
CREATE TABLE carshop_orders (id INT NOT NULL AUTO_INCREMENT ,
    idUser INT ,
    idPayment INT,
    idCar   INT, 
    PRIMARY KEY (id) );


DROP TABLE IF EXISTS carshop_payment;
CREATE TABLE carshop_payment (id INT NOT NULL AUTO_INCREMENT , name VARCHAR(32) ,  
    PRIMARY KEY (id) );

DROP TABLE IF EXISTS carshop_category;
CREATE TABLE carshop_category (id INT NOT NULL AUTO_INCREMENT , name VARCHAR(32) ,  
    PRIMARY KEY (id) );



DROP TABLE IF EXISTS carshop_manufacturer;
CREATE TABLE carshop_manufacturer (id INT NOT NULL AUTO_INCREMENT , name VARCHAR(32) ,  
    PRIMARY KEY (id) );



INSERT INTO carshop_users (name , pass , email , role ) VALUES ( 'admin', MD5('admin'), 'admin@mail.ru',0);
INSERT INTO carshop_users (name , pass , email , role ) VALUES ( 'test', MD5('test'), 'test@mail.ru',1);

INSERT INTO carshop_payment (name) VALUES ( 'credit card');
INSERT INTO carshop_payment (name) VALUES ( 'real money');

INSERT INTO carshop_manufacturer (name  ) VALUES ( 'BMW');
INSERT INTO carshop_manufacturer (name  ) VALUES ( 'Mersedes');
INSERT INTO carshop_manufacturer (name  ) VALUES ( 'Opel');
INSERT INTO carshop_cars (price ,title , color , maxSpeed, year, engineSize, image, idManufacturer ) 
VALUES ( 2000, 'bmw X5', 'red', 200,2005,2.5, 'test.jpg',1);

INSERT INTO carshop_cars (price ,title , color , maxSpeed, year, engineSize, image, idManufacturer ) 
VALUES ( 2500, 'bmw X6', 'black', 205,2010,3.0, 'test.jpg',1);

INSERT INTO carshop_cars (price ,title , color , maxSpeed, year, engineSize, image, idManufacturer ) 
VALUES ( 3000, '600', 'black', 220,2010,2.5, 'test.jpg',2);

INSERT INTO carshop_cars (price ,title , color , maxSpeed, year, engineSize, image, idManufacturer ) 
VALUES ( 1500, 'Omega', 'black', 220,2010,2.0, 'test.jpg',3);

INSERT INTO carshop_cars (price ,title , color , maxSpeed, year, engineSize, image, idManufacturer ) 
VALUES ( 1200, 'Astra', 'black', 200,2009,1.5, 'test.jpg',3);

INSERT INTO carshop_cars (price ,title , color , maxSpeed, year, engineSize, image, idManufacturer ) 
VALUES ( 1700, '3m', 'black', 220,2011,2.0, 'test.jpg',1);


