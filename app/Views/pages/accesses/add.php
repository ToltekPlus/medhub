<?php \Core\View::renderHeader(); ?>

<div class="block-right">
    <h1>Добавление уровня доступа</h1>

    <div class="add-link">
        <a href='/access/add'>Добавить уровень</a>
    </div>

    <div class="dashboard-form">
        <form method="POST">
            <label for="name_access">Наименование</label>
            <input type="text" name="name_access" id="name_access" placeholder="Название уровня">

            <label for="level_access">Уровень</label>
            <input type="text" name="level_access" id="level_access" placeholder="Уровень">

            <button class="button-primary" type="submit">Добавить</button>
        </form>
    </div>
</div>

<?php \Core\View::renderFooter(); ?>