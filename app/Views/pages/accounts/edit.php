<div>
    <form action="update" method="POST">
        <input type="hidden" name="id" value="<?=$account['id']?>">
        <input type="text" name="name" value="<?=$account['name']?>"> <br> <br>
        <input type="text" name="surname" value="<?=$account['surname']?>"> <br> <br>
        <button type="submit">Обновить</button>
    </form>
</div>
