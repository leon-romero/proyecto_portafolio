DROP PROCEDURE IF EXISTS `proce_buscar_cliente`;
delimiter ;;
CREATE PROCEDURE `proce_buscar_cliente` (IN idx int)
BEGIN
	SELECT * FROM ficha_cliente WHERE id_ficha_cliente = idx;
END
 ;;
delimiter ;


DROP PROCEDURE IF EXISTS `proce_buscar_clientes`;
delimiter ;;
CREATE PROCEDURE `proce_buscar_clientes` ()
BEGIN
	SELECT * FROM ficha_cliente;
END
 ;;
delimiter ;


DROP PROCEDURE IF EXISTS `proce_boleta_servicios`;
delimiter ;;
CREATE PROCEDURE `proce_boleta_servicios` ()
BEGIN
	SELECT * FROM boleta_servicio;
END
 ;;
delimiter ;

DROP PROCEDURE IF EXISTS `proce_ficha_proveedores`;
delimiter ;;
CREATE PROCEDURE `proce_ficha_proveedores` ()
BEGIN
	SELECT * FROM ficha_proveedor;
END
 ;;
delimiter ;


DROP PROCEDURE IF EXISTS `proce_odontologos`;
delimiter ;;
CREATE PROCEDURE `proce_odontologos` ()
BEGIN
	SELECT * FROM odontologo;
END
 ;;
delimiter ;


DROP PROCEDURE IF EXISTS `proce_documentos`;
delimiter ;;
CREATE PROCEDURE `proce_documentos` ()
BEGIN
	SELECT * FROM documento;
END
 ;;
delimiter ;


DROP PROCEDURE IF EXISTS `proce_productos_proveedor`;
delimiter ;;
CREATE PROCEDURE `proce_productos_proveedor` (IN idp int)
BEGIN
	SELECT * FROM producto pro JOIN detalle_proveedor detalle USING(id_producto) WHERE detalle.id_ficha_proveedor = idp;
END
 ;;
delimiter ;



DROP PROCEDURE IF EXISTS `procedure_horario_tomadas`;
delimiter ;;
CREATE PROCEDURE `procedure_horario_tomadas` (IN fechav date)
BEGIN
	SELECT * FROM horario hor JOIN reservar_hora reserhora USING(id_horario) WHERE reserhora.fecha_reserva = fechav;
END
 ;;
delimiter ;
