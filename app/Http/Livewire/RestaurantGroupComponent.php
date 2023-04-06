<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\RestaurantGroup;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RestaurantGroupExport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\Console\RestartCommand;
use Symfony\Component\HttpFoundation\Response;

class RestaurantGroupComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $english_name, $myanmar_name, $phone, $status, $group_edit_id, $group_delete_id;
    public $view_english_name, $view_myanmar_name, $view_phone, $view_status;
    public $search = '';


    public function export()
    {
        // $restaurantGroups = RestaurantGroup::all();
        //abort_if(!in_array($ext, ['csv', 'xlsx', 'pdf']), Response::HTTP_NOT_FOUND);
        return Excel::download(new RestaurantGroupExport, 'restaurant group.xlsx');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function store()
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
        $this->english_name = '';
        $this->myanmar_name = '';
        $this->phone = '';
        $this->status = '';
        $this->dispatchBrowserEvent('close-modal');
    }

    public function edit($id)
    {
        $restaurantGroup = RestaurantGroup::where('id', $id)->first();
        $this->group_edit_id = $restaurantGroup->id;
        $this->english_name = $restaurantGroup->english_name;
        $this->myanmar_name = $restaurantGroup->myanmar_name;
        $this->phone = $restaurantGroup->phone;
        $this->status = $restaurantGroup->status;

        $this->dispatchBrowserEvent('show-edit-restaurantGroup-modal');
    }

    public function update()
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

        $this->resetInputs();
        session()->flash('message', 'Restaurant Group has been updated successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteConfirmation($id)
    {
        $this->group_delete_id = $id;

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function closeEditModal()
    {
        $this->resetInputs();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function cancel()
    {
        $this->group_delete_id = '';
    }

    public function destroy()
    {
        $restaurantGroup = RestaurantGroup::where('id', $this->group_delete_id)->first();
        $restaurantGroup->delete();

        session()->flash('info', 'Restaurant Group has been deleted successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->group_delete_id = '';
    }

    public function view($id)
    {
        $restaurantGroup = RestaurantGroup::where('id', $id)->first();

        $this->view_english_name = $restaurantGroup->english_name;
        $this->view_myanmar_name = $restaurantGroup->myanmar_name;
        $this->view_phone = $restaurantGroup->phone;
        $this->view_status = $restaurantGroup->status;

        $this->dispatchBrowserEvent('show-view-restaurantGroup-modal');
    }

    public function closeViewRestaurantGroupModal()
    {
        $this->view_english_name = '';
        $this->view_myanmar_name = '';
        $this->view_phone = '';
        $this->view_status = '';

        $this->dispatchBrowserEvent('close-modal');
    }

    public function close()
    {
        $this->resetInputs();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
    {
        $this->english_name = '';
        $this->myanmar_name = '';
        $this->phone = '';
        $this->status = '';
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        $restaurantGroups = RestaurantGroup::where('english_name', 'like', '%' . $this->search . '%')
            ->orWhere('phone', 'like', '%' . $this->search . '%')
            ->paginate(5);
        return view('livewire.restaurant-group-component', compact('restaurantGroups'));
    }
}
