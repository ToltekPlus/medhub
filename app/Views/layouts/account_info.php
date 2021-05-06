<?php
use App\Model\AccountModel;
use App\Model\AccessModel;

$account = new AccountModel();
$account_info = $account->getById($_SESSION['said']);
$access = new AccessModel();
$access_info = $access->getById($account_info['access_id']);
?>

<div class="account">
    <img src="<?php echo $account_info['userpic']?>" alt="userpic">
    <div class="account-info">
        <?php echo $account_info['name'] . " " . $account_info['surname']?>
        <div class="account-level">
            <?php echo $access_info['name_access']?>
        </div>
    </div>
    <div>
        <a href="/account/edit">Edit</a>
        <br>
        <a href=logout>Exit</a>
    </div>
</div>
