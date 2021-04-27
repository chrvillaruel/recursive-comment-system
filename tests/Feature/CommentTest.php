<?php

namespace Tests\Feature;

use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

     /** @test */
    public function it_can_display_all_comments()
    {

    $comment = Comment::factory(5)->create();

    $response = $this->get('/api/comments');

        $response
            ->assertStatus(201)
            ->assertJson([
                'error' => false,
                'comments' => $response['comments'],
            ]);
    }

    /** @test */
    public function it_should_create_comment()
    {

        $comment = [
            'name' => 'Chan',
            'body' => 'this is a body',
            'level'=> 1
        ];

       $response = $this->postJson('/api/comments', $comment);

        $response
            ->assertStatus(201)
            ->assertJson([
                'error' => false,
                'comments' => $comment,
            ]);
    }


       /** @test */
    public function it_can_reply_to_comment()
    {

        $comment = Comment::factory()->create();

        $reply = [
            'name' => 'Chan',
            'body' => 'this is a body',
            'level'=> 2,
            'parent_id' => $comment["id"]
        ];

       $response_from_reply = $this->postJson('/api/comments', $reply);

        $response_from_reply
            ->assertStatus(201)
            ->assertJson([
                'error' => false,
                'comments' => $reply,
            ]);

    }

    /** @test */
    public function it_should_validate_comment_form()
    {
        $comment = [
            'name' => 'Chan',
            'body' => 'this is a body',
            'level'=> "",
        ];

       $response = $this->postJson('/api/comments', $comment);

       $response
            ->assertStatus(422)
            ->assertJson([
                'message' =>  "The given data was invalid.",
            ])

    }

}
