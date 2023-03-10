<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OpeningDays;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        OpeningDays::factory()->create([
            "id"=> 1,
            'opening_day' => "Sunday"
        ]);
        OpeningDays::factory()->create([
            "id"=> 2,
            'opening_day' => "Monday"
        ]);
        OpeningDays::factory()->create([
            "id"=> 3,
            'opening_day' => "Tuesday"
        ]);
        OpeningDays::factory()->create([
            "id"=> 4,
            'opening_day' => " Wednesday"
        ]);
        OpeningDays::factory()->create([
            "id"=> 5,
            'opening_day' => " Thursday"
        ]);
        OpeningDays::factory()->create([
            "id"=> 6,
            'opening_day' => " Friday"
        ]);
        OpeningDays::factory()->create([
            "id"=> 7,
            'opening_day' => " Saturday"
        ]);
    }
};
