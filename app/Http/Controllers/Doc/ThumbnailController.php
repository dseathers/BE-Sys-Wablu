<?php

namespace App\Http\Controllers\Doc;

use App\Models\DocPhotos;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;
use Illuminate\Support\Facades\Storage;

class ThumbnailController
{
    public function index(Request $request)    {
        $fileid = $request->input('file_id');

        if (!$fileid) {
            return response()->json([
                'success' => false,
                'message' => 'file_id is required',
            ], 400);
        }

$photo = DocPhotos::where('file_id', $fileid)->first();

if (
    !$photo ||
    !$photo->path ||
    !Storage::disk('public')->exists(str_replace('storage/', '', $photo->path))
) {
    return response()->json([
        'success' => false,
        'message' => 'File not found',
    ], 404);
}

$relativePath = str_replace('storage/', '', $photo->path); // fix path untuk disk('public')

$fileContents = Storage::disk('public')->get($relativePath);
$mimeType = Storage::disk('public')->mimeType($relativePath);
$base64 = 'data:' . $mimeType . ';base64,' . base64_encode($fileContents);

return response()->json([
    'success' => true,
    'file_id' => $fileid,
    'base64' => $base64,
]);
    }
}
