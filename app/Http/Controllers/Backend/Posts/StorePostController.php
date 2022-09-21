<?php

namespace App\Http\Controllers\Backend\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Posts\CreatePostRequest;
use App\Services\PostService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class StorePostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param CreatePostRequest $request
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function __invoke(CreatePostRequest $request): Redirector|RedirectResponse|Application
    {
        $user = $request->user();
        $post = PostService::create($user, $request->except('_token'));
        $user->posts()->save($post);

        return redirect(route('backend.posts.edit', [$post]));
    }
}
