use keto_tracker;

DROP TABLE IF EXISTS foods_database;

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

INSERT INTO foods_database VALUES 
('1', 'Blueberries', 'Fruits', '12', '0', '1', '1 cup'),
('2', 'Strawberries', 'Fruits', '10', '0', '1', '1 cup, sliced'),
('3', 'Salmon', 'Proteins', '0', '13', '23', '4 oz'),
('4', 'Chicken Breast', 'Proteins', '0', '1.4', '26.1', '4 oz'),
('5', 'Coconut Oil', 'Fats', '0', '14', '0', '1 tablespoon'),
('6', 'Avocado', 'Fats', '4', '29', '4', '1 avocado');
