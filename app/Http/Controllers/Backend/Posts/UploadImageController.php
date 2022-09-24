<?php

namespace App\Http\Controllers\Backend\Posts;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UploadImageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $upload = $request->file('upload');
        if (! $upload) {
            return response()->json([
                'error' => 'No file found.',
            ], 422);
        }

        $filename = $upload->storeAs(
            'media',
            Carbon::now()->format('Y-m-d')
            . '_'
            . Str::uuid()
            . '.'
            . $upload->getClientOriginalExtension()
        );

        return response()->json([
            'default' => url($filename),
        ]);
    }
}
