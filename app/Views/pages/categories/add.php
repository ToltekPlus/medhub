<?php \Core\View::renderHeader(); ?>

<div class="block-right">
    <h1>Добавление категорий</h1>

    <div class="add-link">
        <a href='/category/add'>Добавить уровень</a>
    </div>

    <div class="dashboard-form">
        <form method="POST">
            <label for="name_category">Наименование</label>
            <input type="text" name="name_category" id="name_category" placeholder="Название категории">

            <button class="button-primary" type="submit">Добавить</button>
        </form>
    </div>
</div>

<?php \Core\View::renderFooter(); ?>