CREATE database tuto ;

use tuto;


CREATE TABLE products (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(45) NOT NULL,
  price FLOAT NOT NULL DEFAULT 0,
  PRIMARY KEY (id));
  
  INSERT INTO products
(name,price)
VALUES
('tourelle de defense','150.20'),
('tourelle de niveau 3','120');

select * from products;

