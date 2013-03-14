DROP  DATABASE  IF EXISTS  FASHION_SPORT;

CREATE  DATABASE  IF NOT EXISTS  FASHION_SPORT;

USE FASHION_SPORT;

CREATE TABLE IF NOT EXISTS USERS (
  id_user int(11) NOT NULL AUTO_INCREMENT,
  email VARCHAR(64) NOT NULL,
  password VARCHAR(32) NOT NULL,
  first_name VARCHAR( 64 ) NOT NULL,
  last_name VARCHAR( 64 ) NOT NULL,
  phone_number VARCHAR( 20 ) NOT NULL,
  country VARCHAR( 30 ) NOT NULL,
  area VARCHAR( 30 ) NOT NULL,
  city VARCHAR( 30 ) NOT NULL,
  post_code INT NOT NULL,
  address VARCHAR( 100 ) NOT NULL,
  PRIMARY KEY (id_user)
);

CREATE TABLE IF NOT EXISTS PRODUCTS_META (
  id_product INT NOT NULL AUTO_INCREMENT,
  id_category INT NOT NULL,
  discount INT, 
  price INT NOT NULL,
  pic VARCHAR( 100 ) NOT NULL,
  PRIMARY KEY ( id_product)
 )DEFAULT CHARSET=utf8;	
 
 CREATE TABLE IF NOT EXISTS PRODUCTS_LANG (
  id_product INT NOT NULL AUTO_INCREMENT,
  id_lange ENUM('en','bg','fr'),
  name VARCHAR( 100 ) NOT NULL,
  color VARCHAR( 100 ) NOT NULL, 
  description VARCHAR( 300 ) NOT NULL,
  PRIMARY KEY ( id_product,id_lange ),
  FOREIGN KEY ( id_product ) REFERENCES PRODUCTS_META( id_product )
 )DEFAULT CHARSET=utf8;
 
 CREATE TABLE IF NOT EXISTS PRODUCTS_INFO (
  id_product INT NOT NULL AUTO_INCREMENT,
  size_product VARCHAR( 5 ) NOT NULL,
  quantity INT,
  PRIMARY KEY ( id_product,size_product)
 )DEFAULT CHARSET=utf8;
 
 CREATE TABLE IF NOT EXISTS ORDERS (
  id_product INT NOT NULL ,
  id_user INT NOT NULL,
  quantity INT ,
  size_product VARCHAR( 5 ) NOT NULL,
  payed INT,
  PRIMARY KEY ( id_product,id_user,size_product,payed),
  FOREIGN KEY ( id_product,size_product ) REFERENCES PRODUCTS_INFO( id_product,size_product ),
  FOREIGN KEY ( id_user ) REFERENCES USERS( id_user )
)DEFAULT CHARSET=utf8;
