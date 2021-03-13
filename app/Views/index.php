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
                    <div class="invite">
                        Войдите в аккаунт или <a href="/register">зарегистрируйтесь</a>
                    </div>

                    <form action="/home" class="auth">
                        <fieldset>
                            <label for="email">E-mail</label>
                            <input type="text" placeholder="Ваш e-mail" id="email" name="email">
                            <label for="password">Пароль</label>
                            <input type="password" placeholder="Ваш пароль" id="password" name="password">

                            <input class="button-primary" type="submit" value="Войти">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>