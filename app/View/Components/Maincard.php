<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Maincard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;
    public $count;
    public $image;

    public function __construct($title, $count, $image)
    {
        $this->title = $title;
        $this->count = $count;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.maincard');
    }
}
