function sendRequest(){

    $.get("ajax.php", { pattern: document.getElementById('userInput').value, ciudades:1 })
        .done(function( data ) {
        var ajaxResponse = document.getElementById('ajaxResponse');
        ajaxResponse.innerHTML = data;
        ajaxResponse.style.visibility = "visible";
        
     });

}

function getCiudades(id)
{
    $.get("ajax.php", { ciudades:0, id:id })
    .done(function( data ) {
            var ajaxResponse = document.getElementById('TablaCiudades');
            ajaxResponse.innerHTML = data;
    });
}

function selectValue() {
    
   var list=document.getElementById("list");
   var userInput=document.getElementById("userInput");
   var ajaxResponse=document.getElementById('ajaxResponse');
   userInput.value=list.options[list.selectedIndex].text;
   ajaxResponse.style.visibility="hidden";
   userInput.focus();

    var btn = document.createElement("button");
    var t = document.createTextNode("Ver ciudades");
    btn.appendChild(t);
    btn.onclick = function(){
        getCiudades(list.options[list.selectedIndex].value);
    };
    
    document.getElementById("boton").appendChild(btn);
}
