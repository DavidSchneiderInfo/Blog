<?php

namespace App\Http\Controllers\Backend\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShowPostListController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     *
     * @return Response
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
