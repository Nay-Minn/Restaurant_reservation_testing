<div class="container-fluid ">
    <div class="col-md-12 ">
        <div class="card mt-3">
            <div class="card-header">
                <h3 class=" card-title">
                    Discount
                </h3>
                <button class="btn btn-sm btn-primary " style="float: right;" data-toggle="modal"
                    data-target="#addDiscountModal">Add New Discount</button>
            </div>
            <div class="card-body">
                @if (session()->has('message'))
                <div class="alert alert-success text-center">{{ session('message') }}</div>
                @endif

                <table class="table table-bordered table-hover dataTable dtr-inline">
                    <thead>
                        <tr>
                            <th>Discount ID</th>
                            <th>Title</th>
                            <th>Amount</th>
                            <th>Quantity</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($discounts->count() > 0)
                        @foreach ($discounts as $discount)
                        <tr>
                            <td>
                                {{ $discount->id }}
                            </td>
                            <td>Discount {{ $discount->title}}</td>
                            <td>{{$discount->amount}}</td>
                            <td>{{$discount->quantity}}</td>
                            <td>{{$discount->start_date}}</td>
                            <td>{{$discount->end_date}}</td>
                            <td>
                                @if ($discount->status == '1')
                                <div class=" badge badge-success">Active</div>
                                @elseif ($discount->status == '0')
                                <div class=" badge badge-warning">Inactive </div>
                                @endif
                            </td>
                            <td style="text-align: center;">
                                <button class="btn btn-sm btn-secondary"
                                    wire:click="view({{ $discount->id }})">View</button>
                                <button class="btn btn-sm btn-primary"
                                    wire:click="edit({{ $discount->id }})">Edit</button>
                                <button class="btn btn-sm btn-danger"
                                    wire:click="deleteConfirmation({{ $discount->id }})">Delete</button>
                            </td>
                        </tr>

                        @endforeach
                        {{-- {{ $discounts->links() }} --}}
                        @else
                        <tr>
                            <td colspan="4" style="text-align: center;"><small>No Table Found</small></td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- Modal --}}
    <div wire:ignore.self class="modal fade" id="addDiscountModal" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Discount</h5>
                    <button type="button" class="close" wire:click='close' data-dismiss='modal' aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store">
                        <div class="row">
                            <div class="col-6">
                                <select wire:model='menuId' class="form-control">
                                    <option value="0">Menu</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <select wire:model='discountTypeId' class="form-control">
                                    <option value="0">Discount Type</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                            <div class="col-6 mt-2">
                                <select wire:model="discountGroupId" class="form-control">
                                    <option value="0">Discount Group </option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                            <div class="col-6  mt-2">
                                <input type="text" id="name" placeholder="Title" class="form-control"
                                    wire:model="title">
                                @error('title')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6 mt-2">
                                <input type="text" id="name" placeholder="Amount" class="form-control"
                                    wire:model="amount">
                                @error('amount')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6 mt-2">
                                <input type="number" id="name" placeholder="Quantity" class="form-control"
                                    wire:model="quantity">
                                @error('quantity')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6 mt-2">
                                <label for="start_date">Start Date</label>
                                <input type="datetime-local" id="name" class="form-control" wire:model="startDate">
                                @error('startDate')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6 mt-2">
                                <label for="end_date">End Date</label>
                                <input type="datetime-local" id="name" class="form-control" wire:model="endDate">
                                @error('endDate')
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
                                    Discount</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="editDiscountModal" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Discount</h5>
                    <button type="button" class="close" wire:click='close' data-dismiss='modal' aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="update">
                        <div class="row">
                            <div class="col-6">
                                <select wire:model='menuId' class="form-control">
                                    <option value="0">Menu</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <select wire:model='discountTypeId' class="form-control">
                                    <option value="0">Discount Type</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                            <div class="col-6 mt-2">
                                <select wire:model="discountGroupId" class="form-control">
                                    <option value="0">Discount Group </option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                            <div class="col-6  mt-2">
                                <input type="text" id="name" placeholder="Title" class="form-control"
                                    wire:model="title">
                                @error('title')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6 mt-2">
                                <input type="text" id="name" placeholder="Amount" class="form-control"
                                    wire:model="amount">
                                @error('amount')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6 mt-2">
                                <input type="number" id="name" placeholder="Quantity" class="form-control"
                                    wire:model="quantity">
                                @error('quantity')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6 mt-2">
                                <label for="start_date">Start Date</label>
                                <input type="datetime-local" id="name" class="form-control" wire:model="startDate">
                                @error('startDate')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6 mt-2">
                                <label for="end_date">End Date</label>
                                <input type="datetime-local" id="name" class="form-control" wire:model="endDate">
                                @error('endDate')
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
                                    Discount</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="deleteDiscountModal" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" wire:click='cancel' aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4 pb-4">
                    <h6>Are you sure? You want to delete this Discount!</h6>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary" wire:click="cancel()" data-dismiss="modal"
                        aria-label="Close">Cancel</button>
                    <button class="btn btn-sm btn-danger" wire:click="destroy()">Yes! Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="viewDiscountModal" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Discount Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="closeViewDiscountModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Title</th>
                                    <td>{{ $viewTitle}}</td>
                                </tr>

                                <tr>
                                    <th>Amount</th>
                                    <td>{{ $viewAmount}}</td>
                                </tr>

                                <tr>
                                    <th>Quantity</th>
                                    <td>{{ $viewQuantity }}</td>
                                </tr>
                                <tr>
                                    <th>Start Date</th>
                                    <td>{{ $viewStartDate }}</td>
                                </tr>
                                <tr>
                                    <th>End Date</th>
                                    <td>{{ $viewEndDate }}</td>
                                </tr>

                                <tr>
                                    <th>Status</th>
                                    <td>{!! $viewStatus == 1 ? '<div class="badge badge-success">Active</div>' :
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
            $('#addDiscountModal').modal('hide');
            $('#editDiscountModal').modal('hide');
            $('#deleteDiscountModal').modal('hide');
            $('#viewDiscountModal').modal('hide')
        });

        window.addEventListener('show-edit-discount-modal', event =>{
            $('#editDiscountModal').modal('show');
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteDiscountModal').modal('show');
        });

        window.addEventListener('show-view-discount-modal', event =>{
            $('#viewDiscountModal').modal('show');
        });
</script>
@endpush