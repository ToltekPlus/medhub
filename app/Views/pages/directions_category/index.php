<?php \Core\View::renderHeader(); ?>

<div class="block-right">
    <h1>Направление категории</h1>

    <div class="add-link">
        <a href='directions_category/add'>Добавить направление категории</a>
    </div>

    <div class="dashboard-form">
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Категория</th>
                    <th>Направление</th>
                    <th>Цена</th>
                    <th>Добавлено</th>
                    <th>Изменено</th>
                    <th></th>
                </tr>
                <?php
                    foreach ($directions_category as $key => $value) {
                        //TODO category_id - брать из модели category(пока не готова)
                        echo
                            '<tr>
                                <td class="form-control_edit">
                                    <a href=directions_category/edit?id=' . $value->id .'>
                                        <svg class="svg-edit">
                                            <use xlink:href="#edit"></use>
                                        </svg>
                                    </a>
                                </td>
                                <td>' . $value->name_category . '</td>
                                <td>' . $value->name_direction . '</td>
                                <td>' . $value->price . '</td>
                                <td>' . $value->created_at . '</td>
                                <td>' . $value->updated_at . '</td>
                                <td>
                                    <a href=directions_category/warning?id=' . $value->id .'>
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