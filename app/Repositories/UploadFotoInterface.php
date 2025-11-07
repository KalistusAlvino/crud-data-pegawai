<?php

namespace App\Repositories;

use Illuminate\Http\UploadedFile;

interface UploadFotoInterface {
    public static function upload(UploadedFile $file, string $nip, ?string $oldPath = null);

    public static function delete(string $foto_path);
}
