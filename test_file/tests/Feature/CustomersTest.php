<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Qna;

class CustomersTest extends TestCase
{
    use RefreshDatabase;
    

    /** @test */
    public function only_logged_in_users_can_see_the_customers_list()
    {
        $response = $this->get('/home')
            ->assertRedirect('/login');            
    }

    /** @test */
    public function authenticated_users_can_see_the_customers_lsit()
    {
        $this->actingAsUser();

        $response = $this->get('/home')
            ->assertOk();
    }
    
    /** @test */
    public function a_customer_can_be_added_through_the_form()
    {
        //더 자세한 에러를 볼 수 있다.
        $this->withoutExceptionHandling();

        $this->actingAsUser();

        $response = $this -> post('/qna', $this->data());

        $this->assertCount(1, Qna::all());
    }

    /** @test */
    public function a_name_is_required()
    {
        $this->actingAsUser();

        $response = $this -> post('/qna', array_merge($this->data(), ['title' => '']));
        
        $response -> assertSessionHasErrors('title');
        $this->assertCount(0, Qna::all());
    }

    /** @test */
    public function a_name_is_at_least_3_characters()
    {
        $this->actingAsUser();

        $response = $this -> post('/qna', array_merge($this->data(), ['title' => 'ss']));
        
        $response -> assertSessionHasErrors('title');
        $this->assertCount(0, Qna::all());
    }


    private function data()
    {
        return [                        
            'title' => "aaa",
            'body' => "hello",
        ];
    }

    private function actingAsUser()
    {
        $this->actingAs(User::factory()->create());
    }
    
}
 
