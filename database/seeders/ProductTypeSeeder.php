<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productTypes = [
            [
                'name'          => 'Anggota',
                'description'   => 'Simpanan Anggota',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'name'          => 'Pembiayaan',
                'description'   => 'Pembiayaan Anggota',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'name'          => 'Tabungan',
                'description'   => 'Tabungan Anggota',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
        ];

        ProductType::insert($productTypes);
    }
}
