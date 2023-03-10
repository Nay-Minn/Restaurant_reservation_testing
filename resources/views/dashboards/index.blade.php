@extends('layouts.app');

@section('content')


<div class=" container-fluid">
    <h1>Dashboard page</h1>
    <div class="row">
        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$restaurants_count}}</h3>
                    <p>Restaurants</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{url("/restaurants")}}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$restaurant_groups_count}}</sup></h3>
                    <p>Group</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{url('/restaurant_groups')}}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>0</h3>
                    <p>Total Menu</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>65</h3>
                    <p>Total Order</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
    <div class="card">
        <div class="card-header d-inline">
            <h3 class="card-title">Best Selling Restaurant</h3>

            <a href="{{route('restaurants')}}" class="card-title float-right">
                <h3 class="card-title">Restaurant List</h3>
            </a>
        </div>

        <div class="card-body">
            <div id="example2_wrapper" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
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
                                        aria-label="CSS grade: activate to sort column ascending">Total Order</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
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
                                    <td>{{$restaurant->status}}</td>
                                    <td></td>
                                    <td>
                                        <div>
                                            <a href="{{url("restaurant/details/$restaurant->id")}}"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4
                                                focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm
                                                p-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600
                                                dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <i class="fas fa-eye text-white"></i>
                                            </a>

                                            <a href="{{url("restaurant/edit/$restaurant->id")}}" class="text-white
                                                bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none
                                                focus:ring-gray-300 font-medium rounded-lg text-sm p-2.5 text-center
                                                inline-flex items-center mr-2 dark:bg-gray-600 dark:hover:bg-gray-700
                                                dark:focus:ring-gray-800">
                                                <i class="fas fa-pen text-white"></i>
                                            </a>
                                            <a href="{{url("restaurant/delete/$restaurant->id")}}" class="text-white
                                                bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none
                                                focus:ring-red-300 font-medium rounded-lg text-sm p-2.5 text-center
                                                inline-flex items-center mr-2 dark:bg-red-600 dark:hover:bg-red-700
                                                dark:focus:ring-red-800">
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
                                    <th rowspan="1" colspan="1">Total Order</th>
                                    <th rowspan="1" colspan="1">Action</th>
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