IF EXISTS(SELECT *
          FROM INFORMATION_SCHEMA.TABLES
          WHERE TABLE_NAME = 'Realizan_Movimientos')
  drop TABLE Realizan_Movimientos
IF EXISTS(SELECT *
          FROM INFORMATION_SCHEMA.TABLES
          WHERE TABLE_NAME = 'Clientes_Banca')
  drop TABLE Clientes_Banca
IF EXISTS(SELECT *
          FROM INFORMATION_SCHEMA.TABLES
          WHERE TABLE_NAME = 'Tipos_Movimiento')
  drop TABLE Tipos_Movimiento


CREATE TABLE Clientes_Banca (
  NoCuenta varchar(5) not null PRIMARY KEY,
  Nombre   varchar(30),
  Saldo    numeric(10, 2)
)

CREATE TABLE Tipos_Movimiento (
  ClaveM      varchar(2) not null PRIMARY KEY,
  Descripcion varchar(30)
)

CREATE TABLE Realizan_Movimientos (
  NoCuenta varchar(5) not null,
  ClaveM   varchar(2) not null,
  Fecha    datetime,
  Monto    numeric(10, 2),


  CONSTRAINT PK_Realizan_Movimientos PRIMARY KEY (NoCuenta, ClaveM),

  CONSTRAINT FK_Clientes_Banca_Realizan_Movimientos FOREIGN KEY (NoCuenta) REFERENCES Clientes_Banca (NoCuenta),
  CONSTRAINT FK_Tipos_Movimiento_Realizan_Movimientos FOREIGN KEY (ClaveM) REFERENCES Tipos_Movimiento (ClaveM)
)



--/////////////////////////////////////////////
--/////////////////////////////////////////////
--/////////////////////////////////////////////

BEGIN TRANSACTION PRUEBA1
INSERT INTO CLIENTES_BANCA VALUES ('001', 'Manuel Rios Maldonado', 9000);
INSERT INTO CLIENTES_BANCA VALUES ('002', 'Pablo Perez Ortiz', 5000);
INSERT INTO CLIENTES_BANCA VALUES ('003', 'Luis Flores Alvarado', 8000);
COMMIT TRANSACTION PRUEBA1

SELECT *
FROM CLIENTES_BANCA

-- ¿Que pasa cuando deseas realizar esta consulta?
-- Desde usuario 1, no se puede hacer la consulta porque hay una transacción
-- en usuario 2 en proceso. Desde usuario 2, Sí se puede observar
-- la información completa de la tabla.


BEGIN TRANSACTION PRUEBA3
INSERT INTO TIPOS_MOVIMIENTO VALUES ('A', 'Retiro Cajero Automatico');
INSERT INTO TIPOS_MOVIMIENTO VALUES ('B', 'Deposito Ventanilla');
COMMIT TRANSACTION PRUEBA3


BEGIN TRANSACTION PRUEBA4
INSERT INTO Realizan_Movimientos VALUES ('001', 'A', GETDATE(), 500);
UPDATE CLIENTES_BANCA
SET SALDO = SALDO - 500
WHERE NoCuenta = '001'
COMMIT TRANSACTION PRUEBA4

-- ////////////////////////////
-- ////////////////////////////
-- ////////////////////////////
-- ////////////////////////////

BEGIN TRANSACTION PRUEBA5
INSERT INTO CLIENTES_BANCA VALUES ('005', 'Rosa Ruiz Maldonado', 9000);
INSERT INTO CLIENTES_BANCA VALUES ('006', 'Luis Camino Ortiz', 5000);
INSERT INTO CLIENTES_BANCA VALUES ('001', 'Oscar Perez Alvarado', 8000);


IF @@ERROR = 0
  COMMIT TRANSACTION PRUEBA5
ELSE
  BEGIN
    PRINT 'A transaction needs to be rolled back'
    ROLLBACK TRANSACTION PRUEBA5
  END

-- ¿Para qué sirve el comando @@ERROR revisa la ayuda en línea?
-- Es como una variable que sirve para ver si existe algún error,
-- en este caso dentro de la transacción.
--
-- ¿Explica qué hace la transacción?
-- Trata de insertar registros en Clientes_Banca.
--
-- ¿Hubo alguna modificación en la tabla? Explica qué pasó y por qué.
-- No porque hubo un error en la transaccion por lo que se hizo un
-- ROLLBACK.


IF EXISTS(SELECT name
          FROM sysobjects
          WHERE name = 'procedimiento' AND type = 'P')
  DROP PROCEDURE procedimiento
GO

CREATE PROCEDURE procedimiento
    @uNoCuenta varchar(5),
    @uMonto    numeric(10, 2)
AS
  BEGIN TRANSACTION REGISTRAR_RETIRO_CAJERO
  INSERT INTO Realizan_Movimientos VALUES (@uNoCuenta, 'A', GETDATE(), @uMonto);
  UPDATE CLIENTES_BANCA
  SET SALDO = SALDO - @uMonto
  WHERE NoCuenta = @uNoCuenta

  IF @@ERROR = 0
    COMMIT TRANSACTION REGISTRAR_RETIRO_CAJERO
  ELSE
    BEGIN
      PRINT 'A transaction needs to be rolled back'
      ROLLBACK TRANSACTION REGISTRAR_RETIRO_CAJERO
    END
GO

procedimiento '003',1000

-- ////////////////////////////

IF EXISTS(SELECT name
          FROM sysobjects
          WHERE name = 'procedimiento2' AND type = 'P')
  DROP PROCEDURE procedimiento2
GO

CREATE PROCEDURE procedimiento2
    @uNoCuenta varchar(5),
    @uMonto    numeric(10, 2)
AS
  BEGIN TRANSACTION REGISTRAR_DEPOSITO_VENTANILLA
  INSERT INTO Realizan_Movimientos VALUES (@uNoCuenta, 'B', GETDATE(), @uMonto);
  UPDATE CLIENTES_BANCA
  SET SALDO = SALDO + @uMonto
  WHERE NoCuenta = @uNoCuenta

  IF @@ERROR = 0
    COMMIT TRANSACTION REGISTRAR_DEPOSITO_VENTANILLA
  ELSE
    BEGIN
      PRINT 'A transaction needs to be rolled back'
      ROLLBACK TRANSACTION REGISTRAR_DEPOSITO_VENTANILLA
    END
GO

procedimiento2 '002',1300