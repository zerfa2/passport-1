<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Passport\Passport;
// use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication,RefreshDatabase;

    public $baseUrl = "/api/v1/";


    public function setUp():void {
        // LLamo al construct
        parent::setUp();
        $this->signIn();
    }

    public function signIn(){
        $user = create('App\User');

        Passport::actingAs($user);
    }
}
