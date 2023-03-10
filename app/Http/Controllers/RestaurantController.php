<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\OpeningDays;
use App\Models\User;
use App\Models\RestaurantGroup;

class RestaurantController extends Controller
{
    public function index () {

         $restaurants = Restaurant::all();
         $restaurant_groups = RestaurantGroup::all();
         return view('restaurants.index', compact('restaurants', 'restaurant_groups') );

    }

    public function add() {

        $opening_days = OpeningDays::all();
        $restaurant_groups = RestaurantGroup::all();
        return view('restaurants.create_restaurant', ['opening_days' => $opening_days,'restaurant_groups' => $restaurant_groups]);
    }

    public function create(Request $request) {

        $validator = validator($request->all(), [
            "english_name" => 'required',
            "myanmar_name" => 'required',
            "username" => 'required',
            "phone" => 'required',
            "passcode" => 'required',
            "confirm_passcode" => 'required',
            "city" => 'required',
            "township" => 'required',
            "address" => 'required',
            "profile_photo" => 'required',
            "cover_photo" => 'required',
            "opening_hours" => 'required',
            "closing_hours" => 'required',
            "opening_days" => 'required',
            "reservation_cancel_minutes" => 'required',
            "cancel_refund_percentage" => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $input = $request->all();

        $profile_file = $input['profile_photo'];
        $profile_file_name = uniqid().$profile_file ->getClientOriginalName();
        $profile_file->move(public_path('/images/profile_photos'), $profile_file_name);
        $input['profile_photo'] = $profile_file_name;

        $cover_file = $input['cover_photo'];
        $cover_file_name = uniqid().$cover_file->getClientOriginalName();
        $cover_file->move(public_path('/images/cover_photos'), $cover_file_name);
        $input['cover_photo'] = $cover_file_name;

        if (isset($updateData['status'])) {
            $status = 1 ;  
        } else {
            $status = 0;
        }
        
        $input['status'] = $status;

        Restaurant::create($input);
        return redirect("restaurants")->with('success', 'Created successfully');


       
    }


    public function details($id) {
        $restaurant = Restaurant::find($id);
        $opening_days = OpeningDays::all();
        $restaurant_groups = RestaurantGroup::all();

        return view('restaurants/details_restaurant',
         ['restaurant' => $restaurant, 'opening_days' => $opening_days,'restaurant_groups' => $restaurant_groups ]);
    }

    public function edit($id) {
        $restaurant = Restaurant::find($id);
        $opening_days = OpeningDays::all();
        $restaurant_groups = RestaurantGroup::all();

        return view('restaurants/edit_restaurant', 
        ['restaurant' => $restaurant, 'opening_days' => $opening_days,'restaurant_groups' => $restaurant_groups]);
    }

    public function update(Request $request, $id) {

        $updateData = $request->all();
        
        
        if (isset($updateData['status'])) {
            $status = 1 ;  
        } else {
            $status = 0;
        }

        $updateData['status'] = $status;

        Restaurant::find($id)->update($updateData);
        return redirect("restaurants")->with('success', 'Updated successfully');
    }

    public function delete($id) {

        $restaurant = Restaurant::find($id);
        $restaurant->delete();
        return redirect("restaurants")->with('info', 'Deleted successfully');
    }
 }
