function __(id){
return document.getElementById(id)
}

function openVentana(){
$("#ventana1").slideDown("slow");
$("#formularioLogin").slideDown("speed");
$("#lostpass").slideUp("speed");
$("#registro").slideUp("speed");
return false;
}

function closeDIV(){
$("#_AJAX_LOGIN_").fadeout("speed");
return false;
}

function closeVentana(){
$("#ventana1").slideUp("speed");
$("#formularioLogin").slideUp("speed");
}
function openRegistro(){
$("#registro").slideDown("speed");
$("#formularioLogin").slideUp("speed");
$("#lostpass").slideUp("speed");
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
function DeleteItem(contenido,url) {
  var action = window.confirm(contenido);
  if (action) {
      window.location = url;
  }
}
