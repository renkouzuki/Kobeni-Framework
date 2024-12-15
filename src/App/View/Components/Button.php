<?php

namespace App\View\Components;

use KobeniFramework\View\Components\Component;

class Button extends Component
{
    public function render()
    {
        return $this->view('button', [
            'type' => $this->data['type'] ?? 'primary',
            'text' => $this->data['text'] ?? 'Button',
            'size' => $this->data['size'] ?? 'md'
        ]);
    }
}