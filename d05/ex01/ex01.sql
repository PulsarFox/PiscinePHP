CREATE TABLE ft_table
(
id int PRIMARY KEY AUTO_INCREMENT,
login char(8) DEFAULT 'toto',
groupe ENUM('staff','student','other') NOT NULL,
date_creation DATE NOT NULL
);
