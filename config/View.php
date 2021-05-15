<?php

namespace Core;

use App\Model\AccountModel;
use App\Model\AccessModel;

class View {
    /**
     * рендерим хедер
     */
    public static function renderHeader()
    {
        $layout = dirname(__DIR__) . "/app/Views/layouts/header.php";
        $template = dirname(__DIR__) . "/app/Views/layouts/template.php";
        $sprite = dirname(__DIR__) . "/app/Views/layouts/svg_sprite.php";

        require $layout;
        require $template;
        require $sprite;
    }

    /**
     *  рендерим футер
     */
    public static function renderFooter()
    {
        $layout = dirname(__DIR__) . "/app/Views/layouts/footer.php";

        require $layout;
    }

    /**
     * Рендеринг страницы для вывода
     *
     * @param $view
     * @param array $param
     * @throws \Exception
     */
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = dirname(__DIR__) . "/app/Views/$view";

        if (is_readable($file)) {
            require $file;
        }else {
            throw new \Exception("$file не найден");
        }
    }

    /**
     * Рендеринг данных об аккаунте
     *
     * @throws \Exception
     */
    public static function renderAccountInformation()
    {
        $account = new AccountModel();
        $account_info = $account->getById($_SESSION['said']);
        $access = new AccessModel();
        $access_info = $access->getById($account_info['access_id']);

        self::render('layouts/account_info.php', ['access_info' => $access_info, 'account_info' => $account_info]);
    }
}