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
('6', 'Avocado', 'Fats', '4', '29', '4', '1 avocado'),
('7', 'Blackberries', 'Fruits', '6', '0.7', '2', '1 cup'),
('8', 'Lemon', 'Fruits', '3.4', '0.2', '0.6', '1 lemon'),
('9', 'Lime', 'Fruits', '5.1', '0.1', '0.5', '1 lime'),
('10', 'Mango', 'Fruits', '14', '0.4', '0.8', '1 mango'),
('11', 'Peach', 'Fruits', '11.7', '0.4', '1.4', '1 peach'),
('12', 'Raspberries', 'Fruits', '7', '0.8', '1.5', '1 cup'),
('13', 'Asparagus', 'Vegetables', '2.2', '0.2', '2.9', '1 cup'),
('14', 'Bell Pepper', 'Vegetables', '3.3', '0.2', '0.8', '1 bell pepper'),
('15', 'Broccoli', 'Vegetables', '4.5', '0.3', '2.8', '1 lime'),
('16', 'Brussels Sprouts', 'Vegetables', '4.8', '0.3', '2.9', '1 cup'),
('17', 'Carrot', 'Vegetables', '3', '0.1', '0.4', '1 cup'),
('18', 'Cucumber', 'Vegetables', '3.2', '0.2', '0.6', '1 cup'),
('19', 'Green Beans', 'Vegetables', '3.6', '0.1', '1.8', '1 cup'),
('20', 'Jalapeno', 'Vegetables', '0.5', '0.1', '0.1', '1 pepper'),
('21', 'Lettuce', 'Vegetables', '1', '0.2', '1', '1 cup'),
('22', 'Onion', 'Vegetables', '8.1', '0.1', '1.2', '1 onion'),
('23', 'Pickle', 'Vegetables', '0.7', '0.1', '0.2', '1 pickle'),
('24', 'Spinach', 'Vegetables', '0.4', '0.1', '0.8', '1 cup'),
('25', 'Tomato', 'Vegetables', '3.3', '1.1', '0.3', '1 tomato'),
('26', 'Zucchini', 'Vegetables', '4', '0.6', '2.4', '1 zucchini'),
('27', 'Almonds', 'Snacks', '2.7', '14.2', '6.1', '1 oz'),
('28', 'Almond Butter', 'Snacks', '1.4', '9', '3', '1 tbsp'),
('29', 'Macadamia Nuts', 'Snacks', '1.5', '21', '2.2', '1 oz'),
('30', 'Pecans', 'Snacks', '1.2', '20', '2.6', '1 oz'),
('31', 'Walnuts', 'Snacks', '1.9', '18.3', '4.3', '1 oz'),
('32', 'Coffee', 'Drinks', '0', '0', '0.3', '8 oz'),
('33', 'Beer', 'Drinks', '12', '0', '1.5', '12 oz'),
('34', 'Coconut Milk', 'Drinks', '0.5', '3.6', '0.5', '1 tbsp'),
('35', 'Milk', 'Drinks', '12', '2.4', '8', '1 cup'),
('36', 'Red Wine', 'Drinks', '3.8', '0', '0.1', '5 oz'),
('37', 'Butter', 'Fats', '0', '12', '0.1', '1 tbsp'),
('38', 'Olive Oil', 'Fats', '0', '14', '0', '1 tbsp'),
('39', 'Vegetable Oil', 'Fats', '0', '14', '0', '1 tbsp'),
('40', 'Beef', 'Proteins', '0', '23', '19', '4 oz'),
('41', 'Bacon', 'Proteins', '0.1', '3.3', '3', '1 slice'),
('42', 'Eggs', 'Proteins', '0.4', '4.8', '6', '1 egg'),
('43', 'Pork', 'Proteins', '0', '16', '30', '4 oz'),
('44', 'Turkey Breast', 'Proteins', '0.2', '1.7', '27', '1 tbsp');






