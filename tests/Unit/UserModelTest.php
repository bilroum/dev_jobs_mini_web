<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserModelTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * Testing if user attributes are correct
     */
    public function test_user_has_correct_attributes()
    {
        //create User
        $user = User::factory()->create(['name' => 'Test Testoropoulos', 'email' => 'testoropoulos∆gmail.com', 'password' => 'secret']);

        $this->assertEquals('Test Testoropoulos', $user->name);
    }

}
