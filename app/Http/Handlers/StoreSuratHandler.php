<?php
namespace App\Http\Handlers;

use App\Models\Surat;
use App\Helpers\FileUpload;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SuratStoreRequest;

class StoreSuratHandler
{
    public function handle(SuratStoreRequest $request)
    {
        DB::transaction(function () use ($request) {

            $filePath = FileUpload::upload(
                $request->file('file'),
                'surat'
            );

            Surat::create([
                'nomor_surat' => $request->nomor_surat,
                'tanggal'     => $request->tanggal,
                'perihal'     => $request->perihal,
                'jenis'       => $request->jenis,
                'file'        => $filePath,
                'user_id'     => auth()->id(),
            ]);
        });

    }
}
