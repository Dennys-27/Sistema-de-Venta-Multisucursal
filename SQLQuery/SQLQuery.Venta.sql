--TODO:Para crear el ID de la Venta
CREATE PROCEDURE SP_I_VENTA_01
@SUC_ID INT,
@USU_ID INT
AS
BEGIN
SET NOCOUNT ON
	INSERT INTO TM_VENTA 
	(SUC_ID,USU_ID,EST)
	VALUES
	(@SUC_ID,@USU_ID,2)

	SELECT VENT_ID FROM TM_VENTA WHERE VENT_ID=@@IDENTITY
SET NOCOUNT OFF
END

--TODO: Para Insertar Detalle
CREATE PROCEDURE SP_I_VENTA_02
@VENT_ID INT,
@PROD_ID INT,
@PROD_PVENTA NUMERIC(18,2),
@DETV_CANT INT
AS
BEGIN
	INSERT TD_VENTA_DETALLE
	(VENT_ID,PROD_ID,PROD_PVENTA,DETV_CANT,DETV_TOTAL,FECH_CREA,EST)
	VALUES
	(@VENT_ID,@PROD_ID,@PROD_PVENTA,@DETV_CANT,@PROD_PVENTA * @DETV_CANT,GETDATE(),1)
END

--TODO:Listar Detalle de Venta
CREATE PROCEDURE SP_L_VENTA_01 
@VENT_ID INT
AS
BEGIN
	SELECT        
	TD_VENTA_DETALLE.DETV_ID, 
	TM_CATEGORIA.CAT_NOM, 
	TM_PRODUCTO.PROD_NOM, 
	TM_UNIDAD.UND_NOM, 
	TD_VENTA_DETALLE.PROD_PVENTA,
	TD_VENTA_DETALLE.DETV_CANT, 
	TD_VENTA_DETALLE.DETV_TOTAL, 
	TD_VENTA_DETALLE.VENT_ID, 
	TD_VENTA_DETALLE.PROD_ID
	FROM            
	TD_VENTA_DETALLE INNER JOIN
	TM_PRODUCTO ON TD_VENTA_DETALLE.PROD_ID = TM_PRODUCTO.PROD_ID INNER JOIN
	TM_CATEGORIA ON TM_PRODUCTO.CAT_ID = TM_CATEGORIA.CAT_ID INNER JOIN
	TM_UNIDAD ON TM_PRODUCTO.UND_ID = TM_UNIDAD.UND_ID
	WHERE
	TD_VENTA_DETALLE.VENT_ID = @VENT_ID
	AND TD_VENTA_DETALLE.EST=1
END

--TODO: Eliminar Detall de Venta
CREATE PROCEDURE SP_D_VENTA_01
@DETV_ID INT
AS
BEGIN
	UPDATE TD_VENTA_DETALLE
	SET
		EST=0
	WHERE
		DETV_ID = @DETV_ID
END

--TODO: Calcular y actualizar Detalle de Venta
CREATE PROCEDURE SP_U_VENTA_01
@VENT_ID INT
AS
BEGIN
SET NOCOUNT ON
	UPDATE TM_VENTA
	SET
		VENT_SUBTOTAL = (SELECT SUM(DETV_TOTAL) AS VENT_SUBTOTAL FROM TD_VENTA_DETALLE WHERE VENT_ID=@VENT_ID AND EST=1),
		VENT_IGV = (SELECT SUM(DETV_TOTAL) AS VENT_SUBTOTAL FROM TD_VENTA_DETALLE WHERE VENT_ID=@VENT_ID AND EST=1) * 0.18,
		VENT_TOTAL = (SELECT SUM(DETV_TOTAL) AS VENT_SUBTOTAL FROM TD_VENTA_DETALLE WHERE VENT_ID=@VENT_ID AND EST=1) + ((SELECT SUM(DETV_TOTAL) AS VENT_SUBTOTAL FROM TD_VENTA_DETALLE WHERE VENT_ID=@VENT_ID AND EST=1) * 0.18)
	WHERE
		VENT_ID = @VENT_ID

	SELECT 
		VENT_SUBTOTAL,
		VENT_IGV,
		VENT_TOTAL 
	FROM 
		TM_VENTA
	WHERE
		VENT_ID = @VENT_ID
