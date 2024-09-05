<?php
namespace App\Http\Controllers;

use App\Imports\RecordsImport;
use App\Models\Upload_Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class UploadFilesController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:2048000', //file size
        ]);

        $user = Auth::user();
        $file = $request->file('file');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('uploads', $fileName);


        $uploadFile = Upload_Files::create([
            'user_id' => $user->id,
            'file_name' => $fileName,
            'file_path' => $filePath,
            'file_size' => $file->getSize(),
        ]);

        Excel::import(new RecordsImport($uploadFile->id), storage_path('app/' . $filePath));

        return back()->with('success', 'File uploaded and records processed successfully');
    }
}
