<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CommentController
 */
class CommentControllerTest extends TestCase
{
    /**
     * @test
     */
    public function show_displays_view()
    {
        $comment = Comment::factory()->create();

        $response = $this->get(route('comment.show', $comment));

        $response->assertOk();
        $response->assertViewIs('comment.show');
        $response->assertViewHas('show');
    }
}
