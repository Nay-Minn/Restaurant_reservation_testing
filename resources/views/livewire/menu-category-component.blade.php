<div class=" container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 style="float: left;"><strong>Menu Category</strong></h5>
                    <button class="btn btn-sm btn-primary" style="float: right;" data-toggle="modal"
                        data-target="#addMenuCategoryModal">Add New Menu Category</button>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                    <div class="alert alert-success text-center">{{ session('message') }}</div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Category Name</th>
                                <th>ParentCategory</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th>Modified Date</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($menuCategories->count() > 0)
                            @foreach ($menuCategories as $menuCategory)
                            <tr>
                                <td>
                                    <img src="{{asset('storage')}}/{{$menuCategory->photo}}" alt="Menu Category Image"
                                        class=" img-thumbnail" width="100px">
                                </td>
                                <td>{{ $menuCategory->name}}</td>
                                <td>{{$menuCategory->parent_menu_category_id}}</td>
                                <td>
                                    @if ($menuCategory->status == '1')
                                    <div class=" badge badge-success">Active</div>
                                    @elseif ($menuCategory->status == '0')
                                    <div class=" badge badge-warning">Inactive </div>
                                    @endif
                                </td>
                                <td>{{$menuCategory->created_at->format('Y-m-d')}}</td>
                                <td>{{$menuCategory->updated_at->format('Y-m-d')}}</td>
                                <td style="text-align: center;">
                                    <button class="btn btn-sm btn-secondary"
                                        wire:click="view({{ $menuCategory->id }})">View</button>
                                    <button class="btn btn-sm btn-primary"
                                        wire:click="edit({{ $menuCategory->id }})">Edit</button>
                                    <button class="btn btn-sm btn-danger"
                                        wire:click="deleteConfirmation({{ $menuCategory->id }})">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4" style="text-align: center;"><small>No Menu Category Found</small></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div wire:ignore.self class="modal fade" id="addMenuCategoryModal" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Menu Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form wire:submit.prevent="store">

                        <div class="row">
                            <div class="col-12 mb-2">
                                <input type="file" class="form-control" wire:model="photo">
                            </div>
                            <div class="col-6">
                                <input type="text" id="name" placeholder="Category Name" class="form-control"
                                    wire:model="name">
                                @error('name')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <select class="form-control" wire:model='parentMenuCategoryId' required>
                                    <option value="0" selected>Select Parent Category</option>
                                    @foreach ($parentMenuCategories as $parentMenuCategory)
                                    <option value="{{$parentMenuCategory->id}}">{{$parentMenuCategory->name}}</option>
                                    @endforeach
                                </select>
                                @error('parent_menu_category_id')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input cursor-pointer"
                                        wire:model.lazy="status" id="customSwitches">
                                    <label class="custom-control-label" for="customSwitches">Active</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 mx-auto mb-3">
                                <button type="submit" class="btn btn-sm btn-primary text-dark"
                                    style="width: 200px">Create Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="editMenuCategoryModal" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Menu Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form wire:submit.prevent="update">

                        <div class="row">
                            {{-- <div class="col-6 mb-2 mx-auto">
                                @if ($newPhoto)
                                <img src="{{$newPhoto->temporaryUrl() }}" class="img-thumbnail"
                                    style="width: 150px;height:150px;" alt="">
                                @elseif($oldPhoto)
                                <img src="{{ asset('storage') }}/{{$oldPhoto}}" class="img-thumbnail"
                                    style="width: 150px;height:150px;" alt="">
                                @endif
                                <input type="hidden" wire:model='oldPhoto' name="" id="">

                            </div> --}}
                            <div class="col-12 mb-2">
                                <input type="file" class="form-control" wire:model="newPhoto">
                            </div>
                            <div class="col-6">
                                <input type="text" id="name" placeholder="Category Name" class="form-control"
                                    wire:model="name">
                                @error('name')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <select class="form-control" wire:model='parentMenuCategoryId' required>
                                    <option value="0" selected>Select Parent Category</option>
                                    @foreach ($parentMenuCategories as $parentMenuCategory)
                                    <option value="{{$parentMenuCategory->id}}">{{$parentMenuCategory->name}}</option>
                                    @endforeach
                                </select>
                                @error('parent_menu_category_id')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input cursor-pointer"
                                        wire:model.lazy="status" id="customSwitches">
                                    <label class="custom-control-label" for="customSwitches">Active</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 mx-auto mb-3">
                                <button type="submit" class="btn btn-sm btn-primary text-dark"
                                    style="width: 200px">Update Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="viewMenuCategoryModal" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Restaurant Group Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $viewName }}</td>
                                </tr>

                                <tr>
                                    <th>ParentCategory</th>
                                    <td>{{ $viewParentCategory }}</td>
                                </tr>

                                <tr>
                                    <th>Photo</th>
                                    <td>
                                        <img src="{{ asset('storage') }}/{{$viewPhoto}}" class="img-thumbnail"
                                            style="width: 100px;height:100px;" alt="">
                                    </td>
                                </tr>

                                <tr>
                                    <th>Status</th>
                                    <td>{{$viewStatus == 1 ? "Active" : "Inactive" }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="deleteMenuCategoryModal" tabindex="-1" data-backdrop="static"
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
</div>
@push('scripts')
<script>
    window.addEventListener('close-modal', event =>{
            $('#addMenuCategoryModal').modal('hide');
            $('#editMenuCategoryModal').modal('hide');
            $('#deleteMenuCategoryModal').modal('hide');
            $('#viewMenuCategoryModal').modal('hide');
        });

        window.addEventListener('show-edit-menuCategory-modal', event =>{
            $('#editMenuCategoryModal').modal('show');
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteMenuCategoryModal').modal('show');
        });

        window.addEventListener('show-view-menuCategory-modal', event =>{
            $('#viewMenuCategoryModal').modal('show');
        });
</script>
@endpush