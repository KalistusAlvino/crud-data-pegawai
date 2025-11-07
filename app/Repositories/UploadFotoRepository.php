<?php

namespace App\Repositories;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


class UploadFotoRepository implements UploadFotoInterface
{
    public static function upload(UploadedFile $file, string $nip, ?string $oldPath = null): string
    {
        $folder = 'pegawai';
        $extension = $file->getClientOriginalExtension();
        $filename = $nip . '.' . $extension;
        $path = "$folder/$filename";

        if ($oldPath && Storage::disk('public')->exists($oldPath)) {
            Storage::disk('public')->delete($oldPath);
        }

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }

        $file->storeAs($folder, $filename, 'public');

        return $path;
    }

    public static function delete(string $foto_path)
    {
        if ($foto_path && Storage::disk('public')->exists($foto_path)) {
            Storage::disk('public')->delete($foto_path);
        }
    }
}
