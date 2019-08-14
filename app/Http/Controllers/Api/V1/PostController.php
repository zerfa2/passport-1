<?php

namespace App\Http\Controllers\Api\V1;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostCollection;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return new PostCollection(Post::all());
        // return new PostCollection(Post::paginate(1));
        return new PostCollection(Post::with(['author','comments'])->paginate(1));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        PostResource::withoutWrapping();
        $post = Post::create($request->all());
        // return \response()->json(['data'=> $post], 201);
        return (new PostResource($post))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // Quita el data
        PostResource::withoutWrapping();
        return new PostResource($post);
        // return \response()->json(['data'=> $post], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return \response()->json(['data'=> $post], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response(null, 204);
    }
}
