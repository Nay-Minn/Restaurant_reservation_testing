@extends('layouts.app');

@section('content')
<div class="container">
    <div class="card">
        <div class="row">
            <div class=" col-md-6 p-3">
                <div>
                    <label for="">Restaurant Group English Name</label>
                    <input type="text" name="english_name" value="{{$restaurant_groups->english_name}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        disabled>
                </div>
                <div class="mt-3">
                    <label for="">Phone</label>
                    <input type="text" name="phone" disabled value="{{$restaurant_groups->phone}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

            </div>
            <div class=" col-md-6 p-3">
                <label for="">Restaurant Group Myanmar Name</label>
                <input type="text" name="myanmar_name" value="{{$restaurant_groups->myanmar_name}}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    disabled>
            </div>
            <div class="col-md-6 mx-auto mb-3">

                <button class="btn btn-secondary w-100"><a href="{{url("restaurant_groups")}}"
                        class="text-white">Back</a></button>
            </div>
        </div>
    </div>
</div>


@endsection