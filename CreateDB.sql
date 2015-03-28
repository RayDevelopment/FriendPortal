
CREATE DATABASE friendportal;
CREATE TABLE accounts(
username varchar(255) NOT NULL,
hash varchar(255) NOT NULL,
first-name varchar(255) NOT NULL,
last-name varchar(255) NOT NULL,
PRIMARY KEY (username)
)
