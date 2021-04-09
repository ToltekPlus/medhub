//создание div уведомления
function showError({top = 0, right = 0, className, html, color}) {
    let error = document.createElement('span');
    error.className = "error";
    if (className) error.classList.add(className);

    error.style.right = right + 'px';
    error.style.top = top + 'px';
    error.style.position = 'static';
    error.style.backgroundColor = color;
    error.style.boxShadow = '0 11px 17px 0 rgba(23,32,61,.13)';
    error.style.borderRadius = '10px';
    error.style.padding = '8px';
    error.style.fontSize = '0.6em';
    error.style.textAlign = 'left';
    error.style.color = 'white';
    error.style.animationName = 'bounceIn';
    error.style.animationDuration = '600ms';
    error.style.animationIterationCount = '1';
    error.style.width = '100';

    error.innerHTML = html;

    erdiv.append(error);

    document.getElementById('btn').style.display = 'none';
    setTimeout(() => {error.remove()}, 2000);
    setTimeout(() => {document.getElementById('btn').style.display = 'block';}, 2000);

}


//проверка почты
function checkEmail(){
  var email = document.getElementById("email").value;
      var check = /\S+@\S+\.\S+/;
      return check.test(email);
}

//проверка пароля
function checkPass(){
  var pass = document.getElementById("password").value
  if(pass.trim().length<8){return false;}else{return true;}
}

//общая фунция
function allCheck(){
  if(checkEmail()==true){
    if(checkPass()==true){
      //при true true
      showError({
          html: 'All good!',
          color: '#33e019',
      });

      location.href = '/home';

    }else{
      //при true false
      showError({
        html: 'Wrong password!',
        color: '#c93434',
    });}
  }else{
    //при false false
    showError({
      html: 'Wrong email!',
      color: '#c93434',
  });}
}


// выключение кнопки
document.getElementsByName("button-primary")[0].disabled = false;
