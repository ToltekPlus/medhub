<div>
    <form action="update" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$account['id']?>">
        <input type="text" name="name" value="<?=$account['name']?>"> <br> <br>
        <input type="text" name="surname" value="<?=$account['surname']?>"> <br> <br>

        <input type="file" name="userpic">
        <button type="submit">Обновить</button>
    </form>
</div>
