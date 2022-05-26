<?php


namespace App\ViewsControllers;


use App\Exceptions\ServerError;
use App\Exceptions\ViewNotFound;

class View {

    /**
     * View constructor.
     * @param string $view
     * @param array $params
     */
    public function __construct(
        protected string $view,
        protected array $params = []) {

    }

    public static function make(string $view, array $params = []) {
        return new static($view, $params);
    }
    public function render() {

        $view_path = VIEW_PATH . '/' . $this->view . '.php';
        if (!$view_path) {
            throw new ViewNotFound();
        }

        foreach ($this->params as $key => $value) {
            $$key = $value;
        }

        ob_start();

        include $view_path;

        return ob_get_clean();
    }

    public function __toString(): string {

        try {
            return $this->render();
        } catch (ViewNotFound $e) {
            throw new ServerError();
        }
    }
}