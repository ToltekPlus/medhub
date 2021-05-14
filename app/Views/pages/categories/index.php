<?php \Core\View::renderHeader(); ?>

<div class="block-right">
    <h1>Категории</h1>

    <div class="add-link">
        <a href='categories/add'>Добавить уровень</a>
    </div>

    <div class="dashboard-form">
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Категория</th>
                    <th>Добавлено</th>
                    <th>Изменено</th>
                    <th></th>
                </tr>
                <?php
                    foreach ($categories as $key => $value) {
                        echo
                            '<tr>
                                <td class="form-control_edit">
                                    <a href=categories/edit?id=' . $value->id .'>
                                        <svg class="svg-edit">
                                            <use xlink:href="#edit"></use>
                                        </svg>
                                    </a>
                                </td>
                                <td>' . $value->name_category . '</td>
                                <td>' . $value->created_at . '</td>
                                <td>' . $value->updated_at . '</td>
                                <td>
                                    <a href=categories/warning?id=' . $value->id .'>
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