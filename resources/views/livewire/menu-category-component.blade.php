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
                                    <img src="{{asset('uploads/images/menu_categories/'.$menuCategory->image)}}"
                                        alt="Menu Category Inage" class=" img-thumbnail" width="100px">
                                </td>
                                <td>{{ $menuCategory->name}}</td>
                                <td>---</td>
                                <td>
                                    @if ($menuCategory->status == '1')
                                    <div class=" badge badge-success">Active</div>
                                    @elseif ($menuCategory->status == '0')
                                    <div class=" badge badge-warning">Inactive </div>
                                    @endif
                                </td>
                                <td>{{$menuCategory->created_at}}</td>
                                <td>{{$menuCategory->updated_at}}</td>
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
                            <div class="col-12">
                                <div class="container">
                                    <input name="file1" type="file" class="dropify" data-height="800" />
                                </div>
                            </div>
                            <div class="col-6">
                                <input type="text" id="name" placeholder="Category Name" class="form-control"
                                    wire:model="name">
                                @error('name')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <select class="form-control" wire:model='parent_menu_category_id' required>
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
</div>
@push('scripts')
<script>
    $(document).ready(function() {
        $('.dropify').dropify();
    })

    window.addEventListener('close-modal', event =>{
            $('#addMenuCategoryModal').modal('hide');
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