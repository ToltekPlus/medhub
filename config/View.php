<?php

namespace Core;

class View {
    /**
     * рендерим хедер
     */
    public static function renderHeader()
    {
        $layout = dirname(__DIR__) . "/app/Views/layouts/header.php";

        require $layout;
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
}