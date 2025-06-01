<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public string $id;
    public string $title;
    public string $formAction;
    public string $method;
    public ?string $submitText;

    public function __construct(
        string $id,
        string $title,
        string $formAction,
        string $method = 'POST',
        string $submitText = 'Simpan',
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->formAction = $formAction;
        $this->method = strtoupper($method);
        $this->submitText = $submitText;
    }
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
