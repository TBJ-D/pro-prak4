create database proprak4;
use proprak4;

create table emails 
(
email varchar(255) primary key not null unique
);

create table users
(
userId int primary key not null auto_increment,
username varchar(255) not null,
password varchar(255) not null,
email varchar(255)
);
