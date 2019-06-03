create database practica7;
use practica7;

create table carrera(
    id int auto_increment primary key,
    nombre varchar(255) not null
);

create table maestros(
    id int auto_increment primary key,
    numero varchar(100) unique,
    nombre varchar(255) not null,
    apellidos varchar(255) not null,
    email varchar(255) not null,
    password varchar(255) not null,
    nivel int not null,
    carrera int not null,
    foreign key (carrera) references carrera(id)
);

create table alumnos(
    id int auto_increment primary key,
    matricula varchar(7) unique,
    nombre varchar(255) not null,
    apellidos varchar(255) not null,
    carrera int not null,
    tutor int not null,
    foreign key (carrera) references carrera(id),
    foreign key (tutor) references maestros(id)
);

create table materias_catalogo(
    id int auto_increment primary key,
    nombre varchar(255) not null
);

create table grupos(
    id int auto_increment primary key,
    nombre varchar(255) not null
);

create table materias(
    id int auto_increment primary key,
    id_materia int not null,
    id_grupo int not null,
    id_maestro int not null,
    foreign key (id_materia) references materias_catalogo(id),
    foreign key (id_grupo) references grupos(id),
    foreign key (id_maestro) references maestros(id)
);

create table materia_alumnos(
    id int auto_increment primary key,
    id_materia int not null,
    id_alumno int not null,
    foreign key (id_alumno) references alumnos(id),
    foreign key (id_materia) references materias(id)
);

CREATE TABLE sesion_tutoria(
  id int(11) auto_increment primary key,
  fecha date NOT NULL,
  hora time NOT NULL,
  tipo varchar(128) NOT NULL,
  tema varchar(128) NOT NULL,
  maestro int NOT NULL,
  foreign key (maestro) references maestros(id)
);

CREATE TABLE sesion_alumnos (
  id int auto_increment primary key,
  alumno int NOT NULL,
  id_sesion int NOT NULL,
  foreign key (alumno) references alumnos(id),
  foreign key (id_sesion) references sesion_tutoria(id)
);

insert into carrera(nombre) values
('Ing. en Tecnologias de la Informacion'),
('Ing. en Mecatronica'),
('Ing. en Sistemas Automotrices'),
('Ing. en Tecnologias de Manufactura'),
('Lic. en Administracion y Gestion de Pequenas y Medianas Empresas');

insert into materias_catalogo(nombre) values
('Matematicas Basicas'),
('Algoritmos'),
('Estructura de Datos'),
('Tecnologias y Aplicaciones Web'),
('Matematicas Discretas');

INSERT INTO maestros (numero, nombre, apellidos, email, password, carrera, nivel) VALUES
('1450002', 'Juan', 'Torres', 'jt@upv.edu.mx', '12345', 1, 0),
('1500231', 'Ramon', 'Hernandez Rodriguez', 'superadmin@upv.edu.mx', 'superadmin', 1, 1),
('1500235', 'Jose', 'Ramirez Perez', 'maestro@upv.edu.mx', 'maestro', 1, 0),
('1523122', 'Carlos', 'Perales', 'ca@upv.edu.mx', '12345', 2, 0),
('1540213', 'Pedro', 'Perales', 'pe@upv.edu.mx', '12345', 1, 1),
('1550002', 'Jose', 'Carrizales', 'jose@upv.edu.mx', '12345', 2, 0);

INSERT INTO alumnos (matricula, nombre, apellidos, carrera, tutor) VALUES
('1530012', 'Carla', 'Perez', 1, 3),
('1530019', 'Pedro', 'Perales', 1, 3),
('1530031', 'Ana', 'Gomez', 1, 3),
('1530061', 'Erick', 'Elizondo Rodriguez', 2, 3),
('1530201', 'Luis', 'Perales', 1, 6);

INSERT INTO sesion_tutoria (id, fecha, hora, tipo, tema, maestro) VALUES
(86, '2018-05-28', '15:12:00', 'Grupal', 'Internet', 3),
(87, '2018-05-30', '17:55:00', 'Grupal', 'Tecnologias', 3),
(88, '2018-05-18', '01:05:00', 'Grupal', 'Ciencias', 6);

INSERT INTO sesion_alumnos (alumno, id_sesion) VALUES
(1, 86),
(2, 86),
(4, 87),
(3, 87),
(5, 88);