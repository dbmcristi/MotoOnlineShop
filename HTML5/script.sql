CREATE TABLE user
( id int(5) NOT NULL AUTO_INCREMENT,
  username varchar(25) NOT NULL,
  password varchar(30) NOT NULL,
  phone  varchar(15) NOT NULL,
  type  varchar(10) NOT NULL,
  address  varchar(200),
  PRIMARY KEY(id),
  UNIQUE (username)
);

CREATE TABLE product
( id int(5) NOT NULL AUTO_INCREMENT,
  model varchar(200) NOT NULL,
  price varchar(30) NOT NULL,
  image BLOB,
  PRIMARY KEY(id)
);

CREATE TABLE vendor_product
( id int(5) NOT NULL AUTO_INCREMENT,
  user_id int(5) NOT NULL,
  product_id int(5) NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (user_id) REFERENCES user(id),
  FOREIGN KEY (product_id) REFERENCES product(id)
);