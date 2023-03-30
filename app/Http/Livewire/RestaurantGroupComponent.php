<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\RestaurantGroup;

class RestaurantGroupComponent extends Component
{

    public $english_name, $myanmar_name, $phone, $status, $group_edit_id, $group_delete_id;
    public $view_english_name, $view_myanmar_name, $view_phone, $view_status;

    public function createGroup()
    {
        $this->validate([
            'english_name' => 'required',
            'myanmar_name' => 'required',
            'phone' => 'required|numeric',
        ]);


        $restaurantGroup = new RestaurantGroup();
        $restaurantGroup->english_name = $this->english_name;
        $restaurantGroup->myanmar_name = $this->myanmar_name;
        $restaurantGroup->phone = $this->phone;
        $restaurantGroup->status = $this->status | 0;
        $restaurantGroup->save();

        session()->flash('message', 'New Group has been created');
        $this->resetInputs();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editGroup($id)
    {
        $restaurantGroup = RestaurantGroup::where('id', $id)->first();
        $this->group_edit_id = $restaurantGroup->id;
        $this->english_name = $restaurantGroup->english_name;
        $this->myanmar_name = $restaurantGroup->myanmar_name;
        $this->phone = $restaurantGroup->phone;
        $this->status = $restaurantGroup->status;

        $this->dispatchBrowserEvent('show-edit-restaurantGroup-modal');
    }

    public function updateGroup()
    {
        //dd($this->myanmar_name, $this->english_name, $this->phone, $this->status);
        $this->validate([
            'english_name' => 'required',
            'myanmar_name' => 'required',
            'phone' => 'required|numeric',
        ]);
        $restaurantGroup = RestaurantGroup::where('id', $this->group_edit_id)->first();
        $restaurantGroup->english_name = $this->english_name;
        $restaurantGroup->myanmar_name = $this->myanmar_name;
        $restaurantGroup->phone = $this->phone;
        $restaurantGroup->status = $this->status | 0;
        $restaurantGroup->save();

        session()->flash('message', 'Restaurant Group has been updated successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteConfirmation($id)
    {
        $this->group_delete_id = $id;

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function cancel()
    {
        $this->group_delete_id = '';
    }

    public function deleteGroup()
    {
        $restaurantGroup = RestaurantGroup::where('id', $this->group_delete_id)->first();
        $restaurantGroup->delete();

        session()->flash('info', 'Restaurant Group has been deleted successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->group_delete_id = '';
    }

    public function viewGroup($id)
    {
        $restaurantGroup = RestaurantGroup::where('id', $id)->first();

        $this->view_english_name = $restaurantGroup->english_name;
        $this->view_myanmar_name = $restaurantGroup->myanmar_name;
        $this->view_phone = $restaurantGroup->phone;
        $this->view_status = $restaurantGroup->status;

        $this->dispatchBrowserEvent('show-view-restaurantGroup-modal');
    }

    public function closeViewStudentModal()
    {
        $this->view_english_name = '';
        $this->view_myanmar_name = '';
        $this->view_phone = '';
        $this->view_status = '';
    }

    public function close()
    {
        $this->resetInput();
    }

    public function resetInputs()
    {
        $this->english_name = '';
        $this->myanmar_name = '';
        $this->phone = '';
        $this->status = '';
    }



    public function render()
    {
        $restaurantGroups = RestaurantGroup::all();
        return view('livewire.restaurant-group-component', compact('restaurantGroups'));
    }
}
