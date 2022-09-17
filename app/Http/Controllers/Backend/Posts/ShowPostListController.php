<?php

namespace App\Http\Controllers\Backend\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowPostListController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = $request->user();

        if ($user === null) {
            abort(404);
        }

        return view('backend.posts.index')
            ->withPosts($user->posts()->paginate());
    }
}
