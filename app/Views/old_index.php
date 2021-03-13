<?php \Core\View::renderHeader(); ?>

<nav>
    <ul>
        <li>
            <img src="/images/nav/levels.png" alt="levels">
            <a href="accesses">Уровни доступа</a>
        </li>
    </ul>
</nav>

<?php

foreach ($accounts as $key => $value) {
    ($value->userpic) ? $img = $value->userpic : $img ='images/accounts/default.png';
    echo
        '<div class="account-information">
            <div class="account-information_userpic">
                <img src='. $img .'>
            </div>
            <div class="account-information_data">
                <div class="form-operation">
                        <a href=account/edit?id=' . $value->account_key .'><img src="/images/form/edit.png" alt="edit"></a>
                        <a href=account/delete?id=' . $value->account_key .'><img src="/images/form/delete.png" alt="delete"></a>
                        <a href=account/login?id=' . $value->account_key .'><img src="/images/form/key.png" alt="session"></a>
                </div>
                Email: ' . $value->email . '<br>' .
                'Имя/Фамилия: ' . $value->name . ' ' . $value->surname . '<br>' .
                'Уровень доступа: ' . $value->name_access . ' с уровнем ' . $value->level_access . '<br>' .
                'Пользовательский ID: <a href=account?id=' . $value->account_key .'>' . $value->account_key . '</a> <br>
            </div>
        </div>';
}
?>

<?php \Core\View::renderFooter(); ?>