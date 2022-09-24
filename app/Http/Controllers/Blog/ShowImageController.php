<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ShowImageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $filename): StreamedResponse
    {
        return Storage::download('media/' . $filename);
    }
}
