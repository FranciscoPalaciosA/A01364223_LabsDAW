function cantidades()
{
    $.get("ajax.php", {opcion:1}).done(function(data)
    {
        var ajaxresponse = document.getElementById("consultas");
        ajaxresponse.innerHTML = data;
    });
}

function zombiesRegistrados()
{
    $.get("ajax.php", {opcion:2}).done(function(data)
    {
        var ajaxresponse = document.getElementById("consultas");
        ajaxresponse.innerHTML = data;
    });
}

function zombiesPorEstado()
{
    $.get("ajax.php", {opcion:3,estadoConsultar:document.getElementById("estadoConsulta").value}).done(function(data)
    {
        var ajaxresponse = document.getElementById("consultas");
        ajaxresponse.innerHTML = data;
    });
}

function onSignIn(googleUser) {
  
  var profile = googleUser.getBasicProfile();
  
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
  
  $.get("ajax.php", {opcion: 4, nombreGoogle: profile.getName()}).done(function(data)
    {
        var ajaxresponse = document.getElementById("saludo");
        ajaxresponse.innerHTML = "Hola " + data;
    });
}


gapi.load('auth2', function(){
    gapi.auth2.init();
});