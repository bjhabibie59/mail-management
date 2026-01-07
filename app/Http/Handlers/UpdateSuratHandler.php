<?php
namespace App\Http\Handlers;

use App\Models\Surat;
use App\Helpers\FileUpload;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SuratUpdateRequest;

class UpdateSuratHandler
{
    public function handle(SuratUpdateRequest $request, Surat $surat): void
    {
        DB::transaction(function () use ($request, $surat) {

            $filePath = $surat->file;

            if ($request->hasFile('file')) {
                $filePath = FileUpload::replace(
                    $request->file('file'),
                    'surat',
                    $surat->file
                );
            }

            $surat->update([
                'nomor_surat' => $request->nomor_surat,
                'tanggal'     => $request->tanggal,
                'perihal'     => $request->perihal,
                'jenis'       => $request->jenis,
                'file'        => $filePath,
            ]);
        });
    }
}
