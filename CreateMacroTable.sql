use keto_tracker;

DROP TABLE IF EXISTS macroVars;

CREATE TABLE macroVars
(
primary_key INT NOT NULL AUTO_INCREMENT,
NetCarbs DECIMAL(5,2),
Fats DECIMAL(5,2),
Proteins DECIMAL(5,2),
PRIMARY KEY (primary_key)
);