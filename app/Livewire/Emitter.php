<?php

namespace App\Livewire;

use Livewire\Component;

class Emitter extends Component
{
    public string $signal;
    public string $message;
    public string $classes;

    public function emit()
    {
        $this->dispatch($this->signal);
    }

    public function mount(string $signal, string $message, string $classes)
    {
        $this->classes = $classes;
        $this->signal = $signal;
        $this->message = $message;
    }

    public function render()
    {
        return view('livewire.emitter');
    }
}
