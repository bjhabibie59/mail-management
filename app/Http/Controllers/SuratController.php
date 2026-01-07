<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use DeleteSuratHandler;
use App\Helpers\WebResponse;
use Illuminate\Http\Request;
use App\Http\Resources\SuratResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Handlers\StoreSuratHandler;
use App\Http\Requests\SuratStoreRequest;
use App\Http\Handlers\UpdateSuratHandler;
use App\Http\Requests\SuratUpdateRequest;
use App\Http\Handlers\SuratPaginateHandler;

class SuratController extends Controller
{
    public function __construct(
        private StoreSuratHandler $storeHandler,
        private UpdateSuratHandler $updateHandler,
        private DeleteSuratHandler $deleteHandler
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, SuratPaginateHandler $handler)
    {
        $surat = $handler->handle($request);

        return view('surat.index', compact('surat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('surat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SuratStoreRequest $request)
    {
        try {
            $this->storeHandler->handle($request);

            return WebResponse::success(
                'Surat berhasil dibuat',
                'surat.index'
            );

        } catch (\Throwable $e) {
            report($e);

            return WebResponse::error(
                'Terjadi kesalahan saat menyimpan surat'
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Surat $surat)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Surat $surat)
    {
        return view('surat.edit', compact('surat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SuratUpdateRequest $request, Surat $surat)
    {
        try {
            $this->updateHandler->handle($request, $surat);

            return WebResponse::success(
                'Surat berhasil diperbarui',
                'surat.index'
            );

        } catch (\Throwable $e) {
            report($e);

            return WebResponse::error(
                'Terjadi kesalahan saat memperbarui surat'
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Surat $surat)
    {
        try {
            $this->deleteHandler->handle($surat);

            return WebResponse::success(
                'Surat berhasil dihapus',
                'surat.index'
            );

        } catch (\Throwable $e) {
            report($e);

            return WebResponse::error(
                'Terjadi kesalahan saat menghapus surat'
            );
        }
    }
}
