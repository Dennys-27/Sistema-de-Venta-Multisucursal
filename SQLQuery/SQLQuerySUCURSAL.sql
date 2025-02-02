--LISTAR TODAS LOS REGISTROS POR SUCURSAL

CREATE PROCEDURE SP_L_SUCURSAL_01
@EMP_ID INT
AS
BEGIN 
	SELECT * FROM [dbo].[TM_SUCURSAL]
	WHERE
	EMP_ID= @EMP_ID
	AND EST=1
END

-- MODIFICAR SP
--SP_HELPTEXT SP_LSUCURSAL_01
 
-- EJECUTAR SP
--EXEC SP_L_SUCURSAL_01 


-- OBTENER REGISTRO POR ID
CREATE PROCEDURE SP_L_SUCURSAL_02
@SUC_ID INT
AS
BEGIN 
	SELECT * FROM [dbo].[TM_SUCURSAL]
	WHERE
	SUC_ID = @SUC_ID
END


-- ELIMINAR REGISTRO 
CREATE PROCEDURE SP_D_SUCURSAL_01
@SUC_ID INT
AS
BEGIN 
	UPDATE [dbo].[TM_SUCURSAL]
	SET
		EST = 0
	WHERE
		SUC_ID = @SUC_ID
END


-- INSERTAR REGISTRO
CREATE PROCEDURE SP_I_SUCURSAL_01
@EMP_ID INT,
@SUC_NOM VARCHAR(150)
AS
BEGIN 
	INSERT INTO [dbo].[TM_SUCURSAL]
	(EMP_ID,SUC_NOM,FECH_CREA,EST)
	VALUES
	(@EMP_ID,@SUC_NOM,GETDATE(),1)
END


-- ACTUALIZAR NUEVO REGISTRO
CREATE PROCEDURE SP_U_SUCURSAL_01
@SUC_ID INT,
@EMP_ID INT,
@SUC_NOM VARCHAR(150)
AS
BEGIN 
	UPDATE TM_SUCURSAL
	SET
		EMP_ID = @SUC_ID,
		SUC_NOM = @SUC_NOM
	WHERE
		SUC_ID = @SUC_ID
END


SELECT * FROM TM_SUCURSAL