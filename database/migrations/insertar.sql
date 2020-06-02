

INSERT INTO servicio (id_servicio,nombre_servicio,mostrar,created_at,updated_at) VALUES (1,'ORTODONCIA',1,'2019-11-10','2019-11-10');
INSERT INTO servicio (id_servicio,nombre_servicio,mostrar,created_at,updated_at) VALUES (2,'ODONTOLOGÍA GENERAL',1,'2019-11-10','2019-11-10');
INSERT INTO servicio (id_servicio,nombre_servicio,mostrar,created_at,updated_at) VALUES (3,'ODONTOPEDIATRÍA',1,'2019-11-10','2019-11-10');
INSERT INTO servicio (id_servicio,nombre_servicio,mostrar,created_at,updated_at) VALUES (4,'IMPLANTOLOGÍA',1,'2019-11-10','2019-11-10');
INSERT INTO servicio (id_servicio,nombre_servicio,mostrar,created_at,updated_at) VALUES (5,'PERIODONCIA',1,'2019-11-10','2019-11-10');
INSERT INTO servicio (id_servicio,nombre_servicio,mostrar,created_at,updated_at) VALUES (6,'DISFUNCIÓN',1,'2019-11-10','2019-11-10');


INSERT INTO documento VALUES(1,'Fotocopia Carnet (Ambas parte)',1,'2019-10-12','2019-10-12');
INSERT INTO documento VALUES(2,'Ficha de Protección Social',1,'2019-10-12','2019-10-12');
INSERT INTO documento VALUES(3,'Certificado de AFP',1,'2019-10-12','2019-10-12');
INSERT INTO documento VALUES(4,'Liquidación de sueldo de los últimos 4 meses',1,'2019-10-12','2019-10-12');

INSERT INTO tipo_empleado VALUES(1,'Administrador','2019-10-12','2019-10-12');
INSERT INTO tipo_empleado VALUES(2,'Empleado','2019-10-12','2019-10-12');

INSERT INTO centro VALUES(1,'LindaSonrisa Central','Av 1234',1039,'2019-10-12','2019-10-12');


-- INSERT INTO familia (id_familia,nombre_familia,created_at,updated_at) VALUES (1,'Simple','2019-11-10','2019-11-10');
-- INSERT INTO tipo_producto (id_tipo_producto,nombre_tipo_producto,created_at,updated_at) VALUES (1,'simple','2019-11-10','2019-11-10');

