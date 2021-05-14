<?php \Core\View::renderHeader(); ?>

<div class="block-right">
    <h1>Редактирование уровня доступа</h1>

    <div class="add-link">
        <a href='/doctor_directions/add'>Добавить уровень</a>
    </div>

    <div class="dashboard-form">
        <form method="POST">
            <input type="hidden" name="id" value="<?=$_GET['id'] ?>" required>
            <label for="user">Наименование</label>
      <select name="user_id" id="user">
        <<?php 
        foreach ($user as $key => $value) {
         echo '<option value="' . $key . '" ';
         if ($key == $doctor_directions->user){
         echo 'selected';   
       } 
         echo'>' . $value .'</option>';
    }
 ?>  
      </select>

            <label for="direction">Направление</label>
<select name="direction_id" id="direction">
        <<?php 
        foreach ($direction as $key => $value) {
         echo '<option value="' . $key . '" ';
         if ($key == $doctor_directions->direction){
         echo 'selected';   
       } 
         echo'>' . $value .'</option>';
    }
 ?>  
      </select>

            <button class="button-primary" type="submit">Обновить</button>
        </form>
    </div>
</div>

<?php \Core\View::renderFooter(); ?>
