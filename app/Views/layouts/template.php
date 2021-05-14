<div class="block-left">
    <div class="logo"></div>
    <?php \Core\View::renderAccountInformation(); ?>
    <nav>
        <div class="block-left-navigation">
            <?php switch ($_SESSION['saccess'])
            {
                case 1:
                    require_once __DIR__ . '/../navigation/user.php';
                    break;
                case 2:
                    require_once __DIR__ . '/../navigation/doctor.php';
                    break;
                case 3:
                    require_once __DIR__ . '/../navigation/admin.php';
                    break;
            }
            ?>
        </div>
    </nav>
</div>
