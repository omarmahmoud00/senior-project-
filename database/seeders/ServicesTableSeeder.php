<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = ['Transportation', 'Hospitality', 'Entertainment', 'Events', 'Attractions', 'Services'];

        foreach ($services as $service) {
            DB::table('services')->insert([
                'name' => $service
            ]);
        }
    }
}
