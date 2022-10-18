<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;
class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barang::create([
            'name'     => 'Apple',
            'quantity'    => 15 ,
            'added_by'    => 'dummy',
        ]);
    }
}
