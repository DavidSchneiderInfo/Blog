<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Response;

class ShowPostsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return Response
     */
    public function __invoke()
    {
        $posts = Post::orderBy('created_at', 'DESC')
            ->paginate(10);
        return view('blog.index')->with('posts', $posts);
    }
}
