
INSERT INTO Materiales values(1000, 'xxx', 1000)
Delete from Materiales where Clave = 1000 and Costo = 1000

ALTER TABLE Materiales add constraint llaveMateriales PRIMARY KEY (Clave)

sp_helpconstraint materiales

ALTER TABLE Proveedores add constraint llaveProveedores PRIMARY KEY (RFC)
ALTER TABLE Proyectos add constraint llaveProyectos PRIMARY KEY (Numero)

ALTER TABLE Entregan add constraint llaveEntregan PRIMARY KEY (Clave,RFC,Numero,Fecha)


INSERT INTO entregan values (0, 'xxx', 0, '1-jan-02', 0)

Delete from Entregan where Clave = 0

ALTER TABLE entregan add constraint cfentreganclave
  foreign key (clave) references materiales(clave)

ALTER TABLE entregan add constraint cf2entreganclave
  foreign key (RFC) references Proveedores(RFC)

ALTER TABLE entregan add constraint cf3entreganclave
  foreign key (Numero) references Proyectos(Numero)

sp_helpconstraint entregan

INSERT INTO entregan values (1000, 'AAAA800101', 5000, GETDATE(), 0)

Delete from Entregan where Cantidad = 0

 ALTER TABLE entregan add constraint cantidad check (cantidad > 0)


/Users/FranciscoPalacios/Library/Preferences/DataGrip2017.3/consoles/db/ea11c243-c7ff-4dae-920b-438c1f8500d4/Lab12.sqll