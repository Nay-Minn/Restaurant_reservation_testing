@extends('layouts.app')

@section('content')

<div class="container-fluid">

    @if (session('success'))

    <div class="flex mt-2 p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
        role="alert">
        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">Success</span>
        </div>
    </div>
</div>

@endif

@if (session('info'))

<div class="flex mt-3 p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
    role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
            clip-rule="evenodd"></path>
    </svg>
    <span class="sr-only">Info</span>
    <div>
        <span class="font-medium">{{session("info")}}</span>
    </div>
</div>
</div>

@endif

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