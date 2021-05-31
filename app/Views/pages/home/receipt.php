<?php \Core\View::renderHeader(); ?>
<div class="block-right">
            <div class="receipt">
                <img src="/images/logo.png">
                <h1>
                    Ваш цифровой чек
                </h1>
                <div class="receipt-content">
                    <table>
                        <thead>
                        <tr>
                            <th>Организация</th>
                            <th>ООО "Врачеватель"</th>
                        </tr>
                        <tr>
                            <th>Номер чека:</th>
                            <th><?php
                                echo $dashboard['dashboard']['id']
                                ?></th>
                        </tr>
                        <tr>
                            <th>Номер клиента:</th>
                            <th><?php
                                echo $dashboard['dashboard']['client_id']
                                ?></th>
                        </tr>
                        <tr>
                            <th>Операция:</th>
                            <th><?php
                                echo $dashboard['direction']->name_direction
                                ?></th>
                        </tr>

                        <tr>
                            <th>Время:</th>
                            <th><?php
                                echo $dashboard['dashboard']['time_of_visit']
                                ?></th>
                        </tr>
                        <tr>
                            <th>Посетил:</th>
                            <th><?php
                                if ($dashboard['dashboard']['checked'] == '1') {
                                echo 'да';
                                } else {
                                echo 'нет';
                                }
                                ?></th>
                        </tr>
                        <tr>
                            <th>Сумма:</th>
                            <th><?php
                                echo $dashboard['direction']->price
                                ?></th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <h2>Спасибо!</h2>
    </div>
</div>


<?php \Core\View::renderFooter(); ?>