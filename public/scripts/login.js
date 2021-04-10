//создание div уведомления
function showError({top = 0, right = 0, className, html, color}) {
    let error = document.createElement('div');
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

    error.innerHTML = html;

    erdiv.append(error);

    document.getElementById('login-btn').style.display = 'none';
    setTimeout(() => {error.remove()}, 2000);
    setTimeout(() => {document.getElementById('login-btn').style.display = 'block';}, 2000);

}

//проверка логин-почты
function checkLogEmail(){
  var email = document.getElementById("email").value;
  var check = /\S+@\S+\.\S+/;
  return check.test(email);
}

//проверка  логин-пароля
function checkLogPass(){
  var pass = document.getElementById("password").value
  if(pass.trim().length<8){return false;}else{return true;}
}

//проверка рег-почты
function checkRegEmail(){
  var email = document.getElementById("new-email").value;
  var check = /\S+@\S+\.\S+/;
  return check.test(email);
}

//проверка рег-пароля
function checkRegPass(){
  var pass = document.getElementById("new-password").value
  if(pass.trim().length<8){return false;}else{return true;}
}

//проверка рег-имени
function checkRegName(){
  var name = document.getElementById("new-name").value
  if(name.trim().length<10){return false;}else{return true;}
}

//логин функция
function loginCheck(){
  if(checkLogEmail()==true){
    if(checkLogPass()==true){
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

function registerCheck(){
  if(checkRegEmail()==false){showError({
      html: 'This is not email!',
      color: '#c93434',
  });}
  if(checkRegName()==false){showError({
    html: 'Name too long!',
    color: '#c93434',
});}
  if(checkRegPass()==false){showError({
  html: 'Password too short',
  color: '#c93434',
});}
if(checkRegPass()&&checkRegName()&&checkRegEmail()==true){
  showError({
      html: 'All good!',
      color: '#33e019',
  });

  location.href = '/home';
}
}
