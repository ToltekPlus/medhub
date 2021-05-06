<?php \Core\View::renderHeader(); ?>

<!--TODO: CATEGORI ID ЧЕРЕЗ ВЫПАДАЮЩИЙ СПИСОК-->

<div class="block-right">
    <h1>Направление категории</h1>

    <div class="add-link">
        <a href='/directions_category/add'>Добавить направление категории</a>
    </div>

    <div class="dashboard-form">
        <form method="POST">

            <label for="category_id">Категория</label>
            <select name="category_id" id="category_id">
                <?php 
                    foreach ($category as $key => $value) {
                        echo '<option value="' . $key . '">' . $value .'</option>';
                    }
                ?>
            </select>

            <label for="name_direction">Направление</label>
            <input type="text" name="name_direction" id="name_direction" placeholder="Направление">

            <label for="price">Цена</label>
            <input type="text" name="price" id="price" placeholder="Цена">

            <button class="button-primary" type="submit">Добавить</button>
        </form>
    </div>
</div>

<?php \Core\View::renderFooter(); ?>