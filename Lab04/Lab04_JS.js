var filas;
var numero;
var arr = [];
var neg = 0, zero = 0, pos = 0;
var respuesta = "";
var str = "";

function desplegarRespuesta(respuesta)
{
    document.getElementById("respuesta").innerHTML = respuesta
}

function leerArreglo()
{
    arr = prompt("Introduce números separados por coma", "-1,0,1");
    arr = arr.split(",")
    arr.forEach(contador);
}

function hacerTabla(filas) {
    
    var tabla = document.getElementById("Tabla");
    var i, cuadrado, cubo;
    
    var row = tabla.insertRow(0); 
    var cell1 = row.insertCell(0);
    cell1.innerHTML = "Cubo";
    var cell2 = row.insertCell(0);
    cell2.innerHTML = "Cuadrado";
    var cell3 = row.insertCell(0);
    cell3.innerHTML = "i";
    
    var num = prompt("Introduce un número para ver una tabla");
    
    for(i = 1; i <= num; i++)
        {
            cuadrado = Math.pow(i,2);
            cubo = Math.pow(i,3);
            
            row = tabla.insertRow();
            cell1 = row.insertCell();
            cell2 = row.insertCell();
            cell3 = row.insertCell();
            
            cell1.innerHTML = String(i);
            cell2.innerHTML = String(cuadrado);
            cell3.innerHTML = String(cubo);
        }
}

function sumaDosNumeros(){
    
    var numero1 = Math.floor(Math.random() * 100);
    var numero2 = Math.floor(Math.random() * 100);
    
    var secs = Date.now();
    
    var respuesta = prompt("¿Cuánto es el resultado de sumar " + String(numero1) + " y " + String(numero2));
        
    if(respuesta == (numero1 + numero2))
    {
        var secs1 = Date.now();
        str = "Correcto, tardaste " + ((secs1 - secs)/1000) + " segundos en responder!";
    }
    else
    {
        str = "Lo siento, intenta de nuevo";
    }
    
    desplegarRespuesta(str);
}

function contador(item){
    
    if(item < 0){
        neg++;
    }
    else if(item == 0){
        zero++;
    }
    else{
        pos++;
    }
    
    str = "Arreglo = " + arr.toString() + "<br> Negativos = " + String(neg) + "<br> Positivos = " + String(pos) + "<br> Cero = " + String(zero);
    
    desplegarRespuesta(str);
}

function sacarPromedio()
{
    var i, sumaTotal = 0;
    
    for(i = 0; i < arr.length; i++)
        {
            sumaTotal = sumaTotal + parseInt(arr[i]);
        }
    
    
    var res = sumaTotal/arr.length;
    str = "El promedio es " + String(res);
    desplegarRespuesta(str);
}

function inverso(){
    
    var num = prompt("Introduce un número a invertir");
    
    num = num.split("").reverse().join("");
    
    str = "El número volteado es " + num;
    desplegarRespuesta(str)
}

function numerosPrimos()
{
    var aux1, aux2, aux3, res = 0;        
    var num = prompt("Introduce el límite");
    
    str = "Los números primos hasta " + String(num) + " son:    ";
    
    desplegarRespuesta(str);
    
    for(aux1 = 1; aux1 <= num; aux1++)
        {
            for(aux2 = 1; aux2 <= aux1; aux2++)
                {
                    res = aux1%aux2;
                    if(res == 0)
                        {
                            aux3 = aux3 + 1;
                        }
                }
            if(aux3 == 2)
                {
                    str = str + String(aux1) + ", ";
                }
            aux3 = 0;
        }
    
    desplegarRespuesta(str);
}


//Pruebas