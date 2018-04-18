
Create database aragonskills;
Use aragonskills;


Create table pelicula(
id_pelicula int primary key auto_increment,
imagen varchar(500),
link varchar(500),
titulo varchar(500) unique,
posicion int,
rating float,
reparto varchar(500),
voto varchar(500),
anno varchar (500)
);