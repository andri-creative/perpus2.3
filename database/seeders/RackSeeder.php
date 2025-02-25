<?php

namespace Database\Seeders;

use App\Models\RackModel;
use App\Models\SubModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'code_rack' => 'R001',
                'name_rack' => 'Rak A',
                'subs' => [
                    ['code_sub' => 'S001'],
                    ['code_sub' => 'S002'],
                ],
            ],
            [
                'code_rack' => 'R002',
                'name_rack' => 'Rak B',
                'subs' => [
                    ['code_sub' => 'S003'],
                    ['code_sub' => 'S004'],
                ],
            ],
            [
                'code_rack' => 'R003',
                'name_rack' => 'Rak C',
                'subs' => [
                    ['code_sub' => 'S005'],
                    ['code_sub' => 'S006'],
                ],
            ],
            [
                'code_rack' => 'R004',
                'name_rack' => 'Rak D',
                'subs' => [
                    ['code_sub' => 'S007'],
                ],
            ],
            [
                'code_rack' => 'R005',
                'name_rack' => 'Rak D',
                'subs' => [
                    ['code_sub' => 'S007'],
                ],
            ],
        ];
            foreach ($data as $rackData) {
                $rack = RackModel::create([
                    'code_rack' => $rackData['code_rack'],
                    'name_rack' => $rackData['name_rack'],
            ]);

            foreach ($rackData['subs'] as $subData) {
                SubModel::create([
                    'code_sub' => $subData['code_sub'],
                    'rack_id' => $rack->id,
                ]);
            }
        }
    }
}
