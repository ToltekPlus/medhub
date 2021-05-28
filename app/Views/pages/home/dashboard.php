<?php \Core\View::renderHeader(); ?>
    <div class="block-right">
        <div class="dashboard">
            <h1>Рассписание на сегодня</h1>
            <div class="dashboard-form">
                <table>
                    <thead>
                    <tr>
                        <th>Номер</th>
                        <th>Клиент</th>
                        <th>Лечащий врач</th>
                        <th>Время</th>
                        <th>Цена</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($dashboard as $key => $value){
                                echo '<tr>' . '<th>' . $value->name . ' ' . $value->surname . '</th>'
                                    . '<th>' . 'Врач'
                                    . '<th>' . $value->time_of_visit . '</th>'
                                    . '<th>' . $value->client_id .'</th>' . '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
                <a class="button-primary" href="/home/add">Записать на прием</a>
            </div>
        </div>
    </div>
<?php \Core\View::renderFooter(); ?>