<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Discount;

class DiscountComponent extends Component
{
    public $menuId, $discountTypeId, $discountGroupId, $title, $amount, $quantity, $startDate, $endDate, $status;
    public $discountEditId, $discountDeleteId;
    public $viewMenuId, $viewDiscountTypeId, $viewDiscountGroupId, $viewTitle,
        $viewAmount, $viewQuantity, $viewStartDate, $viewEndDate, $viewStatus;

    public function store()
    {
        //dd($this->restaurant_id, $this->table_no, $this->seat_count, $this->status);
        // $this->validate([
        //     'tableNo' => 'required',
        //     'seatCount' => 'required',
        // ]);
        $discount = new Discount;
        $discount->menu_id = $this->menuId;
        $discount->discount_type_id = $this->discountTypeId;
        $discount->discount_group_id = $this->discountGroupId;
        $discount->title = $this->title;
        $discount->amount = $this->amount;
        $discount->quantity = $this->quantity;
        $discount->start_date = $this->startDate;
        $discount->end_date = $this->endDate;
        $discount->status = $this->status | 0;
        $discount->save();

        session()->flash('message', 'New Discount has been created');
        $this->resetInputs();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function edit($id)
    {
        $discount = Discount::where('id', $id)->first();
        $this->discountEditId = $discount->id;
        $this->menuId = $discount->menu_id;
        $this->discountTypeId = $discount->discount_type_id;
        $this->discountGroupId = $discount->discount_group_id;
        $this->title = $discount->title;
        $this->amount = $discount->amount;
        $this->quantity = $discount->quantity;
        $this->startDate = $discount->start_date;
        $this->endDate = $discount->end_date;
        $this->status = $discount->status;

        $this->dispatchBrowserEvent('show-edit-discount-modal');
    }

    public function update()
    {
        // $this->validate([
        //     'name' => 'required',
        // ]);

        $discount = Discount::where('id', $this->discountEditId)->first();
        $discount->menu_id = $this->menuId;
        $discount->discount_type_id = $this->discountTypeId;
        $discount->discount_group_id = $this->discountGroupId;
        $discount->title = $this->title;
        $discount->amount = $this->amount;
        $discount->quantity = $this->quantity;
        $discount->start_date = $this->startDate;
        $discount->end_date = $this->endDate;
        $discount->status = $this->status;
        $discount->save();

        $this->resetInputs();
        session()->flash('message', 'Discount has been updated successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteConfirmation($id)
    {
        $this->discountDeleteId = $id;

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function destroy()
    {
        $discount = Discount::where('id', $this->discountDeleteId)->first();
        $discount->delete();

        session()->flash('info', 'Table has been deleted successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->discountDeleteId = '';
    }

    public function view($id)
    {
        $discount = Discount::where('id', $id)->first();
        $this->viewMenuId = $discount->menu_id;
        $this->viewDiscountTypeId = $discount->discount_type_id;
        $this->viewDiscountGroupId = $discount->discount_group_id;
        $this->viewTitle = $discount->title;
        $this->viewAmount = $discount->amount;
        $this->viewQuantity = $discount->quantity;
        $this->viewStartDate = $discount->start_date;
        $this->viewEndDate = $discount->end_date;
        $this->viewStatus = $discount->status;

        $this->dispatchBrowserEvent('show-view-discount-modal');
    }

    public function closeViewDiscountModal()
    {
        $this->viewMenuId = '';
        $this->viewDiscountTypeId = '';
        $this->viewDiscountGroupId = '';
        $this->viewTitle = '';
        $this->viewAmount = '';
        $this->viewQuantity = '';
        $this->viewStartDate = '';
        $this->viewEndDate = '';
        $this->viewStatus = '';

        $this->dispatchBrowserEvent('close-modal');
    }

    public function cancel()
    {
        $this->discountDeleteId = '';
    }

    public function close()
    {
        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->menuId = '';
        $this->discountTypeId = '';
        $this->discountGroupId = '';
        $this->title = '';
        $this->amount = '';
        $this->quantity = '';
        $this->startDate = '';
        $this->endDate = '';
        $this->status = '';
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        $discounts = Discount::all();
        return view('livewire.discount-component', compact('discounts'));
    }
}
