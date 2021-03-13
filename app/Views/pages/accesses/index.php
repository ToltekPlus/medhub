<?php \Core\View::renderHeader(); ?>

<div class="block-right">
    <h1>Уровни доступа</h1>

    <div class="add-link">
        <a href='access/add'>Добавить уровень</a>
    </div>

    <div class="dashboard-form">
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Тип</th>
                    <th>Доступ</th>
                    <th></th>
                </tr>
                <?php
                    foreach ($accesses as $key => $value) {
                        echo
                            '<tr>
                                <td class="form-control_edit">
                                    <a href=access/edit?id=' . $value->id .'>
                                        <svg class="svg-edit">
                                            <use xlink:href="#edit"></use>
                                        </svg>
                                    </a>
                                </td>
                                <td>' . $value->name_access . '</td>
                                <td>' . $value->level_access . '</td>
                                <td>
                                    <a href=access/warning?id=' . $value->id .'>
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