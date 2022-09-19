<?php

namespace App\Http\Controllers\TermsOfService;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgreeToTermsOfServiceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([]);
        return redirect()->intended()->withCookie('terms_of_service_agreement', true);
    }
}
