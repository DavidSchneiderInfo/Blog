<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class HomepageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return Response
     */
    public function __invoke()
    {
        return view('welcome');
    }
}
