<?php

namespace Database\Seeders;
use App\Models\Dusun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DusunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $dusuns = [
        [
            'id' => 1,
            'name' => 'Siji'
        ],
        [
            'id' => 2,
            'name' => 'Loro'
        ],
        [
            'id' => 3,
            'name' => 'Telu'
        ],
        [
            'id' => 4,
            'name' => 'Papat'
        ]
    ];
     public function run()
    {
        foreach($this->dusuns as $dusun){
            Dusun::create($dusun);
        }
    }
}
