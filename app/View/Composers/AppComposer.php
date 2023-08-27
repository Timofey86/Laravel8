<?php

namespace App\View\Composers;

use Illuminate\View\View;

class AppComposer
{
    public function compose(View $view): void
    {
        $view->with('version', 2);
    }

}
