function productos()
{
    console.log("click");
    
    $.get("ajax.php", {opcion:"productos"}).done(function(data){
        
        var ajaxResponse = data;
        
        document.getElementById("page").innerHTML = data;
    });
    
}

function informacion()
{
    console.log("click");
    
    $.get("ajax.php", {opcion:"info"}).done(function(data){
        
        var ajaxResponse = data;
        
        document.getElementById("page").innerHTML = data;
    });
    
}