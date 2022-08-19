<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TicketTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_required_name_for_store_ticket()
    {
        $category = $this->storeCategory();

        $this->json('POST', route('api.ticket.create'), [
            'description' => 'description 01 test api',
            'category_id' => $category->id
        ],['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([ // TODO
                "status_code" => 422,
                "message" => "The name field is required.",
                "data" => null
            ]);
    }

    public function test_create_ticket()
    {
        $category = $this->storeCategory();

        $response = $this->json('POST', route('api.ticket.create'),[
            'name' => 'name 01 test api',
            'description' => 'description 01 test api',
            'category_id' => $category->id
        ], ['Accept' => 'application/json']);

        $response->assertStatus(200); // add assert json structure
    }


    public function test_update_ticket()
    {
        $category = $this->storeCategory();

        $ticket = $this->storeTicket();

        $response = $this->json('PUT', route('api.ticket.update',$ticket['id']),[
            'name' => 'update name 01 test api',
            'description' => 'update description 01 test api',
            'category_id' => $category->id
        ], ['Accept' => 'application/json']);

        $response->assertStatus(200); // add assert json structure
    }

    public function storeCategory(){
        \App\Models\Category::factory(1)->create();
        return Category::first();
    }

    public function storeTicket(){
        $category = $this->storeCategory();
        $response = $this->json('POST', route('api.ticket.create'),[
            'name' => 'name 01 test api',
            'description' => 'description 01 test api',
            'category_id' => $category->id
        ], ['Accept' => 'application/json']);

        return $response->json()['data'];
    }



    public function test_get_tickets()
    {
        $this->json('GET', route('api.ticket.list'), ['Accept' => 'application/json'])
            ->assertStatus(200); // add assert json structure
    }

}
