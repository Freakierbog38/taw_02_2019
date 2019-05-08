create database practica2;
use practica2;
create table persona(
    id int auto_increment primary key,
    nombre varchar(255),
    edad int,
    peso int,
    altura int,
    imc int
);