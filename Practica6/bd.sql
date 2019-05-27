create database practica6;
use practica6;

create table tipo_cliente(
    id int auto_increment primary key,
    nombre varchar(255) not null
);

create table tipo_habitacion(
    id int auto_increment primary key,
    nombre varchar(255) not null
);

create table clientes(
    id int auto_increment primary key,
    nombre varchar(255) not null,
    email varchar(255) not null,
    edad int not null,
    tipo int not null,
    foreign key (tipo) references tipo_cliente(id)
);

create table habitaciones(
    id int auto_increment primary key,
    numero varchar(255) not null,
    precio int not null,
    descripcion text,
    tipo int not null,
    foreign key (tipo) references tipo_habitacion(id)
);

create table reservaciones(
    id int auto_increment primary key,
    cliente int not null,
    habitacion int not null,
    dias int not null,
    fecha_inicio date not null,
    fecha_fin date not null,
    total int,
    foreign key (cliente) references clientes(id),
    foreign key (habitacion) references habitaciones(id)
);

create table usuarios(
    nombre varchar(255) primary key,
    password varchar(255) not null
);

insert into usuarios(nombre, password) values ('admin', 'admin123');

insert into tipo_cliente(nombre) values ('Esporadico');
insert into tipo_cliente(nombre) values ('Habitual');

insert into tipo_habitacion(nombre) values ('Simple');
insert into tipo_habitacion(nombre) values ('Doble');
insert into tipo_habitacion(nombre) values ('Matrimonial');