<?php

namespace App\Http\Controllers\Backend\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ImportDataController extends Controller
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
        $request->file('importData');

        return redirect(route('home'));
    }
}
