<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AdminController
 */
class AdminControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $admins = Admin::factory()->count(3)->create();

        $response = $this->get(route('admin.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $admin = Admin::factory()->create();

        $response = $this->get(route('admin.show', $admin));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AdminController::class,
            'update',
            \App\Http\Requests\AdminUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $admin = Admin::factory()->create();
        $uid = $this->faker->word;
        $fio = $this->faker->word;
        $email = $this->faker->safeEmail;

        $response = $this->put(route('admin.update', $admin), [
            'uid' => $uid,
            'fio' => $fio,
            'email' => $email,
        ]);

        $admin->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($uid, $admin->uid);
        $this->assertEquals($fio, $admin->fio);
        $this->assertEquals($email, $admin->email);
    }
}
