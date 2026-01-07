<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SuratResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'nomor_surat' => $this->nomor_surat,
            'tanggal'     => $this->tanggal?->format('d-m-Y'),
            'perihal'     => $this->perihal,
            'jenis'       => $this->jenis,
            'file_url'    => $this->file ? asset('storage/' . $this->file): null,
            'author'      => [
                'id'   => $this->user->id,
                'nama' => $this->user->nama,
            ],
            'created_at' => $this->created_at,
        ];
    }
}
