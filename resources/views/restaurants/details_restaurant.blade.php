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

    <div class="card mt-3">

        <div class="row">
            <div class="mb-3 col-md-4 p-3">
                <img src="{{asset('/images/profile_photos/'. $restaurant->profile_photo)}}" alt="profile photo"
                    class=" img-thumbnail col-md-8 photo d-block">
            </div>
            <div class="mb-3 col-md-8 p-3">
                <img src="{{asset('/images/cover_photos/'. $restaurant->cover_photo)}}" alt="cover photo"
                    class=" img-thumbnail col-md-8 photo d-block">
            </div>

            <div class="col-md-6 p-3">
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="english_name" value="{{$restaurant->english_name}}" placeholder="Restaurant Name EN" disabled>
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-3"
                    name="username" value="{{$restaurant->username}}" placeholder="Username" disabled>

                <select name="restaurant_group_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-3"
                    disabled>
                    <option value="0">Company Group</option>
                    @foreach ($restaurant_groups as $group)
                    <option value="{{$group->id}}" @if ($group->id ==
                        $restaurant->restaurant_groups_id)
                        selected
                        @endif
                        >{{$group->english_name}}</option>
                    @endforeach
                </select>


            </div>
            <div class="col-md-6 p-3">
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="myanmar_name" value="{{$restaurant->myanmar_name}}" placeholder="Restaurant Name MM" disabled>
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-3"
                    name="phone" value="{{$restaurant->phone}}" placeholder="Phone" disabled>

                <div class=" d-flex">
                    <input type="time"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-3"
                        value="{{$restaurant->opening_hours}}" name="opening_hours" placeholder="Opening Hour" disabled>
                    <input type="time"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-3"
                        value="{{$restaurant->closing_hours}}" name="closing_hours" placeholder="Closing Hour" disabled>
                </div>
            </div>
            <div class="col-md-12 p-3 ">
                <label>
                    Opening Days
                </label>
                <select class="form-control select2-ajax" name="opening_day_id[]" multiple="multiple" disabled>
                    @foreach ($opening_days as $opening_day)
                    <option value="{{$opening_day['id']}}" @if (in_array($opening_day['id'], $restaurant->
                        opening_day_id))
                        selected @endif >
                        {{$opening_day['opening_day']}}
                    </option>
                    @endforeach
                </select>

            </div>

            <div class="col-md-6 p-3">
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{$restaurant->reservation_cancel_minutes}} " disabled name="reservation_cancel_minutes"
                    placeholder="Reservation Cancel Minutes" />
                <select name="city"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-3"
                    disabled>
                    <option value="1">Yangon</option>
                    <option value="2">Mandalay </option>
                </select>

            </div>
            <div class="col-md-6 p-3">
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{$restaurant->cancel_refund_percentage}}" name="cancel_refund_percentage"
                    placeholder="Cancel Refund Percentage" disabled />
                <select name="township"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-3"
                    disabled>
                    <option value="1">Ahlone</option>
                    <option value="2">North Dagon</option>
                </select>
            </div>
            <div class="col-md-12 p-3">
                <textarea name="address" placeholder="Address"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-3"
                    disabled>{{$restaurant->address}}</textarea>
            </div>
            <div class=" col-md-6 p-3">

            </div>
            <div class="col-md-6 p-3">

            </div>
            <div class="col-md-6 mx-auto mb-3">

                <a href="{{url("/restaurants")}}"class="btn btn-primary w-100">Back</a>
            </div>


        </div>
    </div>
    @endsection