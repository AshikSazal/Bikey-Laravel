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
    public $disabled;
    /**
     * Create a new component instance.
     */
    public function __construct($type, $class, $id, $disabled)
    {
        $this->type = $type;
        $this->class = $class;
        $this->id = $id;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
