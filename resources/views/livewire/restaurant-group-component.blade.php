<div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 mb-3">
                <form class="form-inline my-2 my-lg-0 d-inline">
                    <input class="form-control mr-sm-2" type="search" wire:model='search'
                        placeholder="Search by EN Name, Phone" aria-label="Search">
                </form>
                <a href="{{route('file_export')}}" class="btn btn-sm btn-success">Download</a>
                <button class="btn btn-sm btn-info" wire:click="export('xlsx')" wire:loading.attr='disabled'>
                    Download XLSX
                </button>
                <button class="btn btn-sm btn-danger" wire:click="export('pdf')" wire:loading.attr='disabled'>
                    Download PDF
                </button>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 style="float: left;"><strong>Restaurant Groups</strong></h5>
                        <button class="btn btn-sm btn-primary" style="float: right;" data-toggle="modal"
                            data-target="#addRestaurantGroupModal">Add New Restaurant Group</button>
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                        <div class="alert alert-success text-center">{{ session('message') }}</div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Restaurant ID</th>
                                    <th>English Name</th>
                                    <th>Myanmar Name</th>
                                    <th>Phone</th>
                                    <th>Created Date</th>
                                    <th>Status</th>
                                    <th>Number of Restaurants</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($restaurantGroups->count() > 0)
                                @foreach ($restaurantGroups as $restaurantGroup)
                                <tr>
                                    <td>{{ $restaurantGroup->id }}</td>
                                    <td>{{ $restaurantGroup->english_name}}</td>
                                    <td>{{ $restaurantGroup->myanmar_name }}</td>
                                    <td>{{ $restaurantGroup->phone }}</td>
                                    <td>{{$restaurantGroup->created_at->format('Y-F-d')}}</td>
                                    <td>
                                        @if ($restaurantGroup->status == '1')
                                        <div class=" badge badge-success">Active</div>
                                        @elseif ($restaurantGroup->status == '0')
                                        <div class=" badge badge-warning">Inactive </div>
                                        @endif
                                    </td>
                                    <td>{{count($restaurantGroup->restaurants)}}</td>
                                    <td style="text-align: center;">
                                        <button class="btn btn-sm btn-secondary"
                                            wire:click="view({{ $restaurantGroup->id }})">View</button>
                                        <button class="btn btn-sm btn-primary"
                                            wire:click="edit({{ $restaurantGroup->id }})">Edit</button>
                                        <button class="btn btn-sm btn-danger"
                                            wire:click="deleteConfirmation({{ $restaurantGroup->id }})">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                                {{ $restaurantGroups->links() }}
                                @else
                                <tr>
                                    <td colspan="4" style="text-align: center;"><small>No Student Found</small></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="addRestaurantGroupModal" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Restaurant Group</h5>
                    <button type="button" class="close" wire:click='close' aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form wire:submit.prevent="store">

                        <div class="row">
                            <div class="col-6">
                                <input type="text" id="name" placeholder="Name EN" class="form-control"
                                    wire:model="english_name">
                                @error('english_name')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <input type="text" id="email" placeholder="Name MM" class="form-control"
                                    wire:model="myanmar_name">
                                @error('myanmar_name')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <input type="text" id="phone" placeholder="Phone" class="form-control"
                                    wire:model="phone">
                                @error('phone')
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
                                        <label class="custom-control-label" for="customSwitches">Active</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary text-dark" style="width: 200px">Add
                                    Student</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="editRestaurantGroupModal" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Restaurant Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="closeEditModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form wire:submit.prevent="update">

                        <div class="row">
                            <div class="col-6">
                                <input type="text" id="name" placeholder="Name EN" class="form-control"
                                    wire:model="english_name">
                                @error('english_name')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <input type="text" id="email" placeholder="Name MM" class="form-control"
                                    wire:model="myanmar_name">
                                @error('myanmar_name')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <input type="text" id="phone" placeholder="Phone" class="form-control"
                                    wire:model="phone">
                                @error('phone')
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
                                        <label class="custom-control-label" for="customSwitches">Active</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary text-dark"
                                    style="width: 200px">Update
                                    Restaurant Group</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="deleteRestaurantGroupModal" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='cancel()'>
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4 pb-4">
                    <h6>Are you sure? You want to delete this Restaurant Group!</h6>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary" wire:click="cancel()" data-dismiss="modal"
                        aria-label="Close">Cancel</button>
                    <button class="btn btn-sm btn-danger" wire:click="destroy()">Yes! Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="viewRestaurantGroupModal" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Restaurant Group Detail</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeViewRestaurantGroupModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>English Name</th>
                                    <td>{{ $view_english_name }}</td>
                                </tr>

                                <tr>
                                    <th>Myanmar Name</th>
                                    <td>{{ $view_myanmar_name }}</td>
                                </tr>

                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $view_phone }}</td>
                                </tr>

                                <tr>
                                    <th>Status</th>
                                    <td>{{$view_status == 1 ? "Active" : "Inactive" }}</td>
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
            $('#addRestaurantGroupModal').modal('hide');
            $('#editRestaurantGroupModal').modal('hide');
            $('#deleteRestaurantGroupModal').modal('hide');
            $('#viewRestaurantGroupModal').modal('hide');
        });

        window.addEventListener('show-edit-restaurantGroup-modal', event =>{
            $('#editRestaurantGroupModal').modal('show');
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteRestaurantGroupModal').modal('show');
        });

        window.addEventListener('show-view-restaurantGroup-modal', event =>{
            $('#viewRestaurantGroupModal').modal('show');
        });
</script>
@endpush