
DROP PROCEDURE IF EXISTS proce_select_cliente_id:
delimiter ;;
















CREATE PROCEDURE proce_select_cliente_id(IN idx int)
BEGIN
    SELECT * FROM ficha_cliente WHERE id_ficha_cliente = idx;
END ;

delimiter ;;
