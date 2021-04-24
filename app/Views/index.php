<html>
    <head>
        <title>Вход в систему «Врачеватель»</title>
        <!-- CSS Reset -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
        <!-- Milligram CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
        <!-- My CSS -->
        <link rel="stylesheet" href="<? echo "/styles/main.css";?>">
    </head>
    <body>
        <div class="main-auth">
            <div class="block-bg-image"></div>
            <div class="block-auth-form">
                <div class="form-control">
                  <h3>Добро пожаловать <br> к «Врачевателю»</h3>

                  <div id="erdiv">
                  <div class="login-form">
                    <div class="invite">
                        Войдите в аккаунт или <a onclick="showRegistarionForm()">зарегистрируйтесь</a>
                    </div>
                    <form class="auth" id='logForm'>
                        <fieldset>
                            <label for="email">E-mail</label>
                            <input type="text" placeholder="Ваш e-mail" id="log-email" name="email">
                            <label for="password">Пароль</label>
                            <input type="password" placeholder="Ваш пароль" id="log-password" name="password">
                            <input class="button-primary" type="button" value="Войти" onclick="loginCheck()" id="login-btn">
                        </fieldset>
                    </form>
                </div>

                <div class="registration-form none">
                  <div class="invite">
                      Есть аккаунт?<a onclick="showAuthForm()"> Войдите </a>или зарегистрируйтесь
                  </div>
                  <form class="reg" id='regForm'>
                      <fieldset>
                          <label for="name">Имя</label>
                          <input type="text" placeholder="Вашe имя" id="reg-name" name="name">
                          <label for="email">E-mail</label>
                          <input type="text" placeholder="Ваш e-mail" id="reg-email" name="email">
                          <label for="password">Пароль</label>
                          <input type="password" placeholder="Ваш пароль" id="reg-password" name="password">
                          <input class="button-primary" type="button" value="Зарегистрироваться" onclick="registerCheck()" id="reg-btn">
                      </fieldset>
                  </form>
              </div>

            </div>
            </div>
        </div>
      <script src="/scripts/login.js"></script>
      <script src="/scripts/registration.js"></script>
    </body>
</html>
