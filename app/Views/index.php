<?php \Core\View::renderHeader(); ?>

<?php

foreach ($accounts as $key => $value) {
    echo 'Email: ' . $value->email . '<br>' .
        'Имя/Фамилия: ' . $value->name . ' ' . $value->surname . '<br>' .
        'Уровень доступа: ' . $value->name_access . ' с уровнем ' . $value->level_access . '<br>' .
        'Пользовательский ID:
              <a href=account?id=' . $value->account_key .'>' . $value->account_key . '</a><br>
              <a href=account/delete?id=' . $value->account_key .'>Удалить аккаунт</a>              
              <br><hr/><br>';
}
?>

<?php \Core\View::renderFooter(); ?>