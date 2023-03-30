@extends('layouts.app')


@section('content')

<div class="container-fluid p-3">

    @if ($errors->any())

    <div class="alert alert-danger">
        <ol>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ol>
    </div>
    @endif
    <div class="card mt-3">
        <form method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="mb-3 col-md-4 p-3">

                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                        Profile Photo</label>
                    <input class="form-control" id="file_input" type="file" name="profile_photo">

                </div>
                <div class="mb-3 col-md-8 p-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                        Cover Photo</label>
                    <input class="form-control" id="file_input" type="file" name="cover_photo">

                </div>

                <div class="col-md-6 p-3">
                    <input type="text" class="form-control" name="english_name" placeholder="Restaurant Name EN"
                        required>
                    <input type="text" class="form-control mt-2" name="username" placeholder="Username" required>
                    <div class="mt-2 form-group">
                        <input type="password" class="form-control " name="passcode" placeholder="Passcode"
                            id="inputPassword" required>
                        <span toggle="#inputPassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>





                </div>
                <div class="col-md-6 p-3">
                    <input type="text" class="form-control" name="myanmar_name" placeholder="Restaurant Name MM"
                        required>
                    <input type="text" class="form-control mt-2" name="phone" placeholder="Phone" pattern="[0-9]*"
                        required>
                    <div class="mt-2 form-group">
                        <input type="password" class="form-control" name="confirm_passcode"
                            placeholder="Confirm Passcode" id="inputConfirmPassword" required>
                        <span toggle="#inputConfirmPassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>

                </div>
                <div class="col-md-12 p3">
                    <div id="validator-output" class="p-3"></div>
                </div>
                <div class="col-md-12">
                    <div class="d-flex">
                        <div class="col-md-6">
                            <select name="restaurant_group_id" class="form-control mt-2" required>
                                <option value="0" selected>Company Group</option>
                                @foreach ($restaurant_groups as $group)
                                <option value="{{$group->id}}">{{$group->english_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class=" d-flex col-md-6">
                            <input type="time" class="form-control mt-2" name="opening_hours" placeholder="Opening Hour"
                                required>
                            <input type="time" class="form-control mt-2" name="closing_hours" placeholder="Closing Hour"
                                required>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 p-3 ">
                    <label>
                        Opening Days
                    </label>
                    <select class=" select2-ajax form-control" name="opening_day_id[]" multiple="multiple" required>
                        @foreach ($opening_days as $opening_day)
                        <option value="{{$opening_day['id']}}">
                            {{$opening_day['opening_day']}}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 p-3">
                    <input type="number" class="form-control" name="reservation_cancel_minutes"
                        placeholder="Reservation Cancel Minutes" required />
                    <select name="city" class="form-control mt-2" required>
                        <option value="0">City</option>
                        <option value="1">Yangon</option>
                        <option value="2">Mandalay </option>
                    </select>

                </div>
                <div class="col-md-6 p-3">
                    <input type="number" class="form-control mt-2" name="cancel_refund_percentage"
                        placeholder="Cancel Refund Percentage" required />
                    <select name="township" class="form-control mt-2" required>
                        <option value="0" selected>Township</option>
                        <option value="1">Ahlone</option>
                        <option value="2">North Dagon</option>
                    </select>
                </div>
                <div class="col-md-12 p-3">
                    <textarea name="address" placeholder="Address" class="form-control mt-2" required></textarea>
                </div>
                <div class=" col-md-6 p-3">
                    <div class="form-check">
                        <input
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 me-2"
                            type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Clone Menu from the same group restaurant
                        </label>
                    </div>
                </div>
                <div class="col-md-6 p-3">
                    <div class="form-group">

                        <div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input cursor-pointer" name="status"
                                    id="customSwitches">
                                <label class="custom-control-label" for="customSwitches">Active</label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 mx-auto">
                    <button type="submit" class="btn btn-secondary w-100">Create</button>
                </div>
        </form>
    </div>
</div>
@endsection