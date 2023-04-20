<div>
    <div>
        <form class="form-inline my-2 my-lg-0 d-inline">
            <input class="form-control mr-sm-2" type="search" wire:model='search'
                placeholder="Search by EN Name,MM Name" aria-label="Search">
        </form>
        <div class="form-group float-right">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input cursor-pointer" wire:model="status"
                    id="customSwitches">
                <label class="custom-control-label" for="customSwitches">Active Only</label>
            </div>
        </div>
    </div>
    <div class="row mt-2 p-3">
        @if ($menus->count() > 0)
        @foreach ($menus as $menu)
        <div class="col-md-3">
            <div class="card d-flex flex-column">
                <img class="card-img-top" style="height:250px; object-fit:cover"
                    src="{{asset('storage')}}/{{$menu->photos[1]}}" alt="Card image cap">
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title mx-auto">{{ $menu->english_name }}</h3>
                    <p class="card-text text-muted mx-auto">{{ $menu->myanmar_name }}</p>
                    <div class="row">
                        <div class="col-md-6">
                            <b>
                                <label for="">Price</label>
                                <h3>{{ $menu->basic_price }}$</h3>
                            </b>
                        </div>
                        <div class="col-md-6">
                            <label for="">Description</label>
                            <p class="card-text">{{ $menu->description }}</p>
                        </div>
                    </div>
                </div>
                <div class=" card-footer">
                    @if ($menu->status == 0)
                    <div class="badge badge-danger">Inactive</div>
                    @else
                    <div class="badge badge-success">Active</div>
                    @endif
                    <div class="float-right">
                        <a class="btn btn-sm btn-primary" href="{{url("menu/edit/$menu->id")}}">
                            <i class="fas fa-pen"></i>
                        </a>
                        <a class="btn btn-sm btn-danger" href=""><i class="fas fa-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <small>No Menu Found</small>
        @endif
    </div>
</div>