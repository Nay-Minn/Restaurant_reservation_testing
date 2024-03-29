@extends('layouts.app');


@section('content')
<style>
    .photo {
        height: 167px;
        width: 517px;
        object-fit: cover
    }
</style>

<div class="container-fluid">

    @if ($errors->any())
    <div class="alert alert-warning">
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
                    <img src="{{asset('/images/profile_photos/'. $restaurant->profile_photo)}}" alt="profile photo"
                        class=" img-thumbnail d-block photo">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2"
                        for="file_input">Upload
                        Profile Photo</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="file_input" type="file" name="cover_photo">
                </div>
                <div class="mb-3 col-md-8 p-3">
                    <img src="{{asset('/images/cover_photos/'. $restaurant->cover_photo)}}" alt="cover photo"
                        class=" img-thumbnail d-block photo">
                    <label for="formFile"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2">Cover Photo</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        type="file" name="cover_photo">
                </div>

                <div class="col-md-6 p-3">
                    <input type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        name="english_name" value="{{$restaurant->english_name}}" placeholder="Restaurant Name EN">
                    <input type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-3"
                        name="username" value="{{$restaurant->username}}" placeholder="Username">
                    <input type="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-3"
                        name="passcode" value="{{$restaurant->passcode}}" placeholder="Passcode">

                    <select name="restaurant_group_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-2"
                        required>
                        <option value="0" selected>Company Group</option>
                        @foreach ($restaurant_groups as $group)
                        <option value="{{$group->id}}" @if ($group->id == $restaurant->restaurant_group_id)
                            selected
                            @endif>{{$group->english_name}}</option>
                        @endforeach
                    </select>


                </div>
                <div class="col-md-6 p-3">
                    <input type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                        name="myanmar_name" value="{{$restaurant->myanmar_name}}" placeholder="Restaurant Name MM">
                    <input type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-3"
                        name="phone" value="{{$restaurant->phone}}" placeholder="Phone">
                    <input type="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-3"
                        value="{{$restaurant->confirm_passcode}}" name="confirm_passcode"
                        placeholder="Confirm Passcode">

                    <div class=" d-flex">
                        <input type="time"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-3"
                            name="opening_hours" value="{{$restaurant->opening_hours}}" placeholder="Opening Hour">
                        <input type="time"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-3"
                            value="{{$restaurant->closing_hours}}" name="closing_hours" placeholder="Closing Hour">
                    </div>
                </div>
                <div class="col-md-12 p-3 ">
                    <label>
                        Opening Days
                    </label>
                    <select class="form-control select2-ajax" name="opening_day_id[]" multiple="multiple">
                        @foreach ($opening_days as $opening_day)
                        <option value="{{$opening_day['id']}}" @if (in_array($opening_day['id'], $restaurant->
                            opening_day_id))
                            selected @endif>
                            {{$opening_day['opening_day']}}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 p-3">
                    <input type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{$restaurant->reservation_cancel_minutes}}" name="reservation_cancel_minutes"
                        placeholder="Reservation Cancel Minutes" />
                    <select name="city"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-3">
                        <option value="1">Yangon</option>
                        <option value="2">Mandalay </option>
                    </select>

                </div>
                <div class="col-md-6 p-3">
                    <input type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{$restaurant->cancel_refund_percentage}}" name="cancel_refund_percentage"
                        placeholder="Cancel Refund Percentage" />
                    <select name="township"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-3">
                        <option value="1">Ahlone</option>
                        <option value="2">North Dagon</option>
                    </select>
                </div>
                <div class="col-md-12 p-3">
                    <textarea name="address" placeholder="Address"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-3">{{$restaurant->address}}</textarea>
                </div>
                <div class=" col-md-6 p-3">
                    <div class="form-check">
                        <input
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 me-2"
                            type="checkbox" value="" id="flexCheckDefault" type="checkbox" value=""
                            id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Clone Menu from the same group restaurant
                        </label>
                    </div>
                </div>
                <div class="col-md-6 p-3">
                    <div class="form-group">

                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input cursor-pointer" name="status"
                                    id="customSwitches" {{$restaurant->status === 1 ? "checked" : ""}}>
                                <label class="custom-control-label" for="customSwitches">Active</label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 mx-auto">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600
                         dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 w-100">Update</button>
                </div>


        </form>


    </div>
</div>
@endsection