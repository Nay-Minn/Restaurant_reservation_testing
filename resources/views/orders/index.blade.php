@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3>Order History</h3>
    <div class="row mb-3">
        <div class="col-md-3">
            <form class="form-inline my-2 my-lg-0 d-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            </form>
        </div>
        <div class="col-md-3">

        </div>
        <div class="col-md-3">

        </div>
    </div>
    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
        <thead>
            <tr>
                <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                    aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Order ID
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                    aria-label="Browser: activate to sort column ascending">Customer Name</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                    aria-label="Platform(s): activate to sort column ascending">Phone
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                    aria-label="Engine version: activate to sort column ascending">Order Status
                </th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                    aria-label="CSS grade: activate to sort column ascending">Total Amount</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                    aria-label="CSS grade: activate to sort column ascending">Payment Method</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                    aria-label="CSS grade: activate to sort column ascending">Payment Status</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                    aria-label="CSS grade: activate to sort column ascending">Ordered Date</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="3" colspan="3"
                    aria-label="CSS grade: activate to sort column ascending">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr class="odd">
                <td class="dtr-control sorting_1" tabindex="0">684E9QT</td>
                <td>Bob</td>
                <td>09123456789</td>
                </td>
                <td>Pending</td>
                <td>32000</td>
                <td>uabpay</td>
                <td>
                    <div class="badge badge-warning">
                        Pending
                    </div>
                </td>
                <td>
                    18 Apr 2024 12:30PM
                </td>
                <td>
                    <div>
                        <a href="" class="btn btn-secondary">
                            <i class="fas fa-eye text-white"></i>
                        </a>
                    </div>
                </td>
            </tr>
            <tr class="odd">
                <td class="dtr-control sorting_1" tabindex="0">684E9QT</td>
                <td>Bob</td>
                <td>09123456789</td>
                </td>
                <td>Pending</td>
                <td>32000</td>
                <td>uabpay</td>
                <td>
                    <div class="badge badge-warning">
                        Pending
                    </div>
                </td>
                <td>
                    18 Apr 2024 12:30PM
                </td>
                <td>
                    <div>
                        <a href="" class="btn btn-secondary">
                            <i class="fas fa-eye text-white"></i>
                        </a>
                    </div>
                </td>
            </tr>
            <tr class="odd">
                <td class="dtr-control sorting_1" tabindex="0">684E9QT</td>
                <td>Bob</td>
                <td>09123456789</td>
                </td>
                <td>Pending</td>
                <td>32000</td>
                <td>uabpay</td>
                <td>
                    <div class="badge badge-warning">
                        Pending
                    </div>
                </td>
                <td>
                    18 Apr 2024 12:30PM
                </td>
                <td>
                    <div>
                        <a href="" class="btn btn-secondary">
                            <i class="fas fa-eye text-white"></i>
                        </a>
                    </div>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th rowspan="1" colspan="1">Order ID</th>
                <th rowspan="1" colspan="1">Customer Name</th>
                <th rowspan="1" colspan="1">Phone</th>
                <th rowspan="1" colspan="1">Ordered Status</th>
                <th rowspan="1" colspan="1">Total Amount</th>
                <th rowspan="1" colspan="1">Payment Method</th>
                <th rowspan="1" colspan="1">Payment Status</th>
                <th rowspan="1" colspan="1">Ordered Date</th>
                <th rowspan="3" colspan="3  ">Action</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection