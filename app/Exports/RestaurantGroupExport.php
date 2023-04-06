<?php

namespace App\Exports;

use App\Models\RestaurantGroup;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class RestaurantGroupExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return RestaurantGroup::all();
    }
}

// class RestaurantGroupExport implements FromView
// {

//     protected $restaurantGroupsRequests;

//     public function __construct($restaurantGroupsRequests = null)
//     {
//         $this->restaurantGroupsRequests = $restaurantGroupsRequests;
//     }

//     public function view(): View
//     {
//         return view('restaurant_group_request_excel', ['attendances' => $this->restaurantGroupsRequests,]);
//     }
// }
