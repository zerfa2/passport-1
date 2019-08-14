<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Auth;
// use App\Http\Resources\PostsRelationshipResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user = Auth::user();
        // return parent::toArray($request);
        return [
            'type'=> $this->getTable(),
            'id' =>$this->id,
            'attributes'=>[
                'title'=> $this->title
            ],
            // $this->mergeWhen($user->isAdmin(),[
            //     'created' => $this->created_at
            // ]),
            $this->mergeWhen(($this->isAuthorLoaded() && $this->isCommentsLoaded()),[
                'relationships'=> new PostsRelationshipResource($this),

            ]),

            'links'=>[
                'self'=> route('posts.show',['posts'=>$this->id])
            ]
        ];

      

    }
}
