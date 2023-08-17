<?php

namespace App\Http\Controllers;

use App\Imports\CSVImport;
use App\Jobs\CSVImportJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class UploadFileController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|max:5000000',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();

            Storage::disk('uploads')->put($fileName, file_get_contents($file));

            $filePath = storage_path('app/uploads') . '/' . $fileName;

            Excel::import(new CSVImport(), $filePath);

            return response()->json(['message' => 'File upload started.']);
        }

        return response()->json(['message' => 'No file uploaded.'], 400);
    }
}
