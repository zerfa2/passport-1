<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\App;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * @test
     */
    public function stores_post()
    {
        $user = create('App\User');
        $data =[
            "author_id"=> $user->id,
            'title'=> $this->faker->sentence($nbWords=6, $variableNbWords=true),
            'content'=> $this->faker->text($maxNbChars =40)
            
            
        ];

        $response = $this->json('POST', $this->baseUrl . "posts", $data);
        
        // Evaluamos la rpta del codigo
        $response->assertStatus(201);

        $this->assertDatabaseHas('posts', $data);
        $post = Post::all()->first();


        $response->assertJson([
            'data' => [
                'id' => $post->id,
                'title' =>$post->title
                // "content"
            ]
        ]);

    }


    /**
     * @test
     */
    public function deletes_post(){
        create('App\User');
        $post = create('App\Post');
        $this->json('DELETE', $this->baseUrl."posts/{$post->id}")->assertStatus(204);

        $this->assertNull(Post::find($post->id));
    }

    public function updates_post(){
        $data = [
            'title'=> $this->faker->sentence($nbWords=6, $variableNbWords=true),
            'content'=> $this->faker->text($maxNbChars =40)
        ];

        create('App\User');
        // Ejecuta el Faker de Post
        $post = create('App\Post');

        $responde = $this->json('PUT', $this->baseUrl."post/{$post->id}",$data);
        $response->assertStatus(200);

        // Refresca los datos, retorna al mismo object pero actualizado
        $post = $post->fresh();

        // Validad q los datos del arreglo post sean los mismos q el arreglo data
        $this->assertEquals($post->title, $data['title']);
        $this->assertEquals($post->content, $data['content']);

    }

    public function shows_post(){
        create('App\User');
        $post = create('\App\Post');
        $response = $this->json('GET', $this->baseUrl. "post/{$post->id}");
        $response->assertStatus(200);

        $response->assertJson([
            "data"=>[
                "id" => $post->id,
                "title" => $post->title
            ]
        ]);
    }

}
