<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Workman;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\WorkmanController
 */
class WorkmanControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\WorkmanController::class,
            'update',
            \App\Http\Requests\WorkmanUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $workman = Workman::factory()->create();
        $employed_id = $this->faker->word;
        $fio = $this->faker->word;
        $phone = $this->faker->phoneNumber;
        $year_birth = $this->faker->numberBetween(-10000, 10000);
        $passport = $this->faker->word;
        $inn = $this->faker->word;
        $bank_card = $this->faker->word;

        $response = $this->put(route('workman.update', $workman), [
            'employed_id' => $employed_id,
            'fio' => $fio,
            'phone' => $phone,
            'year_birth' => $year_birth,
            'passport' => $passport,
            'inn' => $inn,
            'bank_card' => $bank_card,
        ]);

        $workman->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($employed_id, $workman->employed_id);
        $this->assertEquals($fio, $workman->fio);
        $this->assertEquals($phone, $workman->phone);
        $this->assertEquals($year_birth, $workman->year_birth);
        $this->assertEquals($passport, $workman->passport);
        $this->assertEquals($inn, $workman->inn);
        $this->assertEquals($bank_card, $workman->bank_card);
    }
}
