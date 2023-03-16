@extends('layouts.app');
@section('content')

<div class=" container-fluid ">

    @if (session('info') )

    <div class="alert alert-danger mt-2">
        {{session('info')}}
    </div>

    @endif
    @if (session('status') )

    <div class="alert alert-success mt-2">
        {{session('status')}}
    </div>

    @endif


    <div class="card mt-3">
        <div class="card-header d-inline">
            <h2 class="card-title">Restaurant Groups</h2>

            <a href="{{route( 'create_restaurant_groups')}} " class=" card-title float-right">
                <h3 class=" card-title">Create New Restaurant Group</h3>
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
                                        aria-label="Browser: activate to sort column ascending">Group Name(EN)</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">Group Name(MM)
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending">Phone
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">Created Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">Number of Restaurants
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="2" colspan="2"
                                        aria-label="CSS grade: activate to sort column ascending">Action</th>
                                </tr>
                            </thead>
                            <tbody>
























































                                @foreach ($restaurantGroups as $restaurantGroup)

                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0">{{$restaurantGroup->id}}</td>
                                    <td>{{$restaurantGroup->english_name}}</td>
                                    <td>{{$restaurantGroup->myanmar_name}}</td>
                                    <td>{{$restaurantGroup->phone}}</td>
                                    <td>{{$restaurantGroup->created_at}}</td>
                                    <td>
                                        @if ($restaurantGroup->status == '1')
                                        Active
                                        @elseif ($restaurantGroup->status == '0')
                                        Inactive
                                        @endif
                                    </td>
                                    <td>{{count($restaurantGroup->restaurants)}}</td>
                                    <td>
                                        <div>
                                            <a href="{{url("restaurant_groups/details/$restaurantGroup->id")}}"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4
                                                focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm
                                                p-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600
                                                dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <i class="fas fa-eye text-white"></i>
                                            </a>

                                            <a href="{{url("restaurant_groups/edit/$restaurantGroup->id")}}"
                                                class="text-white
                                                bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none
                                                focus:ring-gray-300 font-medium rounded-lg text-sm p-2.5 text-center
                                                inline-flex items-center mr-2 dark:bg-gray-600 dark:hover:bg-gray-700
                                                dark:focus:ring-gray-800">
                                                <i class="fas fa-pen text-white"></i>
                                            </a>
                                            <a href="{{url("restaurant_groups/delete/$restaurantGroup->id")}}"
                                                class="text-white
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
                                    <th rowspan="1" colspan="1">Group Name(EN)</th>
                                    <th rowspan="1" colspan="1">Group Name(MM)</th>
                                    <th rowspan="1" colspan="1">Phone</th>
                                    <th rowspan="1" colspan="1">Created Date</th>
                                    <th rowspan="1" colspan="1">Status</th>
                                    <th rowspan="1" colspan="1">Number of Restaurant</th>
                                    <th rowspan="1" colspan="1">Action</th>

                                </tr>
                            </tfoot>


                        </table>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10
                            of 57 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="example2_previous"><a
                                        href="#" aria-controls="example2" data-dt-idx="0" tabindex="0"
                                        class="page-link">Previous</a></li>
                                <li class="paginate_button page-item active"><a href="#" aria-controls="example2"
                                        data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example2"
                                        data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example2"
                                        data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example2"
                                        data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example2"
                                        data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example2"
                                        data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                <li class="paginate_button page-item next" id="example2_next"><a href="#"
                                        aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>

    </div>
</div>

@endsection