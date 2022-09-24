<?php

namespace App\Http\Controllers\Backend\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class EditPostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \App\Models\Post $post
     *
     * @return bool|\Illuminate\Auth\Access\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function __invoke(Post $post): View|Factory|Response|bool|Application
    {
        $this->authorize('update', $post);

        return view('backend.posts.edit')
            ->with('post', $post);
    }
}
