<div class="container-fluid">
    <div class="p-3 ">
        <h4 class="d-inline float-start">Table Lists</h4>
        <button class="btn btn-sm btn-primary" style="float: right;" data-toggle="modal"
            data-target="#addTableModal">Add New Table</button>
    </div>
    <div class="row">
        <div class="col-12 mb-3">
            <form class="form-inline my-2 my-lg-0 d-inline">
                <input class="form-control mr-sm-2" type="search" wire:model='search' placeholder="Search By Table Name"
                    aria-label="Search">
            </form>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session()->has('message'))
                    <div class="alert alert-success text-center">{{ session('message') }}</div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Table ID</th>
                                <th>Table Name</th>
                                <th>Seat Count</th>
                                <th>Status</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($tables->count() > 0)
                            @foreach ($tables as $table)
                            <tr>
                                <td>
                                    {{ $table->id }}
                                </td>
                                <td>Table {{ $table->table_no }}</td>
                                <td>{{$table->seat_count}}</td>
                                <td>
                                    @if ($table->status == '1')
                                    <div class=" badge badge-success">Active</div>
                                    @elseif ($table->status == '0')
                                    <div class=" badge badge-warning">Inactive </div>
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    <button class="btn btn-sm btn-secondary"
                                        wire:click="view({{ $table->id }})">View</button>
                                    <button class="btn btn-sm btn-primary"
                                        wire:click="edit({{ $table->id }})">Edit</button>
                                    <button class="btn btn-sm btn-danger"
                                        wire:click="deleteConfirmation({{ $table->id }})">Delete</button>
                                </td>
                            </tr>

                            @endforeach
                            {{ $tables->links() }}
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
    </div>

    {{-- Modal --}}
    <div wire:ignore.self class="modal fade" id="addTableModal" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Table</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store">
                        <div class="row">
                            <div class="col-6">
                                <input type="number" id="name" placeholder="Table No." class="form-control"
                                    wire:model="tableNo">
                                @error('tableNo')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <input type="number" id="name" placeholder="Seat Count" class="form-control"
                                    wire:model="seatCount">
                                @error('seatCount')
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
                                    Table</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="editTableModal" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Table</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click='closeEditModal'>
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="update">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" id="name" placeholder="Table No." class="form-control"
                                    wire:model="tableNo">
                                @error('tableNo')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <input type="text" id="name" placeholder="Seat Count" class="form-control"
                                    wire:model="seatCount">
                                @error('seatCount')
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
                                    Table</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="deleteTableModal" tabindex="-1" data-backdrop="static"
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
                    <h6>Are you sure? You want to delete this Payment Method!</h6>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary" wire:click="cancel()" data-dismiss="modal"
                        aria-label="Close">Cancel</button>
                    <button class="btn btn-sm btn-danger" wire:click="destroy()">Yes! Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="viewTableModal" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Table Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click='closeViewTableModal'>
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Table Name</th>
                                    <td>Table {{ $viewTableNo }}</td>
                                </tr>
                                <tr>
                                    <th>Seat Count</th>
                                    <td>{{ $viewSeatCount }}</td>
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
            $('#addTableModal').modal('hide');
            $('#editTableModal').modal('hide');
            $('#deleteTableModal').modal('hide');
            $('#viewTableModal').modal('hide')
        });

        window.addEventListener('show-edit-table-modal', event =>{
            $('#editTableModal').modal('show');
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteTableModal').modal('show');
        });

        window.addEventListener('show-view-table-modal', event =>{
            $('#viewTableModal').modal('show');
        });
</script>
@endpush