<?php

namespace App\Http\Controllers\Backend\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PreviewPostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Post $post
     *
     * @return Factory|View|Response|bool|Application
     */
    public function __invoke(Post $post): Factory|View|Response|bool|Application
    {
        return view('backend.posts.preview')
            ->with('post', $post);
    }
}
