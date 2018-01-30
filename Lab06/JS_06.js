function checarForm(form)
{
    if(form.contra1.value != "" && form.contra1.value == form.contra2.value)
    {
        if(form.contra1.value.length < 6)
        {
            alert("La contraseña debe tener mas de 6 caracteres");
            form.contra1.focus();
            return false;
        }
        
        re = /[0-9]/;
        if(!re.test(form.contra1.value))
        {
            alert("La contraseña debe contener al menos un dígito");
            form.contra1.focus();
            return false;
        }
        
        re = /[a-z]/;
        if(!re.test(form.contra1.value))
        {
            alert("La contraseña debe tener al menos una letra minúscula");
            form.contra1.focus();
            return false;
        }
        
        re = /[A-Z]/
        if(!re.test(form.contra1.value))
        {
            alert("La contraseña debe tener al menos una letra mayúscula");
            form.contra1.focus();
            return false;
        }
      
    }
    else if(form.contra1.value != form.contra2.value)
    {
        alert("Las contraseñas no son iguales");
        return false;
        
    }
    
    alert("Tu contraseña ha sido verificada");
    return true;
}

document.getElementById("info").addEventListener("mouseover",showPopup);
document.getElementById("info").addEventListener("mouseout",hidePopup);

function showPopup(){
    document.getElementById("popup").style.display = "block";
}

function hidePopup(){
    document.getElementById("popup").style.display = "none";
}

function crearOpt(clase,max,index){
    
    var select, i, option;
    
    select = document.getElementsByClassName(clase);
    
    for (i = 0; i <= max; i ++) {
        opt = document.createElement('option');
        opt.value = opt.text = i;
        select[index].add(opt);
    }
}

function calcularTotal(subtotal){
    
    var iva = subtotal * .16;
    
    document.getElementById("iva").innerHTML = "$" + String(iva);
    
    var total = subtotal + iva;
    
    document.getElementById("total").innerHTML = "$" + String(total);
}

function calcularTotales()
{
    var cantidades = document.getElementsByClassName("cantidad");
    
    var i, subtotal = 0, precio;
    
    for(i = 0; i <= 2; i++)
    {
        if(i == 0)
        {
            precio = cantidades[i].value * 1350;
        }
        else if (i == 1)
        {
            precio = cantidades[i].value * 2550;
        }
        else
        {
            precio = cantidades[i].value * 750;   
        }
        
        subtotal = subtotal + precio;
    }

    document.getElementById("subTotal").innerHTML = "$" + String(subtotal) + ".00";
    
    calcularTotal(subtotal);
}

function calcularSubTotal(index)
{
    var cantidad = document.getElementsByClassName("cantidad")[index].value;
    
    if(index == 0)
    {
        cantidad = cantidad * 1350;
    }
    else if (index == 1)
    {
        cantidad = cantidad * 2550;
    }
    else
    {
        cantidad = cantidad * 750;
        if(cantidad >= 3750)
            {
                cantidad = cantidad - 1000;
                document.getElementById("descuento").innerHTML = "Descuento aplicado";
            }
    }
    
    document.getElementsByClassName("subTotal")[index].innerHTML = "$" +String(cantidad) + ".00";
    
    calcularTotales();
}

function confirmarPago(){
    
    var total = document.getElementById("total");
    
    alert("Acaba de realizar su compra, el pedido está en camino. ¡Felicidades!")
    
}

function calcularHipotenusa(catAd, catOp)
{
    var res = Math.sqrt(Math.pow(catAd,2) + Math.pow(catOp,2));
    
    return res;
}

var myVar = setInterval(function(){ reloj() }, 1000);

function reloj() {
    var d = new Date();
    var t = d.toLocaleTimeString();
    document.getElementById("reloj").innerHTML = t;
}

document.getElementById("hipotenusa").onsubmit = function() {
    var catAd = document.hipo.catAd.value;    
    var catOp = document.hipo.catOp.value;
    var units = document.hipo.unidad.value;
    
    var result = calcularHipotenusa(catAd, catOp);
    
    alert("El resultado es " + result + units);
    document.getElementById("resultado").innerHTML = result;
}

function changeColor()
{
    document.getElementById("header").style.color = "red";
    
}

document.getElementById("header").addEventListener("mouseover", changeColor);

function openWin() {
    var myWindow = window.open("", "myWindow", "width=200, height=100");
    myWindow.document.write("<p>Esta ventana se cerrará sola</p>");
    setTimeout(function(){ myWindow.close() }, 3000);
}

function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
}

crearOpt("cantidad",10,0);
crearOpt("cantidad",4,1);
crearOpt("cantidad",20,2);






