use keto_tracker;

DROP TABLE IF EXISTS macroVars;

CREATE TABLE macroVars
(
primary_key INT NOT NULL AUTO_INCREMENT,
Age INT(3),
Gender CHAR(1),
Height DECIMAL(3,2),
Weight INT(3),
PRIMARY KEY (primary_key)
);