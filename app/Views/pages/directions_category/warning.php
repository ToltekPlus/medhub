<?php \Core\View::renderHeader(); ?>

<div class="block-right">
    <h1 style="color: darkred;">Удаление</h1>
    <h4>
        При удалении возврат данных будет невозможен!
    </h4>

    <div class="dashboard-form_delete">
        <form method="POST">
            <input type="hidden" name="id" id="id" value="<?=$id?>">

            <button class="btn-delete" type="submit">Удалить</button>
        </form>
    </div>
</div>

<?php \Core\View::renderFooter(); ?>