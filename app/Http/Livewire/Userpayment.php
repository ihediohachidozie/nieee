<?php

namespace App\Http\Livewire;

use App\Models\Specialty;
use Livewire\Component;

class Userpayment extends Component
{
    public $membershiptype;

    public function render()
    {
        return view('livewire.userpayment');
    }
}
