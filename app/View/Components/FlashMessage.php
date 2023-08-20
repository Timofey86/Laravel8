<?php

namespace App\View\Components;

use App\Helpers\Flash\Flash;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FlashMessage extends Component
{

    public function __construct(
        public readonly Flash $flash,
    )
    {
    }

    public function render(): View|string
    {
        return view('components.flash', ['flash' => $this->flash]);
    }
}
