<?php

namespace App\Http\Controllers\Backend\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Posts\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class UpdatePostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \App\Http\Requests\Backend\Posts\UpdatePostRequest $request
     * @param \App\Models\Post $post
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function __invoke(
        UpdatePostRequest $request,
        Post              $post
    ): Redirector|Application|RedirectResponse
    {
        $this->authorize('update', $post);

        $post->update($request->except('_token'));

        return redirect(route('backend.posts.edit', $post));
    }
}
