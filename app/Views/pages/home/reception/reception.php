<?php
\Core\View::renderHeader();?>


    <div class="colors"><div>
    <div class="content"><img src="">
        <div class="Window">Услуги
            <div class="timedate">
                <form>
                    <select class="miniwindow">
                        <option>Выберете услугу</option>
                        <?php
                        foreach ($dashboard as $key => $value){
                            echo '<option>' . $value->name_direction . '</option>';
                        }
                        ?>
                    </select>
                </form>
            </div>
        </div>
        <div class="Window">Доктор
            <div class="timedate">
                <form>
                    <select class="miniwindow">
                        <option>Выберете Доктора</option>
                        <?php
                        foreach ($dashboard as $key => $value){
                            echo '<option>' . $value->name . ' ' . $value->surname . '</option>';
                        }
                        ?>
                    </select>
                </form>
            </div>
        </div>
    </div>


<?php \Core\View::renderFooter(); ?>