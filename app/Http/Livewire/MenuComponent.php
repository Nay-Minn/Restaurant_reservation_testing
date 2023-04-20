<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;

class MenuComponent extends Component
{
    public $status;
    public $search = '';

    public function filterbystatus($status = null)
    {
        $this->status = $status;
    }

    public function render()
    {
        $menus = Menu::select("*")
            ->when($this->search, function ($query) {

                $query->where('english_name', 'like', '%' . $this->search . '%');
            })
            ->when($this->status, function ($query) {
                $query->where('status', (isset($this->status)) ? 1 : 0);
            })->paginate(5);
        return view('livewire.menu-component', compact('menus'));
    }
}
