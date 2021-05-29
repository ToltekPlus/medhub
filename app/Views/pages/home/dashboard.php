<?php \Core\View::renderHeader(); ?>
    <div class="block-right">
        <div class="dashboard">
            <h1>Ближайшее рассписание</h1>
            <div class="dashboard-form">
                <table>
                    <thead>
                        <tr>
                            <th>Номер</th>
                            <th>Клиент</th>
                            <th>Операция</th>
                            <th>Время</th>
                            <th>Цена</th>
                            <th></th>
                        </tr>
                        <?php
                            foreach ($dashboard as $key => $value){
                                ($value['dashboard']->urgency == 1) ? $value['dashboard']->urgency = 300 : $value['dashboard']->urgency = 0;
                                ($value['dashboard']->checked == 1) ? $value['dashboard']->checked = '<span style="color: darkgreen; font-size: 0.6em; font-weight: bold;">пройдено</span>'
                                    : $value['dashboard']->checked = '<a href="/checked?id=' . $value['dashboard']->dashboard_key .'">&#10004;</a>';

                                echo '<tr>' . '<td>' . $value['dashboard']->dashboard_key . '<br> ' . $value['dashboard']->checked .' </td>'
                                    . '<td>' . $value['client']['name'] . ' ' . $value['client']['surname'] . ' <br><span style="font-size: 0.8em">' . $value['dashboard']->comment . '</span></td>'
                                    . '<td>' . $value['direction']->name_direction . '</td>'
                                    . '<td>' . $value['dashboard']->time_of_visit . '</td>'
                                    . '<td>' . $value['direction']->price . ' + ' . $value['dashboard']->urgency . '</td>'
                                    . '<td><a href="/receipt?id=' . $value['dashboard']->dashboard_key . '">чек</a></td>'
                                    . '</tr>';
                            }
                        ?>
                    <thead>
                </table>
                <a class="button-primary" href="/home/add">Записать на прием</a>
            </div>
        </div>
    </div>
<?php \Core\View::renderFooter(); ?>