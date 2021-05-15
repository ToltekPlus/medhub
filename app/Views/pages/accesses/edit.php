<?php \Core\View::renderHeader(); ?>

<div class="block-right">
    <h1>Редактирование уровня доступа</h1>

    <div class="add-link">
        <a href='/access/add'>Добавить уровень</a>
    </div>

    <div class="dashboard-form">
        <form method="POST">
            <input type="hidden" name="id" value="<?=$access['id']?>" required>

            <label for="name_access">Наименование</label>
            <input type="text" name="name_access" id="name_access" value="<?=$access['name_access']?>" required>

            <label for="level_access">Уровень</label>
            <input type="text" name="level_access" id="level_access" value="<?=$access['level_access']?>" required>

            <button class="button-primary" type="submit">Обновить</button>
        </form>
    </div>
</div>

<?php \Core\View::renderFooter(); ?>
