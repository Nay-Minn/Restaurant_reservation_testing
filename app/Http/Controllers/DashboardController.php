<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RestaurantGroup;
use App\Models\Restaurant;

class DashboardController extends Controller
{
    public function index() {

        $restaurants = Restaurant::all();
        $restaurant_groups_count = RestaurantGroup::count();
        $restaurants_count = Restaurant::count();

        return view('/dashboards/index', [ 'restaurants_count' => $restaurants_count, 
        'restaurant_groups_count' => $restaurant_groups_count, 'restaurants' => $restaurants]);
    }
}
