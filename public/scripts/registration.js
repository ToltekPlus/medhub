function showRegistarionForm(){
document.getElementsByClassName('registration-form')[0].classList.remove('none');

document.getElementsByClassName('login-form')[0].classList.add('none');

}
function showAuthForm(){
  document.getElementsByClassName('login-form')[0].classList.remove('none');

  document.getElementsByClassName('registration-form')[0].classList.add('none');
}
