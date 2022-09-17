<?php

namespace App\Http\Controllers\Backend\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CreatePostsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return bool|\Illuminate\Auth\Access\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke(): View|Factory|Response|bool|Application
    {
        return view('backend.posts.create');
    }
}