SET NOCOUNT OFF
END

--TODO: Listar Venta
CREATE PROCEDURE SP_L_VENTA_02
@VENT_ID INT
AS
BEGIN
SELECT        
TM_VENTA.VENT_ID, 
TM_VENTA.SUC_ID, 
TM_VENTA.PAG_ID, 
TM_VENTA.CLI_ID, 
TM_VENTA.CLI_RUC, 
TM_VENTA.CLI_DIRECC, 
TM_VENTA.CLI_CORREO, 
TM_VENTA.VENT_SUBTOTAL, 
TM_VENTA.VENT_IGV, 
TM_VENTA.VENT_TOTAL, 
TM_VENTA.VENT_COMENT, 
TM_VENTA.USU_ID, 
TM_VENTA.MON_ID, 
TM_VENTA.FECH_CREA, 
TM_VENTA.EST, 
TM_SUCURSAL.SUC_NOM, 
TM_EMPRESA.EMP_NOM, 
TM_EMPRESA.EMP_RUC, 
TM_EMPRESA.EMP_CORREO, 
TM_EMPRESA.EMP_TELF, 
TM_EMPRESA.EMP_DIRECC, 
TM_EMPRESA.EMP_PAG, 
TM_COMPANIA.COM_NOM, 
TM_USUARIO.USU_CORREO, 
TM_USUARIO.USU_NOM, 
TM_USUARIO.USU_APE, 
TM_USUARIO.USU_DNI, 
TM_USUARIO.USU_TELF, 
TM_ROL.ROL_NOM, 
TM_PAGO.PAG_NOM, 
TM_MONEDA.MON_NOM,
TM_CLIENTE.CLI_NOM
FROM            
TM_VENTA INNER JOIN
TM_SUCURSAL ON TM_VENTA.SUC_ID = TM_SUCURSAL.SUC_ID INNER JOIN
TM_EMPRESA ON TM_SUCURSAL.EMP_ID = TM_EMPRESA.EMP_ID INNER JOIN
TM_COMPANIA ON TM_EMPRESA.COM_ID = TM_COMPANIA.COM_ID INNER JOIN
TM_USUARIO ON TM_VENTA.USU_ID = TM_USUARIO.USU_ID INNER JOIN
TM_ROL ON TM_USUARIO.ROL_ID = TM_ROL.ROL_ID INNER JOIN
TM_PAGO ON TM_VENTA.PAG_ID = TM_PAGO.PAG_ID INNER JOIN
TM_MONEDA ON TM_VENTA.MON_ID = TM_MONEDA.MON_ID INNER JOIN
TM_CLIENTE ON TM_VENTA.CLI_ID = TM_CLIENTE.CLI_ID
WHERE  
TM_VENTA.VENT_ID = @VENT_ID
END


