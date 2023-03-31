<?php

namespace Tests\Unit;

use Tests\TestCase;

class RestaurantGroupComponentTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_restaurantGroupsComponent()
    {
        $this->withoutExceptionHandling();
        $this->get('/restaurant-groups')->assertStatus(200);
    }
}
