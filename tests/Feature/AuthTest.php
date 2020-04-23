<?php

namespace Tests\Feature;

//use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function user_login()
    {
        $this->post('/login',[
            'email' => 'Aziz@ems.com',
            'password' => '11111111'
        ]);
        $this->assertAuthenticated();
    }

    /**
     * @test
     * @return void
     */
    public function user_logout()
    {
        $response = $this->actingAs(User::find(2))
                         ->post('/logout');
        $this->assertGuest();
    }
}
