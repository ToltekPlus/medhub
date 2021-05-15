<?php \Core\View::renderHeader(); ?>

<div class="block-right">
    <h1>Категории врачей</h1>

    <div class="add-link">
        <a href='doctor_directions/add'>Добавить категорию врача</a>
    </div>

    <div class="dashboard-form">
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Наименование</th>
                    <th>Направление</th>
                    <th>Добавлено</th>
                    <th>Изменено</th>
                    <th></th>
                </tr>
                <?php
                    foreach ($doctor_directions as $key => $value) {
                        echo
                            '<tr>
                                <td class="form-control_edit">
                                    <a href=doctor_directions/edit?id=' . $value->id .'>
                                        <svg class="svg-edit">
                                            <use xlink:href="#edit"></use>
                                        </svg>
                                    </a>
                                </td>
                                <td>' . $value->login . '</td>
                                <td>' . $value->name_direction . '</td>
                                <td>' . $value->created_at . '</td>
                                <td>' . $value->updated_at . '</td>
                                <td>
                                    <a href=doctor_directions/warning?id=' . $value->id .'>
                                        <svg class="svg-delete">
                                            <use xlink:href="#delete"></use>
                                        </svg>
                                    </a>
                                </td>
                          </tr>';
                    }
                ?>
            </thead>
        </table>
    </div>
</div>

<?php \Core\View::renderFooter(); ?>