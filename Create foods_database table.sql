CREATE TABLE foods_database
(
primary_key INT NOT NULL AUTO_INCREMENT,
food_name CHAR(100),
category CHAR(100),
net_carbs DECIMAL(5,2),
fat DECIMAL(5,2),
protein DECIMAL(5,2),
serving_size CHAR(100),
PRIMARY KEY (primary_key)
);

INSERT INTO foods_database(food_name, category, net_carbs, fat, protein, serving_size) VALUES ('Blueberries', 'Fruits', 12, 0, 1, '1 cup');
INSERT INTO foods_database(food_name, category, net_carbs, fat, protein, serving_size) VALUES ('Strawberries', 'Fruits', 10, 0, 1, '1 cup, sliced');
INSERT INTO foods_database(food_name, category, net_carbs, fat, protein, serving_size) VALUES ('Salmon', 'Proteins', 0, 13, 23, '4 oz');
INSERT INTO foods_database(food_name, category, net_carbs, fat, protein, serving_size) VALUES ('Chicken Breast', 'Proteins', 0, 1.4, 26.1, '4 oz');
INSERT INTO foods_database(food_name, category, net_carbs, fat, protein, serving_size) VALUES ('Coconut Oil', 'Fats', 0, 14, 0, '1 tablespoon');
INSERT INTO foods_database(food_name, category, net_carbs, fat, protein, serving_size) VALUES ('Avocado', 'Fats', 4, 29, 4, '1 avocado');
