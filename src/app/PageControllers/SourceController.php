<?php


namespace App\PageControllers;


use App\ViewsControllers\View;

class SourceController {
    public function index(): string {
        $source_code = View::make('sources/index');
        return $source_code;
    }
}