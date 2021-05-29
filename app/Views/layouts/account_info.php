<div class="account">
    <img src="<?=$account_info['userpic']?>" alt="userpic">
    <div class="account-info">
        <?=$account_info['name'] . " " . $account_info['surname']?>
        <div class="account-level">
            <?=$access_info['name_access']?>
        </div>
    </div>
    <div class="form-action">
        <div>
            <a href="/account/edit">
                <svg class="svg-edit">
                    <use xlink:href="#edit"></use>
                </svg>
            </a>
        </div>

        <div>
            <a href=/logout>
                <svg class="svg-logout">
                    <use xlink:href="#logout"></use>
                </svg>
            </a>
        </div>
    </div>
</div>
