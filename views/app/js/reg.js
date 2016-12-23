function goReg() {
  var connect, form, response, result, user, pass, email, tyc, pass_dos ;
  user= __('user_reg').value;
  email=__('email_reg').value;
  pass= __('pass_reg').value;
  pass_dos= __('pass_reg_dos').value;
  tyc= __('tyc').checked ? true : false ;

if (tyc) {
  if (user != '' && email != '' && pass != '' && pass_dos != '' ) {
    if (pass==pass_dos) {
      form = 'user=' + user + '&pass=' + pass + '&email=' + email  ;
      connect = window.XMLHttpRequest ? new XMLHttpRequest() : new activeXObjet('Microsoft.XMLHTTP');
      connect.onreadystatechange = function(){
        if(connect.readyState == 4 && connect.status == 200){
          if (connect.responseText == 1) {
        result ='<div class="alert alert-success alert-dismissable fade in">';
        result +='<a href="#" target="_self" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
        result += '<h4>REGISTRO COMPLETADO!</h4>';
        result += '<strong><p> Estamos redireccionandote...</p></strong>';
        result +='</div>';
        __('_AJAX_REG_').innerHTML = result;
        location.reload();
      }else {
        __('_AJAX_REG_').innerHTML = connect.responseText;
      }
      } else if (connect.readyState != 4) {
      result ='<div class="alert alert-warning alert-dismissable fade in">';
      result +=' <a href="#" target="_self" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
      result += '<h4>procesando!</h4>';
      result += '<strong><p> Estamos procesando tus datos...</p></strong>';
      result +='</div>';
      __('_AJAX_REG_').innerHTML = result;
    }
    }
      connect.open('POST','ajax.php?mode=reg',true);
      connect.setRequestHeader('content-Type','application/x-www-form-urlencoded');
      connect.send(form);

    }else {
        result ='<div class="alert alert-danger alert-dismissable fade in">';
        result +='<a href="#" target="_self" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
        result += '<h4>Error!</h4>';
        result += '<strong><p>Las contraseñas no coinciden</p></strong>';
        result +='</div>';
        __('_AJAX_REG_').innerHTML = result;
    }
}else {

    result ='<div class="alert alert-danger alert-dismissable fade in">';
    result +='<a href="#" target="_self" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
    result += '<h4>Error!</h4>';
    result += '<strong><p>Todos los campos deben estar llenos</p></strong>';
    result +='</div>';
    __('_AJAX_REG_').innerHTML = result;

}
}else {
  result ='<div class="alert alert-danger alert-dismissable fade in">';
  result +='<a href="#" target="_self" class="close" data-dismiss="alert" aria-label="close">&times;</a>';  result += '<h4>Error!</h4>';
  result += '<strong><p>Los terminos y condiciones deben ser aceptados</p></strong>';
  result +='</div>';
  __('_AJAX_REG_').innerHTML = result;
}

  }

function runScriptReg(e) {
var numero;
numero =(e.keycode);
console.log(numero);
  if(numero == 13) {
   goReg();}
 }
