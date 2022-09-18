<?php

namespace App\Http\Controllers\Backend\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ShowProfileController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Factory|View|Response|bool|Application
    {
        return view('backend.profile.details')->with('user', $request->user());
    }
}
