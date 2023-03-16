<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RestaurantGroup;
use App\Models\Restaurant;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $restaurants = Restaurant::all();
        $restaurantGroupsCount = RestaurantGroup::count();
        $restaurantsCount = Restaurant::count();

        return view('/dashboards/index', [
            'restaurants_count' => $restaurantsCount,
            'restaurant_groups_count' => $restaurantGroupsCount, 'restaurants' => $restaurants
        ]);
    }
}
