<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload_Files;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadFilesController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:2048000', // file size
        ]);

        $user = Auth::user();
        $file = $request->file('file');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('uploads', $fileName);

        Upload_Files::create([
            'user_id' => $user->id,
            'file_name' => $fileName,
            'file_path' => $filePath,
            'file_size' => $file->getSize(),
        ]);

        return back()->with('success', 'File uploaded successfully');
    }
}
