<div>
    <form action="update" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$_SESSION['said']?>">
        <input type="text" name="name"> <br> <br>
        <input type="text" name="surname"> <br> <br>

        <input type="file" name="userpic">
        <button type="submit">Обновить</button>
    </form>
</div>
