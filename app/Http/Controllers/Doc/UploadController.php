<?php

namespace App\Http\Controllers\Doc;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\DocPhotos;

class UploadController
{
       public function upload(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:2048', // maksimal 2MB
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Simpan ke storage/app/public/photos
            $path = $file->storeAs('photos', $filename, 'public');

            // Simpan ke database
            $doc = DocPhotos::create([
                'file_name' => $filename,
                'path' => 'storage/' . $path,
            ]);

            return response()->json([
                'success' => true,
                'code'=> 200,
                'message' => 'Upload successful',
                'file_id' => $doc->file_id,
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'No file uploaded'
        ], 400);
    }
}
