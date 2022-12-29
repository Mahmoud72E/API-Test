<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    use apiResponseTrait;

    /**
     * Get Posts
     * Return api JSON
     */
    public function index()
    {
        $posts = Post::get();
        return $this->apiResponse(PostResource::collection($posts), 'success', 200);
    }

    /**
     * Get Post
     * @Parm Post Id $id
     * @return apiResponse Function() JSON
     */
    public function show($id)
    {
        $post = Post::find($id);
        if($post){
            return $this->apiResponse(new PostResource($post), 'success', 200);
        }

        return $this->apiResponse(null, 'Not Found', 404);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'=>'required',
            'body'=>'required',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }

        $post = Post::create($request->all());
        if($post){
            return $this->apiResponse(new PostResource($post), 'ok', 201);
        }
        return $this->apiResponse(null, 'Not Save', 400);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post ID  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'=>'required',
            'body'=>'required',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }

        $post = Post::find($id);

        if(!$post){
            return $this->apiResponse(null, 'Not Found', 404);
        }

        $post->update($request->all());

        if($post){
            return $this->apiResponse(new PostResource($post), 'Updated', 201);
        }

        return $this->apiResponse(null, 'Not Found', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post ID  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if(!$post){
            return $this->apiResponse(null, 'Post Not Found', 404);
        }

        $post->delete($id);

        if($post){
            return $this->apiResponse(null, 'Post Deleted', 201);
        }
    }
}
