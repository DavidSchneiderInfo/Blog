<?php

namespace App\Http\Controllers\Legal;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ShowTermsOfServiceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Factory|View|Response|bool|Application
    {
        return view('legal.tos')
            ->with('return_url', $request->has('return_url') ? $request->get('return_url') : false)
            ->with(
                'doc',
                file_get_contents(lang_path(app()->getLocale().'/legal/tos.md'))
            );
    }
}
