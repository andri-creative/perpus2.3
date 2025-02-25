<?php

namespace Database\Seeders;

use App\Models\DurationsModal;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'category' => 'Guru',
                'default_duration' => 12,
            ],
            [
                'category' => 'Siswa Komix',
                'default_duration' => 1,
            ],
            [
                'category' => 'Siswa Paket',
                'default_duration' => 10,
            ],
        ];

        foreach ($data as $datas) {
            DurationsModal::create($datas);
        }
    }
}
