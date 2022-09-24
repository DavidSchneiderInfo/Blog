<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ShowSinglePostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(
        int    $postId
    ): Factory|View|Response|bool|Application
    {
        return view('blog.show')
            ->with('post', Post::findOrFail($postId));
    }
}
