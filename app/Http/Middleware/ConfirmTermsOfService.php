<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfirmTermsOfService
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Logged in users shouldn't be bothered
        if (Auth::id()) {
            return $next($request);
        }

        // Find cookie
        $agreement = $request->cookie('terms_of_service_agreement');

        // Verify cookie
        if ($agreement !== null) {
            return $next($request);
        }

        // No cookie
        return redirect(route('tos.show', [
            'return_url' => $request->url(),
        ]));
    }
}
