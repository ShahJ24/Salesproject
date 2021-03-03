DROP DATABASE IF EXISTS NorthernWear;

CREATE DATABASE NorthernWear;
USE NorthernWear;


CREATE TABLE login (
  login_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username varchar(100) NOT NULL,
  password varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO login VALUES
(1, 'admin', 'admin');

CREATE TABLE customer (
  customer_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  customer_name varchar(100) NOT NULL,
  street_address varchar(200) NOT NULL,
  city varchar(100) NOT NULL,
  country varchar(100) NOT NULL,
  postal_code varchar(100) NOT NULL,
  phone varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE customer
  ADD COLUMN fname varchar(100) NOT NULL;
  
ALTER TABLE customer
  ADD COLUMN lname varchar(100) NOT NULL;
  
ALTER TABLE customer
  DROP COLUMN customer_name;
  
ALTER TABLE customer
  DROP COLUMN country;
  
ALTER TABLE customer
  ADD COLUMN state varchar(100) NOT NULL;
  
CREATE TABLE product (
  product_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  product_name varchar(100) NOT NULL,
  product_category varchar(100) NOT NULL,
  product_qty int(11) NOT NULL,
  product_price int(11) NOT NULL,
  image blob,
  cust_products int(11) NOT NULL,
  FOREIGN KEY (cust_products) REFERENCES customer(customer_id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


CREATE TABLE orders (
  order_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  payment_type varchar(100) NOT NULL,
  item_purchased int(11) NOT NULL,
  order_date varchar(30) NOT NULL,
  prod_orders int(11) NOT NULL,
  FOREIGN KEY (prod_orders) REFERENCES product(product_id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


select * from orders;
select * from Product;
select * from customer;
select * from login;

ALTER TABLE orders
  DROP COLUMN order_date;
  
ALTER TABLE orders
  ADD COLUMN ordered_name varchar(30) NOT NULL;  
  
select * from orders;