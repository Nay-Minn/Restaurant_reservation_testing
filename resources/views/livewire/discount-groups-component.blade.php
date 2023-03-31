<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 style="float: left;"><strong>Discount Group</strong></h5>
                    <button class="btn btn-sm btn-primary" style="float: right;" data-toggle="modal"
                        data-target="#addDiscountGroupModal">Add New Discount Group</button>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                    <div class="alert alert-success text-center">{{ session('message') }}</div>
                    @endif

                    @if (session('info'))
                    <div class="alert alert-info">{{session('info')}}</div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Discount Group</th>
                                <th>Status</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($discountGroups->count() > 0)
                            @foreach ($discountGroups as $discountGroup)
                            <tr>
                                <td>{{ $discountGroup->id }}</td>
                                <td>{{ $discountGroup->name}}</td>
                                <td>
                                    @if ($discountGroup->status == '1')
                                    <div class=" badge badge-success">Active</div>
                                    @elseif ($discountGroup->status == '0')
                                    <div class=" badge badge-warning">Inactive </div>
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    <button class="btn btn-sm btn-secondary"
                                        wire:click="view({{ $discountGroup->id }})">View</button>
                                    <button class="btn btn-sm btn-primary"
                                        wire:click="edit({{ $discountGroup->id }})">Edit</button>
                                    <button class="btn btn-sm btn-danger"
                                        wire:click="deleteConfirmation({{ $discountGroup->id }})">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4" style="text-align: center;"><small>No Discount Group Found</small></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div wire:ignore.self class="modal fade" id="addDiscountGroupModal" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Discount Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store">
                        <div class="row">
                            <div class="col-12">
                                <input type="text" id="name" placeholder="Discount Group Name" class="form-control"
                                    wire:model="name">
                                @error('name')
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
                                    style="width: 200px">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="editDiscountGroupModal" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Discount Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click='closeEditModal'>
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="update">
                        <div class="row">
                            <div class="col-12">
                                <input type="text" id="name" placeholder="Discount Group Name" class="form-control"
                                    wire:model="name">
                                @error('name')
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
                                    style="width: 200px">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="deleteDiscountGroupModal" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4 pb-4">
                    <h6>Are you sure? You want to delete this Discount Group!</h6>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary" wire:click="cancel()" data-dismiss="modal"
                        aria-label="Close">Cancel</button>
                    <button class="btn btn-sm btn-danger" wire:click="destroy()">Yes! Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="viewDiscountGroupModal" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Discount Group Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click='closeViewDiscountTypeModal'>
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Discount Group Name</th>
                                    <td>{{ $viewName }}</td>
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
            $('#addDiscountGroupModal').modal('hide');
            $('#editDiscountGroupModal').modal('hide');
            $('#deleteDiscountGroupModal').modal('hide');
            $('#viewDiscountGroupModal').modal('hide')
        });

        window.addEventListener('show-edit-discountGroup-modal', event =>{
            $('#editDiscountGroupModal').modal('show');
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteDiscountGroupModal').modal('show');
        });

        window.addEventListener('show-view-discountGroup-modal', event =>{
            $('#viewDiscountGroupModal').modal('show');
        });
</script>
@endpush