-- INSERT INTO producto (id_producto,nombre_producto,descripcion,id_familia,id_tipo_producto,stock,stock_critico,created_at,updated_at,bloqueo,activo) VALUES (12,'Anestecia','',1,1,100,50,'2019-11-10','2019-11-10',0,1);
-- INSERT INTO producto (id_producto,nombre_producto,descripcion,id_familia,id_tipo_producto,stock,stock_critico,created_at,updated_at,bloqueo,activo) VALUES (13,'Pack Quirujico','',1,1,200,50,'2019-11-10','2019-11-10',0,1);
-- INSERT INTO producto (id_producto,nombre_producto,descripcion,id_familia,id_tipo_producto,stock,stock_critico,created_at,updated_at,bloqueo,activo) VALUES (14,'Mascarillas','',1,1,200,50,'2019-11-10','2019-11-10',0,1);
-- INSERT INTO producto (id_producto,nombre_producto,descripcion,id_familia,id_tipo_producto,stock,stock_critico,created_at,updated_at,bloqueo,activo) VALUES (15,'Guantes (par)','',1,1,400,100,'2019-11-10','2019-11-10',0,1);
-- INSERT INTO producto (id_producto,nombre_producto,descripcion,id_familia,id_tipo_producto,stock,stock_critico,created_at,updated_at,bloqueo,activo) VALUES (16,'Jeringa Corta','',1,1,100,50,'2019-11-10','2019-11-10',0,1);
-- INSERT INTO producto (id_producto,nombre_producto,descripcion,id_familia,id_tipo_producto,stock,stock_critico,created_at,updated_at,bloqueo,activo) VALUES (17,'Jeringa larga','',1,1,100,50,'2019-11-10','2019-11-10',0,1);
-- INSERT INTO producto (id_producto,nombre_producto,descripcion,id_familia,id_tipo_producto,stock,stock_critico,created_at,updated_at,bloqueo,activo) VALUES (18,'Vasos Desechables','',1,1,200,50,'2019-11-10','2019-11-10',0,1);
-- INSERT INTO producto (id_producto,nombre_producto,descripcion,id_familia,id_tipo_producto,stock,stock_critico,created_at,updated_at,bloqueo,activo) VALUES (19,'Jeringa Anestesica','',1,1,100,50,'2019-11-10','2019-11-10',0,1);
-- INSERT INTO producto (id_producto,nombre_producto,descripcion,id_familia,id_tipo_producto,stock,stock_critico,created_at,updated_at,bloqueo,activo) VALUES (20,'Algodón','',1,1,500,50,'2019-11-10','2019-11-10',0,1);
-- INSERT INTO producto (id_producto,nombre_producto,descripcion,id_familia,id_tipo_producto,stock,stock_critico,created_at,updated_at,bloqueo,activo) VALUES (22,'Caso Braket','',1,1,100,50,'2019-11-10','2019-11-10',0,1);
-- INSERT INTO producto (id_producto,nombre_producto,descripcion,id_familia,id_tipo_producto,stock,stock_critico,created_at,updated_at,bloqueo,activo) VALUES (23,'Cemento Quirujico','',1,1,100,50,'2019-11-10','2019-11-10',0,1);
-- INSERT INTO producto (id_producto,nombre_producto,descripcion,id_familia,id_tipo_producto,stock,stock_critico,created_at,updated_at,bloqueo,activo) VALUES (24,'Plufluorid (Fluor)','',1,1,100,50,'2019-11-10','2019-11-10',0,1);
-- INSERT INTO producto (id_producto,nombre_producto,descripcion,id_familia,id_tipo_producto,stock,stock_critico,created_at,updated_at,bloqueo,activo) VALUES (26,'Acido Ortofosforico','',1,1,100,50,'2019-11-10','2019-11-10',0,1);
-- INSERT INTO producto (id_producto,nombre_producto,descripcion,id_familia,id_tipo_producto,stock,stock_critico,created_at,updated_at,bloqueo,activo) VALUES (27,'Polofil Supra','',1,1,100,50,'2019-11-10','2019-11-10',0,1);
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (1,12,1,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (2,13,1,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (3,14,1,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (4,15,1,2,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (5,18,1,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (6,19,1,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (7,20,1,10,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (8,22,1,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (9,12,2,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (10,13,2,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (11,14,2,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (12,15,2,2,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (13,18,2,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (14,19,2,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (15,20,2,10,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (16,12,3,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (17,13,3,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (18,14,3,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (19,15,3,2,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (20,18,3,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (21,19,3,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (22,20,3,10,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (23,24,3,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (24,12,4,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (25,13,4,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (26,14,4,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (27,15,4,2,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (28,16,4,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (29,17,4,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (30,18,4,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (31,19,4,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (32,20,4,10,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (33,23,4,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (34,26,4,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (35,27,4,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (36,12,5,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (37,13,5,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (38,14,5,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (39,15,5,2,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (40,18,5,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (41,19,5,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (42,20,5,10,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (43,24,5,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (44,27,5,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (45,12,6,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (46,13,6,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (47,14,6,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (48,15,6,2,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (49,18,6,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (50,19,6,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (51,20,6,10,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (52,24,6,1,'2019-11-10','2019-11-10');
-- INSERT INTO detalle_servicio (id_detalle_servicio,id_producto,id_servicio,cantidad,created_at,updated_at) VALUES (53,27,6,1,'2019-11-10','2019-11-10');




-- insert into table_name
-- (date_field)
-- values
-- (TO_DATE('2003/05/03 21:02:44', 'yyyy/mm/dd hh24:mi:ss'));

INSERT INTO empleado VALUES(2,'admin1','12345','187500303','Leonardo Antonio','Romero Aguilera','98887678','leon.romero@example.com',1,0,1,'2019-11-10','2019-11-10');


INSERT INTO horario VALUES('10:00',1);
INSERT INTO horario VALUES('10:30',1);
INSERT INTO horario VALUES('11:00',1);
INSERT INTO horario VALUES('11:30',1);
INSERT INTO horario VALUES('12:00',1);
INSERT INTO horario VALUES('12:30',1);
INSERT INTO horario VALUES('13:00',1);
INSERT INTO horario VALUES('13:30',1);
INSERT INTO horario VALUES('14:00',1);
INSERT INTO horario VALUES('15:30',1);
INSERT INTO horario VALUES('16:00',1);
INSERT INTO horario VALUES('16:30',1);
INSERT INTO horario VALUES('17:00',1);
INSERT INTO horario VALUES('17:30',1);
