create database proprak4;
use proprak4;

drop table emails;
drop table users;
drop table abonnees;

create table emails 
(
email varchar(255) primary key not null,
content TEXT(1000) not null
);

create table users
(
userId varchar(255) primary key not null,
password varchar(255) not null,
email varchar(255),
isadmin boolean
);

create table abonnees
(
    email varchar(255)
);
