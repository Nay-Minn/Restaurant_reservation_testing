@push('styles')
<style>
    *,
    *:before,
    *:after {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
    }

    :focus {
        outline: 0px;
    }

    .card-area {
        position: relative;
        margin-bottom: 30px;
    }

    .single-card {
        border: 1px solid #efefef;
        border-radius: 5px;
        -webkit-transition: all 0.3s linear;
        -moz-transition: all 0.3s linear;
        -o-transition: all 0.3s linear;
        -ms-transition: all 0.3s linear;
        -khtml-transition: all 0.3s linear;
        transition: all 0.3s linear;
    }

    .table-name {
        padding: 10px;
        text-align: center;
        background-color: #d6d6d6;
    }

    .table-name h3 {
        font-size: 16px;
        font-weight: 400;
        color: #292d3f;
        margin-bottom: 0;
        -webkit-transition: all 0.3s linear;
        -moz-transition: all 0.3s linear;
        -o-transition: all 0.3s linear;
        -ms-transition: all 0.3s linear;
        -khtml-transition: all 0.3s linear;
        transition: all 0.3s linear;
    }

    .table-place {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        width: 100%;
        height: 100%;
        z-index: 999;
        cursor: pointer;
    }

    .table-place:checked~.single-card {
        border: 1px solid #2575fc;
    }

    .table-place:checked:hover~.single-card {
        border: 1px solid #2575fc;
    }

    .table-place:checked~.single-card .table-card .table-name {
        background-color: #2575fc;
        color: #ffffff;
    }

    .table-place:checked~.single-card .table-card .table-name h3 {
        color: #ffffff;
    }

    .table-place:checked:hover~.table-name {
        border: 1px solid #2575fc;
    }

    .button {
        text-align: center;
        margin-top: 50px;
    }
</style>
@endpush

