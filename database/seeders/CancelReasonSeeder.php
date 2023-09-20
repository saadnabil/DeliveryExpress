<?php

namespace Database\Seeders;

use App\Models\CancelReason;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CancelReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 10 ; $i ++){
            CancelReason::create([
                'reason' => fake()->sentence()
            ]);
        }
    }
}
