<?php \Core\View::renderHeader();?>
    <div class="block-right">
        <h1>Запись на приём</h1>

        <div class="dashboard-form">
            <form method="POST">
                <label for="doctor_direction_id">Доктор &nbsp;&nbsp; | &nbsp;&nbsp; Услуга</label>
                <select name="doctor_direction_id" id="doctor_direction_id">
                    <?php
                        foreach ($doctors as $key => $value) {
                            echo '<option value="' . $value->id . '">' . $value->login . ' | ' . $value->name_direction .'</option>';
                        }
                        ?>
                </select>

                <label for="client_id">Клиент</label>
                <select name="client_id" id="client_id">
                    <?php
                    foreach ($clients as $key => $value) {
                        echo '<option value="' . $value->user_id . '">' . $value->surname . ' ' . $value->name .'</option>';
                    }
                    ?>
                </select>

                <label for="category_id">Комментарий</label>
                <textarea name="comment" id="comment" cols="30" rows="10"></textarea>

                <label for="urgency">Срочность</label>
                <input type="checkbox" name="urgency" id="urgency" checked="checked"> <span style="font-size: 12px; vertical-align: top;">+300 рублей</span>

                <br><br>

                <button class="button-primary" type="submit">Добавить</button>
            </form>
        </div>

        <!--<div class="content">
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
            <a class="button-primary" href="/home">Вернутся на главную</a>
        </div>-->
    </div>
<?php \Core\View::renderFooter(); ?>