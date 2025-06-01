<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ComboBox extends Component
{
    public $id;
    public $name;
    public $label;
    public $value;
    public $options;

    public function __construct($id, $name, $label = '', $value = '', $options = [])
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->options = $options;
    }

    public function render(): View|Closure|string
    {
        return view('components.combo-box');
    }
}
