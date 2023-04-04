<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PaymentMethod;

class PaymentMethodComponent extends Component
{
    public $payment_method, $status, $payment_method_edit_id, $payment_method_delete_id;
    public $view_payment_method, $view_status;

    public function store()
    {
        $this->validate([
            'payment_method' => 'required',
        ]);
        $payment_method = new PaymentMethod;
        $payment_method->payment_method = $this->payment_method;
        $payment_method->status = $this->status | 0;
        $payment_method->save();

        session()->flash('message', 'New payment method has been created');
        $this->resetInputs();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function edit($id)
    {
        $paymentMethod = PaymentMethod::where('id', $id)->first();
        $this->payment_method_edit_id = $paymentMethod->id;
        $this->payment_method = $paymentMethod->payment_method;
        $this->status = $paymentMethod->status;

        $this->dispatchBrowserEvent('show-edit-paymentMethod-modal');
    }

    public function update()
    {
        $this->validate([
            'payment_method' => 'required',
        ]);

        $paymentMethod = PaymentMethod::where('id', $this->payment_method_edit_id)->first();
        $paymentMethod->payment_method = $this->payment_method;
        $paymentMethod->status = $this->status;
        $paymentMethod->save();

        $this->resetInputs();
        session()->flash('message', 'Payment Method has been updated successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteConfirmation($id)
    {
        $this->payment_method_delete_id = $id;

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function closeEditModal()
    {
        $this->resetInputs();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function cancel()
    {
        $this->payment_method_delete_id = '';
    }

    public function destroy()
    {
        $paymentMethod = PaymentMethod::where('id', $this->payment_method_delete_id)->first();
        $paymentMethod->delete();

        session()->flash('info', 'Restaurant Group has been deleted successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->payment_method_delete_id = '';
    }

    public function view($id)
    {
        $paymentMethod = PaymentMethod::where('id', $id)->first();

        $this->view_payment_method = $paymentMethod->payment_method;
        $this->view_status = $paymentMethod->status;

        $this->dispatchBrowserEvent('show-view-paymentMethod-modal');
    }

    public function closeViewStudentModal()
    {
        $this->view_payment_method = '';
        $this->view_status = '';

        $this->dispatchBrowserEvent('close-modal');
    }

    public function close()
    {
        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->payment_method = "";
        $this->status = "";
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        $paymentMethods = PaymentMethod::all();
        return view('livewire.payment-method-component', compact('paymentMethods'));
    }
}
