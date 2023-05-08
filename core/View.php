<?php

namespace app\core;

class View
{
    public string $title = "";

    public function renderView($view, $params = [])
    {
        $viewContent = $this->renderOnlyView($view, $params);
        $layout_content = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layout_content);
    }

    public function renderContent($contentContent)
    {
        $layout_content = $this->layoutContent();
        return str_replace('{{content}}', $contentContent, $layout_content);
    }

    protected function layoutContent()
    {
        $layout = Application::$app->layout;
        if (Application::$app->controller) {
            $layout = Application::$app->controller->layout;
        }
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key  = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR .  "/views/$view.php";
        return ob_get_clean();
    }
}