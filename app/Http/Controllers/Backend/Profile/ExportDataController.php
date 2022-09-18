<?php

namespace App\Http\Controllers\Backend\Profile;

use App\Http\Controllers\Controller;
use App\Services\ProfileExportService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportDataController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): StreamedResponse
    {
        return response()->streamDownload(function () use ($request) {
            $service = new ProfileExportService();
            echo $service->prepareExport($request->user());
        }, 'export.json');
    }
}
