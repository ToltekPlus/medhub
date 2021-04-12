<?php \Core\View::renderHeader(); ?>

<!--TODO: CATEGORI ID ЧЕРЕЗ ВЫПАДАЮЩИЙ СПИСОК-->

<div class="block-right">
    <h1>directions_category add</h1>

    <div class="add-link">
        <a href='/directions_category/add'>directions_category add</a>
    </div>

    <div class="dashboard-form">
        <form method="POST">
            <label for="category_id">category_id</label>
            <input type="text" name="category_id" id="category_id" placeholder="category_id">

            <label for="name_direction">name_directions</label>
            <input type="text" name="name_direction" id="name_direction" placeholder="name_direction">

            <label for="price">price</label>
            <input type="text" name="price" id="price" placeholder="price">

            <button class="button-primary" type="submit">Добавить</button>
        </form>
    </div>
</div>

<?php \Core\View::renderFooter(); ?>