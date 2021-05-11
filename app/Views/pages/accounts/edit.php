<?php \Core\View::renderHeader(); ?>
<div class="block-right">
    <h1>Редактировать аккаунта</h1>

    <div class="dashboard-form">
        <form action="update" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?=$_SESSION['said']?>">

            <label for="name">Имя</label>
            <input type="text" name="name" id="name" placeholder="Имя" value="<?=$account['name']?>" required>

            <label for="surname">Фамилия</label>
            <input type="text" name="surname" id="surname" placeholder="Фамилия" value="<?=$account['surname']?>" required>

            <label for="userpic">Юзерпик</label>
            <input type="file" name="userpic">

            <button class="button-1" type="submit">Обновить</button>
        </form>
    </div>
</div>

<?php \Core\View::renderFooter(); ?>
