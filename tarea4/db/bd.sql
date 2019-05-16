create database tarea4;
use tarea4;

create table user_type(
    id int auto_increment primary key,
    nombre varchar(255) not null
);

create table estatus(
    id int auto_increment primary key,
    nombre varchar(255) not null
);

create table user(
    id int auto_increment primary key,
    email varchar(100) not null,
    pssw varchar(50) not null,
    estatus_id int not null,
    user_type_id int not null,
    foreign key (estatus_id) references estatus(id),
    foreign key (user_type_id) references user_type(id)
);

create table User_log(
    id int auto_increment primary key,
    date_logged date not null,
    user_id int not null,
    foreign key (user_id) references user(id)
);

insert into `estatus`(`nombre`) values ('Activo');
insert into `estatus`(`nombre`) values ('Inactivo');

insert into `user_type`(`nombre`) values ('Tipo de usuario 1');
insert into `user_type`(`nombre`) values ('Tipo de usuario 2');

insert into `user`(`email`,`pssw`,`estatus_id`,`user_type_id`) values ('correo1@email.com', 'contra123', 1, 1);
insert into `user`(`email`,`pssw`,`estatus_id`,`user_type_id`) values ('correo2@email.com', 'contra456', 2, 2);
insert into `user`(`email`,`pssw`,`estatus_id`,`user_type_id`) values ('correo3@email.com', 'contra789', 1, 2);
insert into `user`(`email`,`pssw`,`estatus_id`,`user_type_id`) values ('correo4@email.com', 'contra150', 2, 1);

insert into `User_log`(`date_logged`,`user_id`) values ('2019-05-15', 1);
insert into `User_log`(`date_logged`,`user_id`) values ('2019-05-15', 2);

create table sport_team(
    id int primary key,
    nombre varchar(255) not null,
    posicion varchar(255) not null,
    carrera varchar(255) not null,
    correo varchar(255) not null,
    id_type int not null
);