BULK INSERT Proveedores
   FROM 'e:\wwwroot\a1364423\proveedores.csv'
   WITH
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )