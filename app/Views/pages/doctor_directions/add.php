<?php \Core\View::renderHeader(); ?>

<div class="block-right">
    <h1>Добавление категорий врачей</h1>

    <div class="add-link">
        <a href='/doctor_directions/add'>Добавить категорию врача</a>
    </div>

    <div class="dashboard-form">
      <form method="POST">

  <label for="user_id">Наименование</label>
  <select id="user_id" name="user_id">
    <?php
        foreach ($user as $key => $value) {
            echo '<option value="' . $key . '">' . $value .'</option>';
        }
    ?>
  </select>

 <label for="direction_id">Направление</label>
  <select name="direction_id" id="direction_id"> 
    <?php
        foreach ($doctor_directions as $key => $value) {
            echo '<option value="' . $key . '">' . $value .'</option>';
        }
    ?>
  </select>
  <button class="button-primary" type="submit">Добавить</button>
    </form>
  </div>
</div>

<?php \Core\View::renderFooter(); ?>