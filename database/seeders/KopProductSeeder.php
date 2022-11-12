<?php

namespace Database\Seeders;

use App\Models\KopProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KopProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kopProducts = [
            [
                'name'              => 'Simpanan Sukarela',
                'image'             => 'kxBIBxg49qLwiSTRjHYvRQl7n0AEzQGZ43zbOgTm.png',
                'product_type_id'   => 1,
                'description'       => '',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'name'              => 'Simpanan Berjangka 12 bln',
                'image'             => 'kxBIBxg49qLwiSTRjHYvRQl7n0AEzQGZ43zbOgTm.png',
                'product_type_id'   => 3,
                'description'       => '',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'name'              => 'Simpanan Pelajar',
                'image'             => 'kxBIBxg49qLwiSTRjHYvRQl7n0AEzQGZ43zbOgTm.png',
                'product_type_id'   => 3,
                'description'       => '',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'name'              => 'Sisuka Jaka Qurban',
                'image'             => 'kxBIBxg49qLwiSTRjHYvRQl7n0AEzQGZ43zbOgTm.png',
                'product_type_id'   => 3,
                'description'       => '',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'name'              => 'Tabungan Maslahah',
                'image'             => 'kxBIBxg49qLwiSTRjHYvRQl7n0AEzQGZ43zbOgTm.png',
                'product_type_id'   => 3,
                'description'       => '',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'name'              => 'Simpanan Wajib Anggota',
                'image'             => 'kxBIBxg49qLwiSTRjHYvRQl7n0AEzQGZ43zbOgTm.png',
                'product_type_id'   => 1,
                'description'       => '',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'name'              => 'Simpanan Pokok',
                'image'             => 'kxBIBxg49qLwiSTRjHYvRQl7n0AEzQGZ43zbOgTm.png',
                'product_type_id'   => 1,
                'description'       => '',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'name'              => 'Murabahah (Pembelian Barang Dagangan/Kendaraan/lain-lain)',
                'image'             => 'kxBIBxg49qLwiSTRjHYvRQl7n0AEzQGZ43zbOgTm.png',
                'product_type_id'   => 2,
                'description'       => '',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'name'              => 'Hawalah (Pengalihan Hutang)',
                'image'             => 'kxBIBxg49qLwiSTRjHYvRQl7n0AEzQGZ43zbOgTm.png',
                'product_type_id'   => 2,
                'description'       => '',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'name'              => 'Ijarah (Biaya pendidikan/Rumah Sakit/Sewa Toko)',
                'image'             => 'kxBIBxg49qLwiSTRjHYvRQl7n0AEzQGZ43zbOgTm.png',
                'product_type_id'   => 2,
                'description'       => '',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'name'              => 'Mudharabah (Modal Kerja)',
                'image'             => 'kxBIBxg49qLwiSTRjHYvRQl7n0AEzQGZ43zbOgTm.png',
                'product_type_id'   => 2,
                'description'       => '',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'name'              => 'Qardul Hasan (Dana Kebajikan)',
                'image'             => 'kxBIBxg49qLwiSTRjHYvRQl7n0AEzQGZ43zbOgTm.png',
                'product_type_id'   => 2,
                'description'       => '',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'name'              => 'Idul Fitri',
                'image'             => 'kxBIBxg49qLwiSTRjHYvRQl7n0AEzQGZ43zbOgTm.png',
                'product_type_id'   => 2,
                'description'       => '',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
        ];

        KopProduct::insert($kopProducts);
    }
}
