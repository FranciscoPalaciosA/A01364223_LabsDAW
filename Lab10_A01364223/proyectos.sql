BULK INSERT Proyectos
   FROM 'e:\wwwroot\a1364423\proyectos.csv'
   WITH
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )