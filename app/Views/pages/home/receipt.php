<?php \Core\View::renderHeader(); ?>
    <div class="block-right">
        <div class="receipt">
            <?php
            foreach ($dashboard as $key=>$value){
                echo $value->name;
            }
            ?>
        </div>
        <a class="button-primary" href="/home">Вернутся назад</a>
    </div>
<?php \Core\View::renderFooter(); ?>