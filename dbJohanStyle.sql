create database dbJohanStyle;
use dbJohanStyle;

create table proveedor(
idProveedor int not null primary key auto_increment,
nombres varchar(60) not null,
apellidos varchar(60) not null,
telefono varchar(10) not null,
correo varchar(90 )not null,
documento varchar(10) not null,
tipoDocumento varchar(30) not null
);

create table cliente(
idCliente int not null primary key auto_increment,
nombresClientes varchar(60)not null,
apellidosClientes varchar(60)not null,
direccion varchar(60)not null,
correo varchar(90)not null,
telefono varchar(10)not null,
documento varchar(10)not null,
tipoDocumento varchar(10) not null
);

create table salida(
idSalida int not null primary key auto_increment,
fechaSalida date not null,
cantidad int not null,
precio double not null,
precioTotal double not null,
idCliente int not null,
idProducto int not null
);

create table producto (
idProducto int not null primary key auto_increment,
nombreProducto varchar(60) not null,
existencia varchar(60) not null,
marca varchar(60) not null,
precio double not null,
ultimoCosto double not null
);

create table entrada (
idEntrada int not null primary key auto_increment,
fechaEntrada date not null ,
cantidad int not null,
precio double not null,
precioTotal double not null,
idProveedor int not null,
idProducto int not null
);

create table iniciarsesion(
	usuario varchar(11) not null,
    correo varchar(11) not null,
    clave varchar(11) not null
);

/*RELACIONES DE LAS TABLAS */
alter table salida add foreign key (idCliente) references cliente(idCLiente);
alter table salida add foreign key (idProducto) references producto(idProducto);
alter table entrada add foreign key (idProveedor) references proveedor(idProveedor);
alter table entrada add foreign key (idProducto) references producto(idProducto);

/*Insercion de datos */

/*Tabla Proveedor*/
insert into proveedor values (123, 'Marcos', 'Gomez', '3023756498', 'marcos12@gmail.com', '26700987', 'cedula');
insert into proveedor values (4567, 'Laura', 'Moreno', '3185555845', 'laura45@gmail.com', '1072296745', 'cedula');
insert into proveedor values (7413, 'Michel', 'Quiroga', '3170705645', 'quiroga35@gmail.com', '1040701152', 'cedula');
insert into proveedor values (8521, 'Jhon', 'Peña', '3257965400', 'jhonpeña@gmail.com', '1000013938', 'cedula');
insert into proveedor values (8912, 'Paula ', 'Lasso', '3147856477', 'paula75@gmail.com', '1021219001', 'T.I');

/*Tabla cliente*/

insert into cliente values (1234, 'Leslie ', 'Rosa ', 'calle 12 N50 ', 'leslie19@gmail.com', '3023559460', '1030701152', 'cedula');
insert into cliente values (4567, 'Brian ', 'Morales', 'calle 45b#75-45', 'brianmorales@gmail.com', '3187965845', '1075896745', 'cedula');
insert into cliente values (7412, 'Lady', 'Morce ', 'calle75#80-95', 'lady04@gmail.com', '3157965400', '1000012938', 'cedula');
insert into cliente values (8521, 'Reina', 'Marces', 'calle5a#75-78', 'reina1201@gmail.com', '3208945645', '1030700152', 'cedula');
insert into cliente values (8912, 'Katia', 'Trucazo', 'calle 75a#75-85', 'tracazo12@gmail.com', '3147556477', '1075987456', 'cedula');

/*Tabla producto */

insert into producto values (12, 'shampoo', '10', 'marcel france', 33.9, 25);
insert into producto values ( 13, 'acondicionador', '10', 'marcel france', 23.9, 25);
insert into producto values (14, 'keratina', '10', 'marcel france', 180, 200);
insert into producto values (15, 'aceite de argan', '5', 'marcel france', 35, 40);
insert into producto values (16, 'Gel Brillo ', '5', ' marcel france', 23, 30);

/*Tabla entrada*/

insert into entrada values(1, '2021-08-02',3, 33.9, 101.7, 8521, 12);
insert into entrada values(2, '2021-08-10', 4, 23.9, 95.6, 4567, 13);
insert into entrada values(3, '2021-08-17', 4, 180, 720, 123, 14);
insert into entrada values(4, '2021-08-24', 2, 35, 70, 7413, 15);
insert into entrada values(5, '2021-08-31', 3, 23, 69, 8912, 16);
describe entrada;
/*Tabla Salida*/

insert into salida values (25, '2021-08-20', 2, 35, 70, 1234, 15);
insert into salida values (123, '2021-08-05', 3, 33.9, 101.7, 4567, 12);
insert into salida values (2598, '2021-08-27', 2, 23, 46, 8521, 16);
insert into salida values (4567, '2021-08-06', 4, 23.9, 95.6, 8912, 13);
insert into salida values (8912, '2021-08-13', 5, 180, 900, 7412, 14);

/*tabla iniciar sesion*/
insert into iniciarsesion values('paula20', 'paula20@gma', '0123');
insert into iniciarsesion values('leslie99', 'leslie99@gm', '4567');
insert into iniciarsesion values('maicol24', 'maicol24@gm', '7412');
insert into iniciarsesion values('jhonny75', 'jhonny75@gm', '8520');
insert into iniciarsesion values('laura15', 'laura15@gma', '0012');

/*CONSULTAS CON EL INNER JOIN*/

/*Saber cuantos productos entraron en cierta fecha determinada y el nombre del proveedor*/
select concat(p.nombres, " ", p.apellidos ) as 'Nombre proveedor', e.fechaEntrada, e.cantidad, r.nombreProducto 
from proveedor p inner join entrada e 
on p.idProveedor = e.idProveedor 
inner join producto r 
on r.idProducto = e.idProducto 
order by r.nombreProducto ASC; 

/*Saber cuantos dias llevan los productos en el almacen*/
select p.nombreProducto, datediff(CURRENT_DATE(),e.fechaEntrada) as 'Cantidad de dias en el almacen'
from entrada e inner join producto p 
on e.idProducto = p.idProducto;



/*Salida de la persona a quien se le vendio el producto*/
select s.fechaSalida as 'Fecha Salida', p.nombreProducto, s.cantidad, s.precioTotal,
concat(c.nombresClientes," " ,c.apellidosClientes) as 'Nombre Cliente'
from cliente c inner join salida s 
on c.idCliente = s.idCliente 
inner join producto p 
on p.idProducto = s.idProducto;


/*Producto con mayor a menor valor de venta.*/
select nombreProducto, precio
from producto group by precio desc ;











