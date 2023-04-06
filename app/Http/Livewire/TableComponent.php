<?php

namespace App\Http\Livewire;

use App\Models\Table;
use Livewire\Component;
use Livewire\WithPagination;

class TableComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $restaurantId, $tableNo, $seatCount, $status;
    public $tableNoEdit, $seatCountEdit, $tableEditId;
    public $tableDeleteId;
    public $search = '';
    public $viewTableNo, $viewSeatCount, $viewStatus;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function store()
    {
        //dd($this->restaurant_id, $this->table_no, $this->seat_count, $this->status);
        $this->validate([
            'tableNo' => 'required',
            'seatCount' => 'required',
        ]);
        $table = new Table;
        $table->table_no = $this->tableNo;
        $table->seat_count = $this->seatCount;
        $table->status = $this->status | 0;
        $table->save();

        session()->flash('message', 'New Table has been created');
        $this->resetInputs();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function edit($id)
    {
        $table = Table::where('id', $id)->first();
        $this->tableEditId = $table->id;
        $this->tableNo = $table->table_no;
        $this->seatCount = $table->seat_count;
        $this->status = $table->status;

        $this->dispatchBrowserEvent('show-edit-table-modal');
    }

    public function update()
    {
        $this->validate([
            'tableNo' => 'required',
            'seatCount' => 'required',
        ]);

        $table = Table::where('id', $this->tableEditId)->first();
        $table->table_no = $this->tableNo;
        $table->seat_count = $this->seatCount;
        $table->status = $this->status;
        $table->save();

        $this->resetInputs();
        session()->flash('message', 'Table has been updated successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteConfirmation($id)
    {
        $this->tableDeleteId = $id;

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function cancel()
    {
        $this->tableDeleteId = '';
    }

    public function destroy()
    {
        $table = Table::where('id', $this->table_delete_id)->first();
        $table->delete();

        session()->flash('info', 'Table has been deleted successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->tableDeleteId = '';
    }

    public function view($id)
    {
        $table = Table::where('id', $id)->first();

        $this->viewTableNo = $table->table_no;
        $this->viewSeatCount = $table->seat_count;
        $this->viewStatus = $table->status;

        $this->dispatchBrowserEvent('show-view-table-modal');
    }

    public function closeViewTableModal()
    {
        $this->viewTableNo = '';
        $this->viewSeatCount = '';
        $this->viewStatus = '';

        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeEditModal()
    {
        $this->resetInputs();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
    {
        $this->tableNo = '';
        $this->seatCount = '';
        $this->status = '';
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        $tables = Table::where('table_no', 'like', '%' . $this->search . '%')->paginate(2);
        return view('livewire.table-component', compact('tables'));
    }
}
