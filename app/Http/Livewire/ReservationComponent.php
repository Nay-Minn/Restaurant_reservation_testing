<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ReservationComponent extends Component
{
    public $setTable = [];

    public function store()
    {
        dd($this->setTable);
    }

    public function cancel()
    {
        $this->setTable = [];
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {

        return view('livewire.reservation-component');
    }
}