<div>
    <div class="container-fluid">
        <div>
            <h4 class="d-inline">Reservation</h4>
            <a href="#" class="float-right">Reservation History</a>
        </div>
        <div class="responsive p-2 my-3" style="max-width:95%; margin:10px auto;">
            <a href="#">
                <div class="card mx-2">
                    <div class="card bg-primary mx-auto mt-2 d-flex" style="width:80%;align-items:center ">
                        <h3>5</h3>
                    </div>
                    <div class="card-body d-flex" style="align-items:center">
                        <h5 class="card-title mx-auto">Today</h5>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="card mx-2">
                    <div class="card bg-primary mx-auto mt-2 d-flex" style="width:80%;align-items:center ">
                        <h3>5</h3>
                    </div>
                    <div class="card-body d-flex" style="align-items:center">
                        <h5 class="card-title mx-auto">Today</h5>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="card mx-2">
                    <div class="card bg-primary mx-auto mt-2 d-flex" style="width:80%;align-items:center ">
                        <h3>5</h3>
                    </div>
                    <div class="card-body d-flex" style="align-items:center">
                        <h5 class="card-title mx-auto">Today</h5>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="card mx-2">
                    <div class="card bg-primary mx-auto mt-2 d-flex" style="width:80%;align-items:center ">
                        <h3>5</h3>
                    </div>
                    <div class="card-body d-flex" style="align-items:center">
                        <h5 class="card-title mx-auto">Today</h5>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="card mx-2">
                    <div class="card bg-primary mx-auto mt-2 d-flex" style="width:80%;align-items:center ">
                        <h3>5</h3>
                    </div>
                    <div class="card-body d-flex" style="align-items:center">
                        <h5 class="card-title mx-auto">Today</h5>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="card mx-2">
                    <div class="card bg-primary mx-auto mt-2 d-flex" style="width:80%;align-items:center ">
                        <h3>5</h3>
                    </div>
                    <div class="card-body d-flex" style="align-items:center">
                        <h5 class="card-title mx-auto">Today</h5>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="card mx-2">
                    <div class="card bg-primary mx-auto mt-2 d-flex" style="width:80%;align-items:center ">
                        <h3>5</h3>
                    </div>
                    <div class="card-body d-flex" style="align-items:center">
                        <h5 class="card-title mx-auto">Today</h5>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="card mx-2">
                    <div class="card bg-primary mx-auto mt-2 d-flex" style="width:80%;align-items:center ">
                        <h3>5</h3>
                    </div>
                    <div class="card-body d-flex" style="align-items:center">
                        <h5 class="card-title mx-auto">Today</h5>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="card mx-2">
                    <div class="card bg-primary mx-auto mt-2 d-flex" style="width:80%;align-items:center ">
                        <h3>5</h3>
                    </div>
                    <div class="card-body d-flex" style="align-items:center">
                        <h5 class="card-title mx-auto">Today</h5>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="card mx-2">
                    <div class="card bg-primary mx-auto mt-2 d-flex" style="width:80%;align-items:center ">
                        <h3>5</h3>
                    </div>
                    <div class="card-body d-flex" style="align-items:center">
                        <h5 class="card-title mx-auto">Today</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="row mt-2">
            <div class="col-lg-3 col-6">
                <div class="card shadow">
                    <div class="container-fluid">
                        <div style="align-items: center" class="d-flex justify-content-between">
                            <div class="d-inline">
                                <span class=" text-muted d-block">Order ID</span>
                                <span>684E9QT</span>
                            </div>
                            <div class="badge badge-warning float-right">Pending</div>
                        </div>
                        <div style="border: 1.5px solid lightgray; padding:10px; border-radius:5px;margin:2px 5px">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline">
                                    <span class=" text-muted d-block">Excepted Arrival Time</span>
                                    <span>12:30 PM</span>
                                </div>
                                <div class="d-inline">
                                    <span class=" text-muted d-block">Actual Arrival Time</span>
                                    <span>12:30 PM</span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="mt-2">
                                <span class=" text-muted d-block">Customer Info</span>
                                <span>Mg Mg - 09940235091</span>
                            </div>
                            <div style="align-items: center" class="d-flex justify-content-between mt-2">
                                <div class="d-inline">
                                    <span class=" text-muted d-block">Reservation Type</span>
                                    <span>Birthday</span>
                                </div>
                                <div class="d-inline">
                                    <span class=" text-muted d-block">Status</span>
                                    <span>Reserved</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-column p-3">
                            <h5>Order Items</h5>
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
                        <div class="flex-column p-3">
                            <h5>Transaction Info</h5>
                            <div class="row justify-content-between">
                                <p style="">Charge</p>
                                <p class="">32000 MMK</p>
                            </div>
                            <div class="row justify-content-between">
                                <p style="">Discount</p>
                                <p class="">0 MMK</p>
                            </div>
                            <div class="row justify-content-between">
                                <p style="">Tax</p>
                                <p class="">0 MMK</p>
                            </div>
                            <div class="row justify-content-between">
                                <p style="">Total Charge</p>
                                <p class="">32000 MMK</p>
                            </div>
                        </div>
                        <button class="btn btn-primary d-block mx-auto" style="width:90%" data-toggle="modal"
                            data-target="#tablePlaceModal">Table Place</button>
                        <button class="btn btn-secondary d-block mx-auto my-2" style="width:90%">Cancel Order</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="card shadow">
                    <div class="container-fluid">
                        <div style="align-items: center" class="d-flex justify-content-between">
                            <div class="d-inline">
                                <span class=" text-muted d-block">Order ID</span>
                                <span>684E9QT</span>
                            </div>
                            <div class="badge badge-warning float-right">Pending</div>
                        </div>
                        <div style="border: 1.5px solid lightgray; padding:10px; border-radius:5px;margin:2px 5px">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline">
                                    <span class=" text-muted d-block">Excepted Arrival Time</span>
                                    <span>12:30 PM</span>
                                </div>
                                <div class="d-inline">
                                    <span class=" text-muted d-block">Actual Arrival Time</span>
                                    <span>12:30 PM</span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="mt-2">
                                <span class=" text-muted d-block">Customer Info</span>
                                <span>Mg Mg - 09940235091</span>
                            </div>
                            <div style="align-items: center" class="d-flex justify-content-between mt-2">
                                <div class="d-inline">
                                    <span class=" text-muted d-block">Reservation Type</span>
                                    <span>Birthday</span>
                                </div>
                                <div class="d-inline">
                                    <span class=" text-muted d-block">Status</span>
                                    <span>Reserved</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-column p-3">
                            <h5>Order Items</h5>
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
                        <div class="flex-column p-3">
                            <h5>Transaction Info</h5>
                            <div class="row justify-content-between">
                                <p style="">Charge</p>
                                <p class="">32000 MMK</p>
                            </div>
                            <div class="row justify-content-between">
                                <p style="">Discount</p>
                                <p class="">0 MMK</p>
                            </div>
                            <div class="row justify-content-between">
                                <p style="">Tax</p>
                                <p class="">0 MMK</p>
                            </div>
                            <div class="row justify-content-between">
                                <p style="">Total Charge</p>
                                <p class="">32000 MMK</p>
                            </div>
                        </div>
                        <button class="btn btn-primary d-block mx-auto" style="width:90%">Table Place</button>
                        <button class="btn btn-secondary d-block mx-auto my-2" style="width:90%">Cancel Order</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="card shadow">
                    <div class="container-fluid">
                        <div style="align-items: center" class="d-flex justify-content-between">
                            <div class="d-inline">
                                <span class=" text-muted d-block">Order ID</span>
                                <span>684E9QT</span>
                            </div>
                            <div class="badge badge-warning float-right">Pending</div>
                        </div>
                        <div style="border: 1.5px solid lightgray; padding:10px; border-radius:5px;margin:2px 5px">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline">
                                    <span class=" text-muted d-block">Excepted Arrival Time</span>
                                    <span>12:30 PM</span>
                                </div>
                                <div class="d-inline">
                                    <span class=" text-muted d-block">Actual Arrival Time</span>
                                    <span>12:30 PM</span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="mt-2">
                                <span class=" text-muted d-block">Customer Info</span>
                                <span>Mg Mg - 09940235091</span>
                            </div>
                            <div style="align-items: center" class="d-flex justify-content-between mt-2">
                                <div class="d-inline">
                                    <span class=" text-muted d-block">Reservation Type</span>
                                    <span>Birthday</span>
                                </div>
                                <div class="d-inline">
                                    <span class=" text-muted d-block">Status</span>
                                    <span>Reserved</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-column p-3">
                            <h5>Order Items</h5>
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
                        <div class="flex-column p-3">
                            <h5>Transaction Info</h5>
                            <div class="row justify-content-between">
                                <p style="">Charge</p>
                                <p class="">32000 MMK</p>
                            </div>
                            <div class="row justify-content-between">
                                <p style="">Discount</p>
                                <p class="">0 MMK</p>
                            </div>
                            <div class="row justify-content-between">
                                <p style="">Tax</p>
                                <p class="">0 MMK</p>
                            </div>
                            <div class="row justify-content-between">
                                <p style="">Total Charge</p>
                                <p class="">32000 MMK</p>
                            </div>
                        </div>
                        <button class="btn btn-primary d-block mx-auto" style="width:90%">Table Place</button>
                        <button class="btn btn-secondary d-block mx-auto my-2" style="width:90%">Cancel Order</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="card shadow">
                    <div class="container-fluid">
                        <div style="align-items: center" class="d-flex justify-content-between">
                            <div class="d-inline">
                                <span class=" text-muted d-block">Order ID</span>
                                <span>684E9QT</span>
                            </div>
                            <div class="badge badge-success float-right">Paid</div>
                        </div>
                        <div style="border: 1.5px solid lightgray; padding:10px; border-radius:5px;margin:2px 5px">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline">
                                    <span class=" text-muted d-block">Excepted Arrival Time</span>
                                    <span>12:30 PM</span>
                                </div>
                                <div class="d-inline">
                                    <span class=" text-muted d-block">Actual Arrival Time</span>
                                    <span>12:30 PM</span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="mt-2">
                                <span class=" text-muted d-block">Customer Info</span>
                                <span>Mg Mg - 09940235091</span>
                            </div>
                            <div style="align-items: center" class="d-flex justify-content-between mt-2">
                                <div class="d-inline">
                                    <span class=" text-muted d-block">Reservation Type</span>
                                    <span>Birthday</span>
                                </div>
                                <div class="d-inline">
                                    <span class=" text-muted d-block">Status</span>
                                    <span>Reserved</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-column p-3">
                            <h5>Order Items</h5>
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
                        <div class="flex-column p-3">
                            <h5>Transaction Info</h5>
                            <div class="row justify-content-between">
                                <p style="">Charge</p>
                                <p class="">32000 MMK</p>
                            </div>
                            <div class="row justify-content-between">
                                <p style="">Discount</p>
                                <p class="">0 MMK</p>
                            </div>
                            <div class="row justify-content-between">
                                <p style="">Tax</p>
                                <p class="">0 MMK</p>
                            </div>
                            <div class="row justify-content-between">
                                <p style="">Total Charge</p>
                                <p class="">32000 MMK</p>
                            </div>
                        </div>
                        <button class="btn btn-primary d-block mx-auto" style="width:90%">Table Place</button>
                        <button class="btn btn-secondary d-block mx-auto my-2" style="width:90%">Cancel Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}

    <div wire:ignore.self class="modal fade" id="tablePlaceModal" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form wire:submit.prevent="store">
                        <div class="row">
                            <div class="col-3 ">
                                <div class="card-area" style="width: 100px;
                                height: 100px;">
                                    <input class="table-place" type="checkbox" id="1" wire:model.lazy='setTable'
                                        value="1" />
                                    <div class="single-card">
                                        <div class="table-card">
                                            <div class="card bg-primary mx-auto mt-2 d-flex"
                                                style="width:80%;align-items:center ">
                                                <h3>5</h3>
                                            </div>
                                            <div class="table-name">
                                                <h3>Table 1</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 ">
                                <div class="card-area" style="width: 100px;
                                height: 100px;">
                                    <input class="table-place" type="checkbox" id="2" wire:model.lazy='setTable'
                                        value="2" />
                                    <div class="single-card">
                                        <div class="table-card">
                                            <div class="card bg-primary mx-auto mt-2 d-flex"
                                                style="width:80%;align-items:center ">
                                                <h3>5</h3>
                                            </div>
                                            <div class="table-name">
                                                <h3>Table 1</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 ">
                                <div class="card-area" style="width: 100px;
                                height: 100px;">
                                    <input class="table-place" type="checkbox" id="3" wire:model.lazy='setTable'
                                        value="3" />
                                    <div class="single-card">
                                        <div class="table-card">
                                            <div class="card bg-primary mx-auto mt-2 d-flex"
                                                style="width:80%;align-items:center ">
                                                <h3>5</h3>
                                            </div>
                                            <div class="table-name">
                                                <h3>Table 1</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 ">
                                <div class="card-area" style="width: 100px;
                                height: 100px;">
                                    <input class="table-place" type="checkbox" id="4" wire:model.lazy='setTable'
                                        value="4" />
                                    <div class="single-card">
                                        <div class="table-card">
                                            <div class="card bg-primary mx-auto mt-2 d-flex"
                                                style="width:80%;align-items:center ">
                                                <h3>5</h3>
                                            </div>
                                            <div class="table-name">
                                                <h3>Table 1</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 ">
                                <div class="card-area" style="width: 100px;
                                height: 100px;">
                                    <input class="table-place" type="checkbox" id="5" wire:model.lazy='setTable'
                                        value="5" />
                                    <div class="single-card">
                                        <div class="table-card">
                                            <div class="card bg-primary mx-auto mt-2 d-flex"
                                                style="width:80%;align-items:center ">
                                                <h3>5</h3>
                                            </div>
                                            <div class="table-name">
                                                <h3>Table 1</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 ">
                                <div class="card-area" style="width: 100px;
                                height: 100px;">
                                    <input class="table-place" type="checkbox" id="6" wire:model.lazy='setTable'
                                        value="6" />
                                    <div class="single-card">
                                        <div class="table-card">
                                            <div class="card bg-primary mx-auto mt-2 d-flex"
                                                style="width:80%;align-items:center ">
                                                <h3>5</h3>
                                            </div>
                                            <div class="table-name">
                                                <h3>Table 1</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 ">
                                <div class="card-area" style="width: 100px;
                                height: 100px;">
                                    <input class="table-place" type="checkbox" id="7" wire:model.lazy='setTable'
                                        value="7" />
                                    <div class="single-card">
                                        <div class="table-card">
                                            <div class="card bg-primary mx-auto mt-2 d-flex"
                                                style="width:80%;align-items:center ">
                                                <h3>5</h3>
                                            </div>
                                            <div class="table-name">
                                                <h3>Table 1</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 ">
                                <div class="card-area" style="width: 100px;
                                height: 100px;">
                                    <input class="table-place" type="checkbox" id="8" wire:model.lazy='setTable'
                                        value="8" />
                                    <div class="single-card">
                                        <div class="table-card">
                                            <div class="card bg-primary mx-auto mt-2 d-flex"
                                                style="width:80%;align-items:center ">
                                                <h3>5</h3>
                                            </div>
                                            <div class="table-name">
                                                <h3>Table 1</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 ">
                                <div class="card-area" style="width: 100px;
                                height: 100px;">
                                    <input class="table-place" type="checkbox" id="9" wire:model.lazy='setTable'
                                        value="9" />
                                    <div class="single-card">
                                        <div class="table-card">
                                            <div class="card bg-primary mx-auto mt-2 d-flex"
                                                style="width:80%;align-items:center ">
                                                <h3>5</h3>
                                            </div>
                                            <div class="table-name">
                                                <h3>Table 1</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 ">
                                <div class="card-area" style="width: 100px;
                                height: 100px;">
                                    <input class="table-place" type="checkbox" id="10" wire:model.lazy='setTable'
                                        value="10" />
                                    <div class="single-card">
                                        <div class="table-card">
                                            <div class="card bg-primary mx-auto mt-2 d-flex"
                                                style="width:80%;align-items:center ">
                                                <h3>5</h3>
                                            </div>
                                            <div class="table-name">
                                                <h3>Table 1</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="button">
                                    <button class="btn btn-outline-secondary" wire:click='cancel'>Cancel</button>
                                    <button class="btn btn-outline-primary" wire:click='store'>Confirm</button>
                                </div>
                            </div>
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
    window.addEventListener('close-modal', event =>{
            $('#tablePlaceModal').modal('hide');
            $('#editDiscountModal').modal('hide');
            $('#deleteDiscountModal').modal('hide');
            $('#viewDiscountModal').modal('hide')
        });

        window.addEventListener('show-edit-discount-modal', event =>{
            $('#editDiscountModal').modal('show');
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteDiscountModal').modal('show');
        });

        window.addEventListener('show-view-discount-modal', event =>{
            $('#viewDiscountModal').modal('show');
        });
</script>
@endpush