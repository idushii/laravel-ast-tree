<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Responsible;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ResponsibleController
 */
class ResponsibleControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $responsible = Responsible::factory()->create();

        $response = $this->delete(route('responsible.destroy', $responsible));

        $response->assertNoContent();

        $this->assertSoftDeleted($responsible);
    }
}