--TODO: Guardar venta
CREATE PROCEDURE SP_U_VENTA_03
@VENT_ID INT,  
@PAG_ID INT,  
@CLI_ID INT,  
@CLI_RUC VARCHAR(20),  
@CLI_DIRECC VARCHAR(150),  
@CLI_CORREO VARCHAR(150),  
@VENT_COMENT VARCHAR(250),  
@MON_ID INT  
AS  
BEGIN  
 UPDATE TM_VENTA  
 SET  
  PAG_ID = @PAG_ID,  
  CLI_ID = @CLI_ID,  
  CLI_RUC = @CLI_RUC,  
  CLI_DIRECC = @CLI_DIRECC,  
  CLI_CORREO = @CLI_CORREO,  
  VENT_COMENT = @VENT_COMENT,  
  MON_ID = @MON_ID,  
  FECH_CREA = GETDATE(),  
  EST = 1  
 WHERE  
  VENT_ID = @VENT_ID  
   
 DECLARE @ID_REGISTRO INT  
 DECLARE @PROD_ID INT  
 DECLARE @CANT INT  
  
 DECLARE CUR CURSOR FOR SELECT DETV_ID FROM TD_VENTA_DETALLE WHERE VENT_ID=@VENT_ID  
 OPEN CUR  
 FETCH NEXT FROM CUR INTO @ID_REGISTRO  
 WHILE @@FETCH_STATUS=0  
  BEGIN  
   SELECT @PROD_ID=PROD_ID FROM TD_VENTA_DETALLE WHERE DETV_ID = @ID_REGISTRO  
     
   SELECT @CANT=DETV_CANT FROM TD_VENTA_DETALLE WHERE DETV_ID = @ID_REGISTRO  
  
   UPDATE TM_PRODUCTO  
   SET  
    PROD_STOCK = PROD_STOCK - @CANT  
   WHERE  
    PROD_ID = @PROD_ID  
  
   FETCH NEXT FROM CUR INTO @ID_REGISTRO  
  END  
 CLOSE CUR  
 DEALLOCATE CUR  
END

--TODO: Listado por sucursal
CREATE PROCEDURE SP_L_VENTA_03  
@SUC_ID INT  
AS  
BEGIN  
 SELECT          
 TM_VENTA.VENT_ID,   
 TM_VENTA.SUC_ID,   
 TM_VENTA.PAG_ID,   
 TM_VENTA.CLI_ID,   
 TM_VENTA.CLI_RUC,   
 TM_VENTA.CLI_DIRECC,   
 TM_VENTA.CLI_CORREO,   
 TM_VENTA.VENT_SUBTOTAL,   
 TM_VENTA.VENT_IGV,   
 TM_VENTA.VENT_TOTAL,   
 TM_VENTA.VENT_COMENT,   
 TM_VENTA.USU_ID,   
 TM_VENTA.MON_ID,   
 TM_VENTA.FECH_CREA,   
 TM_VENTA.EST,   
 TM_SUCURSAL.SUC_NOM,   
 TM_EMPRESA.EMP_NOM,   
 TM_EMPRESA.EMP_RUC,   
 TM_EMPRESA.EMP_CORREO,   
 TM_EMPRESA.EMP_TELF,   
 TM_EMPRESA.EMP_DIRECC,   
 TM_EMPRESA.EMP_PAG,   
 TM_COMPANIA.COM_NOM,   
 TM_USUARIO.USU_CORREO,   
 TM_USUARIO.USU_NOM,   
 TM_USUARIO.USU_APE,   
 TM_USUARIO.USU_DNI,   
 TM_USUARIO.USU_TELF,   
 TM_ROL.ROL_NOM,   
 TM_PAGO.PAG_NOM,   
 TM_MONEDA.MON_NOM,  
 TM_CLIENTE.CLI_NOM  
 FROM              
 TM_VENTA INNER JOIN  
 TM_SUCURSAL ON TM_VENTA.SUC_ID = TM_SUCURSAL.SUC_ID INNER JOIN  
 TM_EMPRESA ON TM_SUCURSAL.EMP_ID = TM_EMPRESA.EMP_ID INNER JOIN  
 TM_COMPANIA ON TM_EMPRESA.COM_ID = TM_COMPANIA.COM_ID INNER JOIN  
 TM_USUARIO ON TM_VENTA.USU_ID = TM_USUARIO.USU_ID INNER JOIN  
 TM_ROL ON TM_USUARIO.ROL_ID = TM_ROL.ROL_ID INNER JOIN  
 TM_PAGO ON TM_VENTA.PAG_ID = TM_PAGO.PAG_ID INNER JOIN  
 TM_MONEDA ON TM_VENTA.MON_ID = TM_MONEDA.MON_ID INNER JOIN  
 TM_CLIENTE ON TM_VENTA.CLI_ID = TM_CLIENTE.CLI_ID  
 WHERE  
 TM_VENTA.EST=1  
 AND TM_VENTA.SUC_ID = @SUC_ID  
END