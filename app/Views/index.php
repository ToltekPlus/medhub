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
                    <form class="auth" id='form'>
                        <fieldset>
                            <label for="email">E-mail</label>
                            <input type="text" placeholder="Ваш e-mail" id="email" name="email">
                            <label for="password">Пароль</label>
                            <input type="password" placeholder="Ваш пароль" id="password" name="password">
                            <input class="button-primary" type="button" value="Войти" onclick="loginCheck()" id="login-btn">
                        </fieldset>
                    </form>

                    <form action="/registration" class="auth" method="post">
                        <fieldset>
                            <label for="email">E-mail</label>
                            <input type="text" placeholder="Ваш e-mail" id="login" name="login">
                            <label for="password">Пароль</label>
                            <input type="password" placeholder="Ваш пароль" id="password" name="password">
                            <label for="name">Name</label>
                            <input type="text" placeholder="Name" id="name" name="name">
                            <label for="surname">Surname</label>
                            <input type="text" placeholder="Surname" id="surname" name="surname">

                            <input class="button-primary" type="submit" value="Зарегаться">
                        </fieldset>
                    </form>
                </div>

                <div class="registration-form none">
                  <div class="invite">
                      Есть аккаунт?<a onclick="showAuthForm()"> Войдите </a>или зарегистрируйтесь
                  </div>
                  <form class="reg" id='form'>
                      <fieldset>
                          <label for="name">Имя</label>
                          <input type="text" placeholder="Вашe имя" id="new-name" name="name">
                          <label for="email">E-mail</label>
                          <input type="text" placeholder="Ваш e-mail" id="new-email" name="email">
                          <label for="password">Пароль</label>
                          <input type="password" placeholder="Ваш пароль" id="new-password" name="password">
                          <input class="button-primary" type="button" value="Создать и войти" onclick="registerCheck()" id="reg-btn">
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
