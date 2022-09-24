<?php

namespace App\Http\Controllers\Backend\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class EditPostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Post $post
     *
     * @return bool|Response|Application|Factory|View
     * @throws AuthorizationException
     */
    public function __invoke(Post $post): View|Factory|Response|bool|Application
    {
        $this->authorize('update', $post);

        return view('backend.posts.edit')
            ->with('post', $post);
    }
}
