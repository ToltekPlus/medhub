<?php

namespace Core;

class View {
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