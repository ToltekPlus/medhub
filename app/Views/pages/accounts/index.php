<?php \Core\View::renderHeader(); ?>

<div class="block-right">
    <h1>Управление доступом</h1>

    <div class="dashboard-form">
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Пользователь</th>
                </tr>
                <?php
                    foreach ($accounts as $key => $value) {
                        echo
                            '<tr>
                                <td class="form-control_edit">
                                    <a href=access-up/up?access_id=' . $value->access_id .'&account_id='. $value->account_key .'>
                                        &#9650;
                                    </a>
                                    
                                    <a href=access-up/down?access_id=' . $value->access_id .'&account_id='. $value->account_key .'>
                                        &#9660;
                                    </a>
                                </td>
                                <td>' . $value->name . ' ' . $value->surname . ' | <strong>' . $value->name_access . '</strong></td>
                          </tr>';
                    }
                ?>
            </thead>
        </table>
    </div>
</div>

<?php \Core\View::renderFooter(); ?>