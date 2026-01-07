<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileUpload
{
    /**
     * Upload file ke storage
     */
    public static function upload(
        UploadedFile $file,
        string $path,
        string $disk = 'public'
    ): string {
        return $file->store($path, $disk);
    }

    /**
     * Upload file & replace file lama (jika ada)
     */
    public static function replace(
        UploadedFile $file,
        string $path,
        ?string $oldFile = null,
        string $disk = 'public'
    ): string {
        if ($oldFile && Storage::disk($disk)->exists($oldFile)) {
            Storage::disk($disk)->delete($oldFile);
        }

        return self::upload($file, $path, $disk);
    }

    /**
     * Hapus file
     */
    public static function delete(
        ?string $filePath,
        string $disk = 'public'
    ): void {
        if ($filePath && Storage::disk($disk)->exists($filePath)) {
            Storage::disk($disk)->delete($filePath);
        }
    }
}
