use php_05_advanced;

# 1. Видалення однієї з таблиць
DROP TABLE IF EXISTS orders;

# 2. Модифікація поля таблиці (наприклад, поле типу datetime, стало date (або зміна імені поля) )
ALTER TABLE drivers
    ADD COLUMN salary FLOAT NOT NULL,
    RENAME COLUMN name TO first_name;

ALTER TABLE customers
    RENAME COLUMN name TO first_name;

# 3. Заповнення кожної таблиці хоча б по 3-5 записів
INSERT INTO parks (address)
VALUES ('Kyiv, 1st str, 1'),
       ('Kyiv, 2nd str, 2'),
       ('Kyiv, 3rd str, 3');
INSERT INTO cars (park_id, model, price)
VALUES (1, 'BMW', 10000),
       (2, 'Audi', 8000),
       (3, 'Mercedes', 12000);
INSERT INTO drivers (car_id, first_name, phone, salary)
VALUES (1, 'Andrii', '+380123456789', 1000),
       (2, 'Serhii', '+380987654321', 900),
       (3, 'Anton', '+380232334443', 1100);
INSERT INTO customers (first_name, phone)
VALUES ('Mykola', '+380123456789'),
       ('Petro', '+380987654321'),
       ('Oleg', '+380123456789');

# 4. Модифікації будь-якого запису
UPDATE drivers
SET phone = '+380666666666'
WHERE phone = '+380123456789';

# 5. Видалення запису з таблиці
DELETE
FROM customers
WHERE first_name = 'Oleg';

# 6. Ну і пару різних запитів до бази даних (маю на увазі SELECT)
SELECT *
FROM parks;

SELECT *
FROM drivers
WHERE drivers.first_name = 'Andrii';

# 7. 1-2 приклади Join запиту
SELECT drivers.first_name, cars.model
FROM drivers
         JOIN cars ON drivers.car_id = cars.id;

# 8. Додати/змінити колонку за допомогою команди ALTER TABLE
ALTER TABLE drivers
    ADD COLUMN last_name VARCHAR(100);
ALTER TABLE customers
    ADD COLUMN last_name VARCHAR(100);