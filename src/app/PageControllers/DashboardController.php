<?php

namespace App\PageControllers;

use App\ViewsControllers\View;

class DashboardController {

    public function update(): string {
        return 'data';
    }

    public function store(): View {

        $value0 = 0;
        $value1 = 1;

        $showsForm = View::make('shows/SearchBar', [
                'value0' => $value0,
                'value1' => $value1,
            ]
        );
        return $showsForm;

    }

}