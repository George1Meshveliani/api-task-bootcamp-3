<?php


namespace App\PageControllers;


use App\ViewsControllers\View;

class SourceController  {
    public function index(): View {
        $source_code = View::make('sources/index');
        return $source_code;
    }
}