function __(id){
return document.getElementById(id)
}
function openVentana(){
$("#ventana1").slideDown("slow");
return false;
}
function closeVentana(){
$("#ventana1").slideUp("speed");
}
function openRegistro(){
$("#registro").slideDown("speed");
$("#formularioLogin").slideUp("speed");
}
function openLostpass(){
$("#lostpass").slideDown("speed");
$("#formularioLogin").slideUp("speed");
}
function openLogin(){
$("#formularioLogin").slideDown("speed");
$("#registro").slideUp("speed");
$("#lostpass").slideUp("speed");
}
function valida(esto){
document.forms['prueba'].nsocio.disabled=!esto;
}

function redireccionarIndex(){
  window.locationf="http://localhost/onequillastore";
}
