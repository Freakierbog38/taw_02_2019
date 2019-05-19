create database practica5;
use practica5;

create table usuarios(
    usuario varchar(255) not null primary key,
    password varchar(100) not null
);

create table productos(
    id int auto_increment primary key,
    nombre varchar(255) not null,
    precio int not null,
    cantidad int not null
);

insert into usuarios values ('admin', 'admin123');