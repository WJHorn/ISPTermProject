use keto_tracker;

DROP TABLE IF EXISTS foods_consumed;

CREATE TABLE foods_consumed
(
primary_key INT NOT NULL AUTO_INCREMENT,
food_name CHAR(100),
servings_eaten DECIMAL(5,2),
serving_size CHAR(100),
net_carbs DECIMAL(5,2),
fat DECIMAL(5,2),
protein DECIMAL(5,2),
time_consumed DATETIME,
PRIMARY KEY (primary_key)
);