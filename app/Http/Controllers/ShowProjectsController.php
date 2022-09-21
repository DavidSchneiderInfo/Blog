<?php

namespace App\Http\Controllers;

class ShowProjectsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view('projects');
    }
}
