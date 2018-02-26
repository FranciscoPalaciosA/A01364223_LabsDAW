--Razón Social y Denominación de proyecto en donde se haya
-- entregado materiales con un costo mayor a 500 y se hayan
-- entregado mas de 20 unidades

SELECT RazonSocial, Denominacion, SUM(Cantidad) as 'Total de unidades'
FROM Proyectos P, Entregan E, Materiales M, Proveedores Pr
WHERE M.Clave = E.Clave AND Pr.RFC = E.RFC AND P.Numero = E.Numero
AND M.Costo > 500
GROUP BY RazonSocial, Denominacion
HAVING SUM(E.Cantidad) > 20
ORDER BY [Total de unidades]


--El RFC de los proveedores que entregaron alguna pintura a proyectos realizados este año
SET DATEFORMAT dmy
SELECT RazonSocial, Descripcion, COUNT(RazonSocial) as 'Total de entregas'
FROM Entregan E, Materiales M, Proveedores P
WHERE E.Clave = M.Clave AND P.RFC = E.RFC
AND M.Descripcion LIKE '%pintura%'
GROUP BY RazonSocial, Descripcion
--AND E.Fecha between '01/01/2000' AND GETDATE()
