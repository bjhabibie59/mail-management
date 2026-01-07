<?php

namespace App\Http\Handlers;

use App\Models\Surat;
use Illuminate\Http\Request;

class SuratPaginateHandler
{
    public function handle(Request $request)
    {
        return Surat::query()
            ->when($request->search, function ($q) use ($request) {
                $q->where('judul', 'like', "%{$request->search}%")
                  ->orWhere('nomor_surat', 'like', "%{$request->search}%");
            })
            ->when($request->status, function ($q) use ($request) {
                $q->where('status', $request->status);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();
    }
}
