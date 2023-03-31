<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MenuCategory;
use App\Models\ParentMenuCategory;

class MenuCategoryComponent extends Component
{
    public $name, $photo, $parentMenuCategoryId, $status;

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'parent_menu_category_id' => 'required',
        ]);

        $menuCategory = new MenuCategory;
        $menuCategory->photo = $this->photo;
        $menuCategory->name = $this->name;
        $menuCategory->parent_menu_category_id = $this->parentMenuCategoryId;
        $menuCategory->status = $this->status | 0;
        $menuCategory->save();

        session()->flash('message', 'New Menu Category has been created');
        $this->photo = '';
        $this->name = '';
        $this->parentMenuCategoryId = '';
        $this->status = '';
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $menuCategories = MenuCategory::all();
        $parentMenuCategories = ParentMenuCategory::all();
        return view('livewire.menu-category-component', compact('menuCategories', 'parentMenuCategories'));
    }
}
