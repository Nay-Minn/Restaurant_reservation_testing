<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DiscountGroup;


class DiscountGroupsComponent extends Component
{
    public $name, $status, $discountGroupEditId, $discountGroupDeleteId;
    public $viewName, $viewStatus;

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);
        $discountGroup = new DiscountGroup;
        $discountGroup->name = $this->name;
        $discountGroup->status = $this->status | 0;
        $discountGroup->save();

        session()->flash('message', 'New Discount Group has been created');
        $this->resetInputs();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function edit($id)
    {
        $discountGroup = DiscountGroup::where('id', $id)->first();
        $this->discountGroupEditId = $discountGroup->id;
        $this->name = $discountGroup->name;
        $this->status = $discountGroup->status;

        $this->dispatchBrowserEvent('show-edit-discountGroup-modal');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $discountGroup = DiscountGroup::where('id', $this->discountGroupEditId)->first();
        $discountGroup->name = $this->name;
        $discountGroup->status = $this->status;
        $discountGroup->save();

        $this->resetInputs();
        session()->flash('message', 'Discount Group has been updated successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteConfirmation($id)
    {
        $this->discountGroupDeleteId = $id;

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function closeEditModal()
    {
        $this->resetInputs();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function cancel()
    {
        $this->discountGroupDeleteId = '';
    }

    public function destroy()
    {
        $discountGroup = DiscountGroup::where('id', $this->discountGroupDeleteId)->first();
        $discountGroup->delete();

        session()->flash('info', 'Discount Group has been deleted successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->discountGroupDeleteId = '';
    }

    public function view($id)
    {
        $discountGroup = DiscountGroup::where('id', $id)->first();

        $this->viewName = $discountGroup->name;
        $this->viewStatus = $discountGroup->status;

        $this->dispatchBrowserEvent('show-view-discountGroup-modal');
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
        $discountGroups = DiscountGroup::all();
        return view('livewire.discount-groups-component', compact('discountGroups'));
    }
}
