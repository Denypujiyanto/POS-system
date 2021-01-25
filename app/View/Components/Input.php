<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $name,
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.input');
    }
}
