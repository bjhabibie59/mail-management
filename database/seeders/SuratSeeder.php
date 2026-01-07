<?php

namespace Database\Seeders;

use App\Models\Surat;
use App\Models\User;
use Illuminate\Database\Seeder;

class SuratSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();

        Surat::factory()->count(50)->create([
            'user_id' => $user->id,
        ]);
    }
}
