<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Test extends Component
{
    public $posts;
    public $count;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($posts, $count)
    {
        $this->posts = $posts;
        $this->count = $count;
    }

    public function test($str)
    {
        return $str;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.test', [

        ]);
    }
}
