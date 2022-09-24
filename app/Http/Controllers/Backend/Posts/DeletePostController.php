<?php

namespace App\Http\Controllers\Backend\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class DeletePostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post): Redirector|Application|RedirectResponse
    {
        $post->delete();

        return redirect(route('backend.posts.index'));
    }
}
