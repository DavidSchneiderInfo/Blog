<?php

namespace App\Http\Controllers\TermsOfService;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class AgreeToTermsOfServiceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Redirector|Application|RedirectResponse
    {
        $request->validate([]);

        return redirect(
            $request->has('return_url') ? $request->get('return_url') : url('/')
        )->withCookie('terms_of_service_agreement', true);
    }
}
