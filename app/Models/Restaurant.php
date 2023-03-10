<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\RestaurantGroup;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = [
        'english_name',
        "myanmar_name" ,
        "username" ,
        "phone" ,
        "passcode" ,
        "confirm_passcode" ,
        "city" ,
        "township" ,
        "address" ,
        "profile_photo" ,
        "cover_photo" ,
        "restaurant_group_id" ,
        "status" ,
        "opening_hours" ,
        "closing_hours" ,
        "opening_day_id" ,
        "reservation_cancel_minutes" ,
        "cancel_refund_percentage"
    ];

    protected $guarded = [];
    
                                                           
    protected $casts = [
        'opening_day_id' => 'array'
      ];
              
      
      public function opening_days() {
        return $this->hasMany('App\Models\OpeningDays');
      }
      public function restaurant_group() {
        return $this->belongsTo(RestaurantGroup::class);
      }
                                                
}

