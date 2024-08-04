<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{

    // List
    public function index()
    {
        $files = File::all();
        // return view('upload', compact('files'));
        return view('dashboard', compact('files'));
    }

    public function showUploadForm()
    {
        return view('upload');
    }

    // Upload
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $file = $request->file('file');
        $path = $file->store('files');

        File::create([
            'name' => $file->getClientOriginalName(),
            'path' => $path,
        ]);

        return back()->with('success', 'File uploaded successfully.');
    }

    // Delete
    public function delete($id)
    {
        $file = File::findOrFail($id);
        Storage::delete($file->path);
        $file->delete();

        return back()->with('success', 'File deleted successfully.');
    }

    // File Preview
    public function preview($id)
    {
        $file = File::findOrFail($id);
        return response()->file(storage_path('app/' . $file->path));
    }
}
