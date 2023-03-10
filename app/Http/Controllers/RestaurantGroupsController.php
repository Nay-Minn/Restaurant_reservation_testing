<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\RestaurantGroup;


class RestaurantGroupsController extends Controller
{
    
    public function index() {

        $restaurant_groups = RestaurantGroup::all();
        
        return view('restaurant_groups.index',['restaurantGroups'=> $restaurant_groups]);
    }

    public function add() {
        return view('restaurant_groups.create_restaurant_groups');
    }

    public function create () {


        $validator = validator(request()->all(), [
            'english_name' => 'required',
            'myanmar_name' => 'required',
            'phone' => 'required',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator)   ;
        }

        $restaurant_group = new RestaurantGroup();
        $restaurant_group->english_name = request('english_name');
        $restaurant_group->myanmar_name = request('myanmar_name');
        $restaurant_group->phone = request('phone');

        if(request('status') == 'on') {
            $restaurant_group->status = 1;
        } elseif(request('status') == null) { 
            $restaurant_group->status = 0;
        }
        $restaurant_group->save();
        return redirect('restaurant_groups')->with('status', 'created successfully');

        

    }

    public function details($id) {

        $data = RestaurantGroup::find($id);

        return view('restaurant_groups/details_restaurant_groups', ['restaurant_groups' => $data]);
    }

    public function edit($id) {
        $data = RestaurantGroup::find($id);

        return view('restaurant_groups/edit_restaurant_groups', ['restaurant_group' => $data]);
    }

    public function update($id) {
        $restaurant_group = RestaurantGroup::find($id);
        $restaurant_group->english_name = request('english_name');
        $restaurant_group->myanmar_name = request('myanmar_name');
        $restaurant_group->phone = request('phone');
        if(request('status') == 'on') {
            $restaurant_group->status = 1;
        } elseif(request('status') == null) { 
            $restaurant_group->status = 0;
        }
        $restaurant_group->save();

        return redirect('restaurant_groups')->with('status', "update successfully");
    }


    public function delete($id) {
        $restaurant_group = RestaurantGroup::find($id);
        $restaurant_group->delete();

        return redirect('restaurant_groups')->with('info', "delete successfully");
    }
}
// Request $request, RestaurantGroup $restaurant_group