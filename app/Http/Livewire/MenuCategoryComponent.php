<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MenuCategory;
use App\Models\ParentMenuCategory;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class MenuCategoryComponent extends Component
{
    use WithFileUploads;

    public $name, $photo, $parentMenuCategoryId, $status, $menuCategoryDeleteId, $menuCategoryEditId, $oldPhoto, $newPhoto;

    public $viewName, $viewPhoto, $viewParentCategory, $viewStatus;

    public function store()
    {
        // $this->validate([
        //     'name' => 'required',
        //     'parent_menu_category_id' => 'required',
        // ]);

        $uploadPhoto = $this->photo;
        $uploadPhotoName = uniqid() . $uploadPhoto->getClientOriginalName();
        if ($this->photo) {
            $uploadPhotoName = $this->photo->store('uploads/images/menu_category', 'public');
        } else {
            $uploadPhotoName = Null;
        }
        $this->photo = $uploadPhotoName;

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

    public function edit($id)
    {
        $menuCategory = MenuCategory::where('id', $id)->first();
        $this->menuCategoryEditId = $menuCategory->id;
        $this->name = $menuCategory->name;
        $this->oldPhoto = $menuCategory->photo;
        $this->parentMenuCategoryId = $menuCategory->parentMenuCategoryId;
        $this->status = $menuCategory->status;

        $this->dispatchBrowserEvent('show-edit-menuCategory-modal');
    }

    public function update()
    {
        //dd($this->myanmar_name, $this->english_name, $this->phone, $this->status);
        $this->validate([
            'name' => 'required',
        ]);

        $menuCategory = MenuCategory::where('id', $this->menuCategoryEditId)->first();
        $destination = public_path('storage\\' . $menuCategory->photo);
        if ($this->newPhoto != null) {
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $updatePhoto = $this->newPhoto;
            $updatePhotoName = uniqid() . $updatePhoto->getClientOriginalName();
            $updatePhotoName = $this->newPhoto->store('uploads/images/menu_category', 'public');
            $this->newPhoto = $updatePhotoName;
        } else {
            $updatePhotoName = $this->oldPhoto;
        }



        $menuCategory->name = $this->name;
        $menuCategory->parent_menu_category_id = $this->parentMenuCategoryId;
        $menuCategory->photo = $updatePhotoName;
        $menuCategory->status = $this->status | 0;
        $status =  $menuCategory->save();

        if ($status) {
            $this->resetInputs();
            session()->flash('message', 'Menu Category Group has been updated successfully');
            $this->dispatchBrowserEvent('close-modal');
        } else {
            session()->flash('error', 'Something went wrong');
        }
    }

    public function view($id)
    {
        $menuCategory = MenuCategory::where('id', $id)->first();

        $this->viewName = $menuCategory->name;
        $this->viewParentCategory = $menuCategory->parent_menu_category_id;
        $this->viewPhoto = $menuCategory->photo;
        $this->viewStatus = $menuCategory->status;

        $this->dispatchBrowserEvent('show-view-menuCategory-modal');
    }

    public function deleteConfirmation($id)
    {
        $this->menuCategoryDeleteId = $id;

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function cancel()
    {
        $this->menuCategoryDeleteId = '';
    }

    public function destroy()
    {
        $menuCategory = MenuCategory::where('id', $this->menuCategoryDeleteId)->first();
        $destination = public_path('storage\\' . $menuCategory->photo);
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $result = $menuCategory->delete();

        if ($result) {
            session()->flash('info', 'Restaurant Group has been deleted successfully');
            $this->dispatchBrowserEvent('close-modal');
            $this->menuCategoryDeleteId = '';
        } else {
            session()->flash('error', 'Something went wrong');
        }
    }

    public function resetInputs()
    {
        $this->photo = '';
        $this->name = '';
        $this->parentMenuCategoryId = '';
        $this->status = '';
    }

    public function render()
    {
        $menuCategories = MenuCategory::all();
        $parentMenuCategories = ParentMenuCategory::all();
        return view('livewire.menu-category-component', compact('menuCategories', 'parentMenuCategories',));
    }
}
