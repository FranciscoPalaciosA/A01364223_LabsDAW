SET DATEFORMAT dmy

BULK INSERT Entregan
   FROM 'e:\wwwroot\a1364423\entregan.csv'
   WITH
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )