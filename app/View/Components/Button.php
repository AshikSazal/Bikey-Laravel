<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $class;
    public $id;
    /**
     * Create a new component instance.
     */
    public function __construct($type, $class=null, $id)
    {
        $this->type = $type;
        $this->class = $class;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
