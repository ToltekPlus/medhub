<?php \Core\View::renderHeader(); ?>

<div class="block-right">
    <h1>Данные удачно обновлены</h1>

    <h2>Новый пароль: <?=$password?> </h2>

    <h3>
        <a href="<?=$back_url?>">Вернуться назад</a>
    </h3>
</div>

<?php \Core\View::renderFooter(); ?>
