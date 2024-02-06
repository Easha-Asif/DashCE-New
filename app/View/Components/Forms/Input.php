<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $name;
    public $placeholder;
    public $type;

    public function __construct($title, $type, $name,$placeholder)
    {
        $this->title = $title;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input');
    }
}
