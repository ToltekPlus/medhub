<?php \Core\View::renderHeader(); ?>

<div class="block-right">
    <h1>Редактирование категории</h1>

    <div class="add-link">
        <a href='/category/add'>Добавить уровень</a>
    </div>

    <div class="dashboard-form">
        <form method="POST">
            <input type="hidden" name="id" value="<?=$category['id']?>" required>

            <label for="name_category">Наименование</label>
            <input type="text" name="name_category" id="name_category" value="<?=$category['name_category']?>" required>

            
            <button class="button-primary" type="submit">Обновить</button>
        </form>
    </div>
</div>

<?php \Core\View::renderFooter(); ?>
