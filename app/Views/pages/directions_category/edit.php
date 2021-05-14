<?php \Core\View::renderHeader(); ?>

<div class="block-right">
    <h1>Редактировать направление категории</h1>

    <div class="add-link">
        <a href='/direction_category/add'>Добавить направление категории</a>
    </div>

    <div class="dashboard-form">
        <form method="POST">

            <input type="hidden" name="id" value=" <?php echo $directions_category->id ?> " required>

            <label for="category_id">Категория</label>
            <select name="category_id" id="category_id">
                <?php 
                    foreach ($category as $key => $value) {
                        echo '<option value="' . $key . '" ';
                        if ($key == $directions_category->category_id){
                            echo 'selected';   
                        } 
                        echo'>' . $value .'</option>';
                    }
                ?>
            </select>

            <label for="name_direction">Направление</label>
            <input type="text" name="name_direction" id="name_direction" placeholder="Направление" value="<?php echo $directions_category->name_direction ?>" required>


            <label for="price">Цена</label>
            <input type="text" name="price" id="price" placeholder="Цена" value="<?php echo $directions_category->price ?>" required>

            <button class="button-primary" type="submit">Обновить</button>
        </form>
    </div>
</div>

<?php \Core\View::renderFooter(); ?>