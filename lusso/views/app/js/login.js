function goLogin() {
  var connect, form, response, result, user, pass, sesion;
  user= __('user_login').value;
  pass= __('pass_login').value;
  sesion= __('session_login').checked ? true : false ;
  form = 'user=' + user + '&pass=' + pass + '&sesion=' + sesion ;
  connect = window.XMLHttpRequest ? new XMLHttpRequest() : new activeXObjet('Microsoft.XMLHTTP');
  connect.onreadystatechange = function(){
    if(connect.readyState == 4 && connect.status == 200){
      if (connect.responseText == 1) {
    result ='<div class="alert alert-success alert-dismissable fade in">';
    result +='<a href="#" target="_self" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
    result += '<h4>CONECTADO!</h4>';
    result += '<strong><p> Estamos redireccionandote...</p></strong>';
    result +='</div>';
    __('_AJAX_LOGIN_').innerHTML = result;
    location.reload();
  }else {
    __('_AJAX_LOGIN_').innerHTML = connect.responseText;
  }
  } else if (connect.readyState != 4) {
  result ='<div class="alert alert-warning alert-dismissable fade in">';
  result +=' <a href="#" target="_self" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
  result += '<h4>procesando!</h4>';
  result += '<strong><p> Estamos intentando logearte...</p></strong>';
  result +='</div>';
  __('_AJAX_LOGIN_').innerHTML = result;
}
}
  connect.open('POST','ajax.php?mode=login',true);
  connect.setRequestHeader('content-Type','application/x-www-form-urlencoded');
  connect.send(form);
  }

  function runScriptLogin(e) {
    if(e.keyCode == 13) {
      goLogin();
    }
  }
