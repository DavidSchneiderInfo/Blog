<?php

namespace App\Http\Controllers\TermsOfService;

use App\Http\Controllers\Controller;

class ShowTermsOfServiceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('tos.show');
    }
}
