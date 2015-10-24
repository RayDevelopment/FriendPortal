
CREATE DATABASE friendportal;

CREATE TABLE accounts(
username varchar(255) NOT NULL,
hash varchar(255) NOT NULL,

first-name varchar(255) NOT NULL,
last-name varchar(255) NOT NULL,

age-year tinyint(255) NOT NULL,
age-month ENUM('JANUARY', 'FEBRUARY', 'MARCH', 'APRIL', 'MAY', 'JUNE', 'JULY', 'AUGUST', 'SEPTEMBER', 'OCTOBER', 'NOVEMBER', 'DECEMBER') NOT NULL,
age-day tinyint(255) NOT NULL,

PRIMARY KEY (username)
)

CREATE TABLE profile(
username varchar(255) NOT NULL,
description longtext NOT NULL,

PRIMARY KEY (username)
)
