DROP DATABASE IF EXISTS NorthernWear;

CREATE DATABASE NorthernWear;
USE NorthernWear;

CREATE TABLE customer (
  customer_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  fname varchar(100) NOT NULL,
  lname varchar(100) NOT NULL,
  street_address varchar(200) NOT NULL,
  city varchar(100) NOT NULL,
  state varchar(100) NOT NULL,
  postal_code varchar(100) NOT NULL,
  phone varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE product (
  product_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  product_name varchar(100) NOT NULL,
  product_category varchar(100) NOT NULL,
  product_qty int(11) NOT NULL,
  product_price int(11) NOT NULL,
  image blob
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


CREATE TABLE orders (
  order_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  payment_type varchar(100) NOT NULL,
  card_number varchar(100) NOT NULL,
  card_holder_name varchar(100) NOT NULL,
  expiry_year varchar(100) NOT NULL,
  expiry_month varchar(100) NOT NULL,
  cvv varchar(100) NOT NULL,
  product_id int(11) NOT NULL,
  FOREIGN KEY (product_id) REFERENCES product(product_id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


select * from orders;
select * from product;
select * from customer;

