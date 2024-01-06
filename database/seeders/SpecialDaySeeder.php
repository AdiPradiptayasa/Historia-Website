<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SpecialDay;

class SpecialDaySeeder extends Seeder
{
    public function run()
    {
        SpecialDay::create([
            'name' => 'Sumpah Pemuda',
            'date' => '2023-10-28',
        ]);
        // Tambahkan data lain jika diperlukan
    }
}
