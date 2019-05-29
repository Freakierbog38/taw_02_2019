create database recupractica6;
use recupractica6;

create table carrera(
    id int auto_increment primary key,
    nombre varchar(255) not null
);

create table alumnos(
    id int auto_increment primary key,
    matricula varchar(7) unique,
    nombre varchar(255) not null,
    apellidos varchar(255) not null,
    carrera int not null,
    email varchar(255) not null,
    foreign key (carrera) references carrera(id)
);

create table maestros(
    id int auto_increment primary key,
    numero varchar(100) unique,
    nombre varchar(255) not null,
    apellidos varchar(255) not null,
    email varchar(255) not null,
    carrera int not null,
    foreign key (carrera) references carrera(id)
);

insert into carrera(nombre) values ('Ing. en Tecnologias de la Informacion');
insert into carrera(nombre) values ('Ing. Mecatronica');
insert into carrera(nombre) values ('Ing. en Sistemas Automotrices');
insert into carrera(nombre) values ('Ing. en Tecnologias de Manufactura');
insert into carrera(nombre) values ('Lic. en Administracion y Gestion de Pequenas y Medianas Empresas');