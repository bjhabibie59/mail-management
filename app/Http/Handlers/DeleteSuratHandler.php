<?php

use App\Helpers\FileUpload;
use App\Models\Surat;
use Illuminate\Support\Facades\DB;

class DeleteSuratHandler
{
    public function handle(Surat $surat)
    {
        DB::transaction(function () use ($surat) {
            FileUpload::delete($surat->file);
            $surat->delete();
        });
    }
}
