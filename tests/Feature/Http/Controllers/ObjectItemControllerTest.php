<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\ObjectItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ObjectItemController
 */
class ObjectItemControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $objectItems = ObjectItem::factory()->count(3)->create();

        $response = $this->get(route('object-item.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $objectItem = ObjectItem::factory()->create();

        $response = $this->get(route('object-item.show', $objectItem));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ObjectItemController::class,
            'update',
            \App\Http\Requests\ObjectItemUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $objectItem = ObjectItem::factory()->create();
        $title = $this->faker->sentence(4);
        $email = $this->faker->safeEmail;
        $responsible = $this->faker->word;

        $response = $this->put(route('object-item.update', $objectItem), [
            'title' => $title,
            'email' => $email,
            'responsible' => $responsible,
        ]);

        $objectItem->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($title, $objectItem->title);
        $this->assertEquals($email, $objectItem->email);
        $this->assertEquals($responsible, $objectItem->responsible);
    }
}
