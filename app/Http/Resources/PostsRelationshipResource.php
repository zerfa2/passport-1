<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostsRelationshipResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            "autor"=>[
                'links' =>[
                    'self'=>route('post.relationships.author', ['post'=>$this->id]),
                    'related'=>route('post.author', ['post'=>$this->id])
                ],
                'data'=> new AuthorIndetifierResource($this->author)
                // 'data'=>[
                //     'type'=> $this->author->id,
                // ]
            ],

            // addional  pasar parametros entre los diferentes recoursos
            "comments" =>(new PostCommentsRelationshipCollection($this->comments))->additional(["post"=>$this])
        ];
    }
}
