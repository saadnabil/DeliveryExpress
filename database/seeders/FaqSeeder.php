<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for( $i = 0 ; $i < 10 ; $i++ ){
            Faq::create([
                'question' => fake()->sentence(),
                'answer'  =>  fake()->sentence(),
                'application' => 'deliveryApplication',
            ]);
        }

        for( $i = 0 ; $i < 10 ; $i++ ){
            Faq::create([
                'question' => fake()->sentence(),
                'answer'  =>  fake()->sentence(),
                'application' => 'storeApplication',
            ]);
        }

    }
}
