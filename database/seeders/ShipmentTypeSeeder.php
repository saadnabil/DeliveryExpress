<?php

namespace Database\Seeders;

use App\Models\ShipmentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShipmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = ['جديدة','تبادل متعدد','عربون'];
        foreach($values as $value){
            ShipmentType::create(['type' => $value]);
        }
    }
}
