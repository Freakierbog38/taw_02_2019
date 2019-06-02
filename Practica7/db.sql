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
    tutor int not null,
    email varchar(255) not null,
    foreign key (carrera) references carrera(id),
    foreign key (tutor) references maestros(id)
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

CREATE TABLE sesion_tutoria (
  id int(11) NOT NULL,
  fecha date NOT NULL,
  hora time NOT NULL,
  tipo varchar(128) NOT NULL,
  tema varchar(128) NOT NULL,
  maestro int NOT NULL,
  foreign key (tutor) references maestros(id)
);

CREATE TABLE sesion_alumnos (
  alumno int NOT NULL,
  id_sesion int(11) NOT NULL,
  foreign key (alumno) references alumnos(id),
  foreign key (id_sesion) references sesion_tutoria(id)
);

insert into carrera(nombre) values
('Ing. en Tecnologias de la Informacion'),
('Ing. en Mecatronica'),
('Ing. en Sistemas Automotrices'),
('Ing. en Tecnologias de Manufactura'),
('Lic. en Administracion y Gestion de Pequenas y Medianas Empresas');

INSERT INTO maestros (num_empleado, nombre, email, password, id_carrera, nivel) VALUES
('1450002', 'Juan Torres', 'jt@upv.edu.mx', '12345', 1, 0),
('1500231', 'Ramon Hernandez Rodriguez', 'superadmin@upv.edu.mx', 'superadmin', 1, 1),
('1500235', 'Jose Ramirez Perez', 'maestro@upv.edu.mx', 'maestro', 1, 0),
('1523122', 'Carlos Perales', 'ca@upv.edu.mx', '12345', 2, 0),
('1540213', 'Pedro Perales', 'pe@upv.edu.mx', '12345', 1, 1),
('1550002', 'Jose Carrizales', 'jose@upv.edu.mx', '12345', 2, 0);

INSERT INTO alumnos (matricula, nombre, id_carrera, id_tutor) VALUES
('1530012', 'Carla Perez', 1, '1500235'),
('1530019', 'Pedro Perales', 1, '1500235'),
('1530031', 'Ana Gomez', 1, '1500235'),
('1530061', 'Erick Elizondo Rodriguez', 2, '1500235'),
('1530201', 'Luis Perales', 1, '1550002');

INSERT INTO sesion_tutoria (id, fecha, hora, tipo, tema, num_maestro) VALUES
(86, '2018-05-28', '15:12:00', 'Grupal', 'Internet', '1500235'),
(87, '2018-05-30', '17:55:00', 'Grupal', 'Tecnologias', '1500235'),
(88, '2018-05-18', '01:05:00', 'Grupal', 'Ciencias', '1550002');

INSERT INTO sesion_alumnos (matricula_alumno, id_sesion) VALUES
('1530012', 86),
('1530019', 86),
('1530061', 87),
('1530031', 87),
('1530201', 88);