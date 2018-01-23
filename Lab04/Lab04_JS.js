var filas;
var numero;
var arr = [-1, 2, 4, 0, 0, -2, -5, 0, 5, 4, -1];
var neg = 0, zero = 0, pos = 0;

function hacerTabla(filas) {
    "use strict";

    var i, j;
    var table = document.createElement('table');    
    
    for(i = 0; i < filas; i++)
        {
            var tFilas = document.createElement('tr');
            
            for(j = 0; j < 3; j++)
                {
                    var tData = document.createElement('td');
                    
                    tData.textContent = 'Cell';
                    
                    tFilas.appendChild(tData);
                    
                    
                }        
            table.appendChild(tFilas);
        }
    
    document.write(table);
}

function fun() { 
    "use strict";
    var numero = prompt("Introduce un numero", 0);
    
    document.write(numero);
    
    hacerTabla(numero);
}

function sumaDosNumeros(){
    
    var numero1 = Math.floor(Math.random() * 100);
    var numero2 = Math.floor(Math.random() * 100);
    
    var secs = Date.now();
    
    var respuesta = prompt("¿Cuánto es el resultado de sumar " + String(numero1) + " y " + String(numero2));
        
    if(respuesta == (numero1 + numero2))
    {
        var secs1 = Date.now();
        alert("Correcto, tardaste " + ((secs1 - secs)/1000) + " segundos en responder!");
    }
    else
    {
        alert("Lo siento, intenta de nuevo");
    }
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
    
}

function imprimirResultados(){

    document.getElementById("cont").innerHTML = "Arreglo = " + arr.toString() + "<br> Negativos = " + String(neg) + "<br> Positivos = " + String(pos) + "<br> Cero = " + String(zero);
}

















