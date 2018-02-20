BULK INSERT Materiales
   FROM 'e:\wwwroot\a1364423\materiales.csv'
   WITH
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )