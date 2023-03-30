<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 style="float: left;"><strong>Payment Method</strong></h5>
                    <button class="btn btn-sm btn-primary" style="float: right;" data-bs-toggle="modal"
                        data-bs-target="#addPaymentMethodModal">Add New Payment Method</button>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                    <div class="alert alert-success text-center">{{ session('message') }}</div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($paymentMethods->count() > 0)
                            @foreach ($paymentMethods as $paymentMethod)
                            <tr>
                                <td>{{ $paymentMethod->id }}</td>
                                <td>{{ $paymentMethod->payment_method}}</td>
                                <td>
                                    @if ($paymentMethod->status == '1')
                                    <div class=" badge badge-success">Active</div>
                                    @elseif ($paymentMethod->status == '0')
                                    <div class=" badge badge-warning">Inactive </div>
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    <button class="btn btn-sm btn-secondary"
                                        wire:click="viewPaymentMethod({{ $paymentMethod->id }})">View</button>
                                    <button class="btn btn-sm btn-primary"
                                        wire:click="editPaymentMethod({{ $paymentMethod->id }})">Edit</button>
                                    <button class="btn btn-sm btn-danger"
                                        wire:click="deleteConfirmation({{ $paymentMethod->id }})">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4" style="text-align: center;"><small>No Payment Method Found</small></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div wire:ignore.self class="modal fade" id="addPaymentMethodModal" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Payment Method</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="createPaymentMethod">
                        <div class="row">
                            <div class="col-12">
                                <input type="text" id="name" placeholder="Payment Method" class="form-control"
                                    wire:model="payment_method">
                                @error('payment_method')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 mx-auto mb-3">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input cursor-pointer"
                                            wire:model.lazy="status" id="customSwitches">
                                        <label class="custom-control-label" for="customSwitches">Status</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary text-dark" style="width: 200px">Add
                                    Payment Method</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="editPaymentMethodModal" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Payment Method</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updatePaymentMethod">
                        <div class="row">
                            <div class="col-12">
                                <input type="text" id="name" placeholder="Payment Method" class="form-control"
                                    wire:model="payment_method">
                                @error('payment_method')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 mx-auto mb-3">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input cursor-pointer"
                                            wire:model.lazy="status" id="customSwitches">
                                        <label class="custom-control-label" for="customSwitches">Status</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary text-dark"
                                    style="width: 200px">Update
                                    Payment Method</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="deletePaymentMethodModal" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Confirmation</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4 pb-4">
                    <h6>Are you sure? You want to delete this Payment Method!</h6>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary" wire:click="cancel()" data-bs-dismiss="modal"
                        aria-label="Close">Cancel</button>
                    <button class="btn btn-sm btn-danger" wire:click="deletePaymentMethod()">Yes! Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="viewPaymentMethodModal" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Payment Method Detail</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Payment Method</th>
                                    <td>{{ $view_payment_method }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{!! $view_status == 1 ? '<div class="badge badge-success">Active</div>' :
                                        '<div class="badge badge-warning">Inactive</div>' !!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

@push('scripts')
<script>
    window.addEventListener('close-modal', event =>{
            $('#addPaymentMethodModal').modal('hide');
            $('#editPaymentMethodModal').modal('hide');
            $('#deletePaymentMethodModal').modal('hide');
        });

        window.addEventListener('show-edit-paymentMethod-modal', event =>{
            $('#editPaymentMethodModal').modal('show');
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deletePaymentMethodModal').modal('show');
        });

        window.addEventListener('show-view-paymentMethod-modal', event =>{
            $('#viewPaymentMethodModal').modal('show');
        });
</script>
@endpush