@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-center flex-column">
        <div class="mx-auto">
            <div class=" p-3" style="width:700px">
                <h3 class="d-inline">Table 5 Order</h3>
                <button class="btn btn-danger float-right ">Cancel Order</button>
            </div>
            <div class="card p-1" style="width:700px">
                <div class="card-header">
                    <h5 style="float:left;">Order Menu Item</h5>
                    <div class="badge badge-warning float-right">Pending</div>
                </div>
                <div class="card-body flex-column">
                    <div class="row justify-content-between">
                        <p style="">Chicken Salad x 1</p>
                        <p class="">7500 MMK</p>
                    </div>
                    <div class="row justify-content-between">
                        <p style="">Rice x 2</p>
                        <p class="">3000 MMK</p>
                    </div>
                    <div class="row justify-content-between">
                        <p style="">Noodle fried x 1</p>
                        <p class="">6000 MMK</p>
                    </div>
                    <div class="row justify-content-between">
                        <p style="">Chicken Rice fried x 1</p>
                        <p class="">6000 MMK</p>
                    </div>
                    <div class="row justify-content-between">
                        <p style="">Coca Cola x 1</p>
                        <p class="">1200 MMK</p>
                    </div>
                </div>
            </div>
            <div class="card p-1" style="width:700px">
                <div class="card-header">
                    <h5 style="float:left;">Order Menu Item</h5>
                    <div class="badge badge-warning float-right">Pending</div>
                </div>
                <div class="card-body flex-column">
                    <div class="row justify-content-between">
                        <p style="">Chicken Salad x 1</p>
                        <p class="">7500 MMK</p>
                    </div>
                    <div class="row justify-content-between">
                        <p style="">Rice x 2</p>
                        <p class="">3000 MMK</p>
                    </div>
                    <div class="row justify-content-between">
                        <p style="">Noodle fried x 1</p>
                        <p class="">6000 MMK</p>
                    </div>
                    <div class="row justify-content-between">
                        <p style="">Chicken Rice fried x 1</p>
                        <p class="">6000 MMK</p>
                    </div>
                    <div class="row justify-content-between">
                        <p style="">Coca Cola x 1</p>
                        <p class="">1200 MMK</p>
                    </div>
                </div>
            </div>
            <div style="width:700px " class="row">
                <button class="btn btn-primary mx-auto mb-3 " style="width:500px;">Receive Payment</button>
            </div>

        </div>
    </div>
</div>
@endsection