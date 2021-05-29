<?php \Core\View::renderHeader(); ?>
<?php

#номер клиента операция сумма время посещения постил или нет

#var_dump($dashboard);

echo 'Номер чека:' . $dashboard['dashboard']['id'];
echo '<br>';
echo 'Номер Клиент:' . $dashboard['dashboard']['client_id'];
echo '<br>';
echo 'Операция:' . $dashboard['direction']->name_direction;
echo '<br>';
echo 'Сумма:' . $dashboard['direction']->price;
echo '<br>';
echo 'Время:' . $dashboard['dashboard']['time_of_visit'];
echo '<br>';
if ($dashboard['dashboard']['checked'] == '1') {
    echo 'Посетил: да';
} else {
    echo 'Посетил: нет';
}
?>
<?php \Core\View::renderFooter(); ?>