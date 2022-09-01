<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Designation extends Component
{
    public $type = '';

    public function render()
    {
        return view('livewire.designation');
    }
}
