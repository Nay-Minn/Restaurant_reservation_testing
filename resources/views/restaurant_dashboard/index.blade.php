@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>20</h3>
                    <p>Orders</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{url("/restaurants")}}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>12</sup></h3>
                    <p>Reservation</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{route('restaurant_groups')}}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>50</h3>
                    <p>Menu</p>
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
                    <p>Table</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div>
        <div class=" p-3">
            <h3 class="d-inline">Orders</h3>
            <a class="float-right " href="#">Order History</a>
        </div>
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="card">
                    <div class="card-header">
                        <h5 style="float:left;">Table 4</h5>
                        <div class="badge badge-warning float-right">Pending</div>
                    </div>
                    <a href="{{route('order_detail')}}">
                        <div class="card-body flex-column">
                            <p class="text-dark">Chicken Salad x 1</p>
                            <p class="text-dark">Rice x 2</p>
                            <p class="text-dark">Noodle fried x 1</p>
                            <p class="text-dark">Chicken Rice fried x 1</p>
                            <p class="text-dark">Coca Cola x 1</p>
                            <div class="row">
                                <button class="btn btn-primary mx-auto" style="width:200px;">32000 MMK</button>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="card">
                    <div class="card-header">
                        <h5 style="float:left;">Table 9</h5>
                        <div class="badge badge-warning float-right">Pending</div>
                    </div>
                    <a href="{{route('order_detail')}}">
                        <div class="card-body flex-column">
                            <p class="text-dark">Chicken Salad x 1</p>
                            <p class="text-dark">Rice x 2</p>
                            <p class="text-dark">Noodle fried x 1</p>
                            <p class="text-dark">Chicken Rice fried x 1</p>
                            <p class="text-dark">Coca Cola x 1</p>
                            <div class="row">
                                <button class="btn btn-primary mx-auto" style="width:200px;">32000 MMK</button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="card">
                    <div class="card-header">
                        <h5 style="float:left;">Table 2</h5>
                        <div class="badge badge-warning float-right">Pending</div>
                    </div>
                    <a href="{{route('order_detail')}}">
                        <div class="card-body flex-column">
                            <p class="text-dark">Chicken Salad x 1</p>
                            <p class="text-dark">Rice x 2</p>
                            <p class="text-dark">Noodle fried x 1</p>
                            <p class="text-dark">Chicken Rice fried x 1</p>
                            <p class="text-dark">Coca Cola x 1</p>
                            <div class="row">
                                <button class="btn btn-primary mx-auto" style="width:200px;">32000 MMK</button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="card">
                    <div class="card-header">
                        <h5 style="float:left;">Table 3</h5>
                        <div class="badge badge-warning float-right">Pending</div>
                    </div>
                    <a href="{{route('order_detail')}}">
                        <div class="card-body flex-column">
                            <p class="text-dark">Chicken Salad x 1</p>
                            <p class="text-dark">Rice x 2</p>
                            <p class="text-dark">Noodle fried x 1</p>
                            <p class="text-dark">Chicken Rice fried x 1</p>
                            <p class="text-dark">Coca Cola x 1</p>
                            <div class="row">
                                <button class="btn btn-primary mx-auto" style="width:200px;">32000 MMK</button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection