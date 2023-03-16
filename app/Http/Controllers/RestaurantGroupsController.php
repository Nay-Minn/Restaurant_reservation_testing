<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\RestaurantGroup;


class RestaurantGroupsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //  dd(RestaurantGroup::find(1)->restaurants);
        // return;
        $restaurantGroups = RestaurantGroup::all();

        return view('restaurant_groups.index', ['restaurantGroups' => $restaurantGroups]);
    }

    public function add()
    {
        return view('restaurant_groups.create_restaurant_groups');
    }

    public function create()
    {

        //Validation
        $validator = validator(request()->all(), [
            'english_name' => 'required',
            'myanmar_name' => 'required',
            'phone' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        //Save to database
        $restaurantGroup = new RestaurantGroup();
        $restaurantGroup->english_name = request('english_name');
        $restaurantGroup->myanmar_name = request('myanmar_name');
        $restaurantGroup->phone = request('phone');
        if (request('status') == 'on') {
            $restaurantGroup->status = 1;
        } elseif (request('status') == null) {
            $restaurantGroup->status = 0;
        }
        $restaurantGroup->save();

        //return
        return redirect('restaurant_groups')->with('status', 'created successfully');
    }

    public function details($id)
    {

        $data = RestaurantGroup::find($id);
        return view('restaurant_groups/details_restaurant_groups', ['restaurant_groups' => $data]);
    }

    public function edit($id)
    {
        $data = RestaurantGroup::find($id);
        return view('restaurant_groups/edit_restaurant_groups', ['restaurant_group' => $data]);
    }

    public function update($id)
    {
        $restaurantGroup = RestaurantGroup::find($id);
        $restaurantGroup->english_name = request('english_name');
        $restaurantGroup->myanmar_name = request('myanmar_name');
        $restaurantGroup->phone = request('phone');
        if (request('status') == 'on') {
            $restaurantGroup->status = 1;
        } elseif (request('status') == null) {
            $restaurantGroup->status = 0;
        }
        $restaurantGroup->save();

        return redirect('restaurant_groups')->with('status', "update successfully");
    }


    public function delete($id)
    {
        $restaurantGroup = RestaurantGroup::find($id);
        $restaurantGroup->delete();

        return redirect('restaurant_groups')->with('info', "delete successfully");
    }
}
// Request $request, RestaurantGroup $restaurant_group