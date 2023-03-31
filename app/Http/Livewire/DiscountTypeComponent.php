<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DiscountType;

class DiscountTypeComponent extends Component
{

    public $name, $status, $discountTypeEditId, $discountTypeDeleteId;
    public $viewName, $viewStatus;

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);
        $discountType = new DiscountType;
        $discountType->name = $this->name;
        $discountType->status = $this->status | 0;
        $discountType->save();

        session()->flash('message', 'New Discount Type has been created');
        $this->resetInputs();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function edit($id)
    {
        $discountType = DiscountType::where('id', $id)->first();
        $this->discountTypeEditId = $discountType->id;
        $this->name = $discountType->name;
        $this->status = $discountType->status;

        $this->dispatchBrowserEvent('show-edit-discountType-modal');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $discountType = DiscountType::where('id', $this->discountTypeEditId)->first();
        $discountType->name = $this->name;
        $discountType->status = $this->status;
        $discountType->save();

        $this->resetInputs();
        session()->flash('message', 'Discount Type has been updated successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteConfirmation($id)
    {
        $this->discountTypeDeleteId = $id;

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function closeEditModal()
    {
        $this->resetInputs();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function cancel()
    {
        $this->discountTypeDeleteId = '';
    }

    public function destroy()
    {
        $discountType = DiscountType::where('id', $this->discountTypeDeleteId)->first();
        $discountType->delete();

        session()->flash('info', 'Restaurant Group has been deleted successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->discountTypeDeleteId = '';
    }

    public function view($id)
    {
        $discountType = DiscountType::where('id', $id)->first();

        $this->viewName = $discountType->name;
        $this->viewStatus = $discountType->status;

        $this->dispatchBrowserEvent('show-view-discountType-modal');
    }

    public function closeViewDiscountTypeModal()
    {
        $this->viewName = '';
        $this->viewStatus = '';

        $this->dispatchBrowserEvent('close-modal');
    }

    public function close()
    {
        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->name = "";
        $this->status = "";
    }

    public function render()
    {
        $discountTypes = DiscountType::all();
        return view('livewire.discount-type-component', compact('discountTypes'));
    }
}
