use php_05_advanced;

CREATE TABLE parks
(
    id      INT AUTO_INCREMENT,
    address VARCHAR(255) NOT NULL UNIQUE,
    PRIMARY KEY (id)
);

CREATE TABLE cars
(
    id      INT AUTO_INCREMENT,
    park_id INT,
    model   VARCHAR(255) NOT NULL,
    price   FLOAT        NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (park_id) REFERENCES parks (id)
);

CREATE TABLE drivers
(
    id     INT AUTO_INCREMENT,
    car_id INT,
    name   VARCHAR(100) NOT NULL,
    phone  VARCHAR(20)  NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (car_id) REFERENCES cars (id)
);

CREATE TABLE customers
(
    id    INT AUTO_INCREMENT,
    name  VARCHAR(100) NOT NULL,
    phone VARCHAR(20)  NOT NULL,
    PRIMARY KEY (id)
);


CREATE TABLE orders
(
    id          INT AUTO_INCREMENT,
    driver_id   INT,
    customer_id INT,
    start       DATE  NOT NULL,
    finish      DATE  NOT NULL,
    total       FLOAT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (driver_id) REFERENCES drivers (id),
    FOREIGN KEY (customer_id) REFERENCES customers (id)
);