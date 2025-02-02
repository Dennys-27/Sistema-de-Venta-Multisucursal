--LISTAR TODAS LOS REGISTROS POR SUCURSAL

CREATE PROCEDURE SP_L_UNIDAD_01
@SUC_ID INT
AS
BEGIN 
	SELECT * FROM [dbo].[TM_UNIDAD]
	WHERE
	SUC_ID= @SUC_ID
	AND EST=1
END

-- MODIFICAR SP
--SP_HELPTEXT SP_LUNIDAD_01
 
-- EJECUTAR SP
--EXEC SP_L_UNIDAD_01 


-- OBTENER REGISTRO POR ID
CREATE PROCEDURE SP_L_UNIDAD_02
@UND_ID INT
AS
BEGIN 
	SELECT * FROM [dbo].[TM_UNIDAD]
	WHERE
	UND_ID = @UND_ID
END


-- ELIMINAR REGISTRO 
CREATE PROCEDURE SP_D_UNIDAD_01
@UND_ID INT
AS
BEGIN 
	UPDATE [dbo].[TM_UNIDAD]
	SET
		EST = 0
	WHERE
		UND_ID = @UND_ID
END


-- INSERTAR REGISTRO
CREATE PROCEDURE SP_I_UNIDAD_01
@SUC_ID INT,
@UND_NOM VARCHAR(150)
AS
BEGIN 
	INSERT INTO [dbo].[TM_UNIDAD]
	(SUC_ID,UND_NOM,FECH_CREA,EST)
	VALUES
	(@SUC_ID,@UND_NOM,GETDATE(),1)
END


-- ACTUALIZAR NUEVO REGISTRO
CREATE PROCEDURE SP_U_UNIDAD_01
@UND_ID INT,
@SUC_ID INT,
@UND_NOM VARCHAR(150)
AS
BEGIN 
	UPDATE TM_UNIDAD
	SET
		SUC_ID = @SUC_ID,
		UND_NOM = @UND_NOM
	WHERE
		UND_ID = @UND_ID
END


SELECT * FROM TM_UNIDAD