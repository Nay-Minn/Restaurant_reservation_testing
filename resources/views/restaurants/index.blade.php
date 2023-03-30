@extends('layouts.app')

@section('content')

<div class="container-fluid">
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif

    @if (session('info'))
    <div class=" alert alert-info" role="alert">
        {{session("info")}}
    </div>
    @endif

    <div class="container p-3">
        <div class="slider">
            <div class="slide">
                <img src="https://images.unsplash.com/photo-1678933964625-0b57a7ce3c1f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                    alt="photo" style="height: 200px; width:300px; object-fit:cover" />
            </div>
            <div class="slide">
                <img src="https://images.unsplash.com/photo-1678933632079-d29d876dbc0e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80"
                    alt="photo" style="height: 200px; width:300px; object-fit:cover" />
            </div>
            <div>
                <img src="https://images.unsplash.com/photo-1678933632079-d29d876dbc0e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                    alt="photo" style="height: 200px; object-fit:cover">
            </div>
            <div>
                <img src="https://plus.unsplash.com/premium_photo-1672264150574-4761d2dc3e26?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80"
                    alt="photo" style="height: 200px; width:300px; object-fit:cover">
            </div>
        </div>
    </div>
</div>

<div class="card mt-3">
    <div class="card-header d-inline">
        <h2 class="card-title">Restaurants</h2>

        <a href="{{route( 'create_restaurant')}} " class=" card-title float-right">
            <h3 class=" card-title">Create New Restaurant</h3>
        </a>
    </div>

    <div class="card-body">
        <div class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <div class="row">
                <div class="col-sm-12 col-md-6"></div>
                <div class="col-sm-12 col-md-6"></div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                        aria-describedby="example2_info">
                        <thead>
                            <tr>
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">Restaurant ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Restaurant Name(EN)</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Restaurant Name(MM)
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">Phone
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">Address</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">Created Date</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">Status</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">Company Group</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="3" colspan="3"
                                    aria-label="CSS grade: activate to sort column ascending">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($restaurants as $restaurant)
                            <tr class="odd">
                                <td class="dtr-control sorting_1" tabindex="0">{{$restaurant->id}}</td>
                                <td>{{$restaurant->english_name}}</td>
                                <td>{{$restaurant->myanmar_name}}</td>
                                <td>{{$restaurant->phone}}</td>
                                <td>{{$restaurant->address}}</td>
                                <td>{{$restaurant->created_at}}</td>
                                <td>
                                    @if ($restaurant->status == '1')
                                    Active
                                    @elseif ($restaurant->status == '0')
                                    Inactive
                                    @endif
                                </td>
                                <td>
                                    @if ($restaurant->restaurant_group_id == 0)
                                    No Company Group
                                    @else
                                    {{$restaurant->restaurant_group->english_name}}
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <a href="{{url("restaurant/details/$restaurant->id")}}"
                                            class="btn btn-secondary" >
                                            <i class="fas fa-eye text-white"></i>
                                        </a>
                                        <a href="{{url("restaurant/edit/$restaurant->id")}}" class="btn btn-primary">
                                            <i class="fas fa-pen text-white"></i>
                                        </a>
                                        <a href="{{url("restaurant/delete/$restaurant->id")}}" class="btn btn-danger">
                                            <i class="fas fa-trash-alt text-white"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Restaurant ID</th>
                                <th rowspan="1" colspan="1">Restaurant Name(EN)</th>
                                <th rowspan="1" colspan="1">Restaurant Nmae(MM)</th>
                                <th rowspan="1" colspan="1">Phone</th>
                                <th rowspan="1" colspan="1">Address</th>
                                <th rowspan="1" colspan="1">Created Date</th>
                                <th rowspan="1" colspan="1">Status</th>
                                <th rowspan="1" colspan="1">Company Group</th>
                                <th rowspan="3" colspan="3  ">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection