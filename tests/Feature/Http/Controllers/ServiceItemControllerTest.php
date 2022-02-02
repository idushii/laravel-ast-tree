<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\ObjectItem;
use App\Models\ServiceItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ServiceItemController
 */
class ServiceItemControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $serviceItems = ServiceItem::factory()->count(3)->create();

        $response = $this->get(route('service-item.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $serviceItem = ServiceItem::factory()->create();

        $response = $this->get(route('service-item.show', $serviceItem));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ServiceItemController::class,
            'update',
            \App\Http\Requests\ServiceItemUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $serviceItem = ServiceItem::factory()->create();
        $title = $this->faker->sentence(4);
        $template = $this->faker->randomElement(/** enum_attributes **/);
        $size = $this->faker->numberBetween(-10000, 10000);
        $active = $this->faker->boolean;
        $object_item = ObjectItem::factory()->create();

        $response = $this->put(route('service-item.update', $serviceItem), [
            'title' => $title,
            'template' => $template,
            'size' => $size,
            'active' => $active,
            'object_item_id' => $object_item->id,
        ]);

        $serviceItem->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($title, $serviceItem->title);
        $this->assertEquals($template, $serviceItem->template);
        $this->assertEquals($size, $serviceItem->size);
        $this->assertEquals($active, $serviceItem->active);
        $this->assertEquals($object_item->id, $serviceItem->object_item_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $serviceItem = ServiceItem::factory()->create();

        $response = $this->delete(route('service-item.destroy', $serviceItem));

        $response->assertNoContent();

        $this->assertDeleted($serviceItem);
    }
}
