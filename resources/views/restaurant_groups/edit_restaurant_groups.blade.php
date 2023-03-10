@extends('layouts.app');

@section('content')

<div class="container">

    @if ($errors->any())
    <div class="alert alert-warning">
        <ol>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ol>

    </div>

    @endif

    <form method="POST">
        @csrf
        <div class="card">
            <div class="row">
                <div class=" col-md-6 p-3">
                    <input type="text" name="english_name" placeholder="Group Name EN"
                        value="{{$restaurant_group->english_name}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <input type="text" name="phone" placeholder="Phone" value="{{$restaurant_group->phone}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-3">
                </div>
                <div class=" col-md-6 p-3">
                    <input type="text" name="myanmar_name" value="{{$restaurant_group->myanmar_name}}"
                        placeholder="Group Name MM"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="col-md-6 mx-auto mb-3">
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input cursor-pointer" name="status"
                                id="customSwitches" {{$restaurant_group->status === 1 ? "checked" : ""}}>
                            <label class="custom-control-label" for="customSwitches">Active</label>
                        </div>
                    </div>

                    <button type="submit" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-600
                    dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800 w-100">Update</button>
                </div>
            </div>
        </div>
    </form>

</div>


@endsection