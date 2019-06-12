create database examen;
use examen;

create table grupos(
  id int auto_increment primary key,
  cuatrimestre int not null,
  nombre varchar(255) not null
);

create table anios_ingreso(
  id int auto_increment primary key,
  codigo varchar(100) not null
);

create table carreras(
  id int auto_increment primary key,
  nombre varchar(255) not null
);

create table alumnos(
  id int auto_increment primary key,
  matricurla varchar(10) unique,
  nombre varchar(255) not null,
  apellidos varchar(255) not null,
  carrera int not null,
  anio_ingreso int not null,
  grupo int not null
);

insert into anios_ingreso(codigo) values
('01_19'),
('02_19'),
('03_19');

insert into carreras(nombre) values
('Ing. en Tecnologias de la Informacion'),
('Ing. en Mecatronica'),
('Ing. en Sistemas Automotrices'),
('Ing. en Tecnologias de Manufactura'),
('Lic. en Gestion y Administracion de Pequenas y Medianas Empresas');