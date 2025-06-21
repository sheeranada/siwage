<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalLg extends Component
{
    public string $id;
    public string $btnLabel;
    public string $action;
    public string $method;
    public string $btnSubmit;
    public ?string $icon;
    public ?string $btn;

    public function __construct($id, $btnLabel = null, $action, $method = 'POST', $btnSubmit = null, $icon = null, $btn = null)
    {
        $this->id = $id;
        $this->btnLabel = $btnLabel;
        $this->action = $action;
        $this->method = strtoupper($method);

        $this->btnSubmit = $btnSubmit ?? ($this->method === 'POST' ? 'Simpan' : 'Update');
        $this->icon = $icon;
        $this->btn = !empty($btn) ? $btn : 'primary';
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-lg');
    }
}
