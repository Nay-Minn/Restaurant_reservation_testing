<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\OpeningDays;
use App\Models\User;
use App\Models\RestaurantGroup;

class RestaurantController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $restaurants = Restaurant::all();
        $restaurantGroups = RestaurantGroup::all();
        return view('restaurants.index', compact('restaurants', 'restaurantGroups'));
    }

    public function add()
    {
        $openingDays = OpeningDays::all();
        $restaurantGroups = RestaurantGroup::all();
        return view('restaurants.create_restaurant', ['opening_days' => $openingDays, 'restaurant_groups' => $restaurantGroups]);
    }

    public function create(Request $request)
    {

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
            "opening_day_id" => 'required',
            "reservation_cancel_minutes" => 'required',
            "cancel_refund_percentage" => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $input = $request->all();

        $profileFile = $input['profile_photo'];
        $profileFileName = uniqid() . $profileFile->getClientOriginalName();
        $profileFile->move(public_path('/images/profile_photos'), $profileFileName);
        $input['profile_photo'] = $profileFileName;

        $coverFile = $input['cover_photo'];
        $coverFileName = uniqid() . $coverFile->getClientOriginalName();
        $coverFile->move(public_path('/images/cover_photos'), $coverFileName);
        $input['cover_photo'] = $coverFileName;

        if (isset($updateData['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }
        $input['status'] = $status;

        if ($input['restaurant_group_id'] == 0) {
            $restaurantGroupId = null;
        } else {
            $restaurantGroupId = $input['restaurant_group_id'];
        }
        $input['restaurant_group_id'] = $restaurantGroupId;

        Restaurant::create($input);
        return redirect("restaurants")->with('success', 'Created successfully');
    }


    public function details($id)
    {
        $restaurant = Restaurant::find($id);
        $openingDays = OpeningDays::all();
        $restaurantGroups = RestaurantGroup::all();

        return view(
            'restaurants/details_restaurant',
            ['restaurant' => $restaurant, 'opening_days' => $openingDays, 'restaurant_groups' => $restaurantGroups]
        );
    }

    public function edit($id)
    {
        $restaurant = Restaurant::find($id);
        $openingDays = OpeningDays::all();
        $restaurantGroups = RestaurantGroup::all();

        return view(
            'restaurants/edit_restaurant',
            ['restaurant' => $restaurant, 'opening_days' => $openingDays, 'restaurant_groups' => $restaurantGroups]
        );
    }

    public function update(Request $request, $id)
    {

        $updateData = $request->all();


        if (isset($updateData['status'])) {
            $status = 1;
        } else {
            $status = 0;
        }

        $updateData['status'] = $status;

        Restaurant::find($id)->update($updateData);
        return redirect("restaurants")->with('success', 'Updated successfully');
    }

    public function delete($id)
    {

        $restaurant = Restaurant::find($id);
        $restaurant->delete();
        return redirect("restaurants")->with('info', 'Deleted successfully');
    }
}
