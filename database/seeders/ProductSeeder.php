<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seed = Factory::create('id_ID');

        $categories = ['Pakaian','Gadget','Digital'];
        $titles = [
            'Pakaian'   => [
                'material'  => ['Kaos', 'Kemeja', 'Celana', 'Jas'],
                'jenis'     => ['Besar', 'Kecil', 'Anak', 'Laki-laki', 'Perempuan'],
                'warna'     => ['putih', 'merah', 'hijau', 'biru', 'pink', 'kuning', 'hitam']
            ],
            'Gadget'    => [
                'material'  => ['HP', 'Tablet', 'Laptop', 'PC', 'Mini PC'],
                'jenis'     => ['Samsung', 'Asus', 'Xiaomi', 'Acer', 'Lenovo'],
                'warna'     => ['hitam', 'silver', 'putih', 'gold']
            ],
            'Digital'   => [
                'material'  => ['Pulsa', 'Kuota', 'Perdana'],
                'jenis'     => ['Telkomsel', 'Tri', 'XL', 'Indosat Ooredoo', 'Smartfren'],
                'warna'     => ['100', '50', '20', '10', '5']
            ]
        ];

        for ($i=0; $i<100; $i++) { 
            $category = $seed->randomElement($categories);
            $titleStr = $seed->randomElement($titles[$category]['material']);
            $titleStr .= ' ' . $seed->randomElement($titles[$category]['jenis']);
            $titleStr .= ' ' . $seed->randomElement($titles[$category]['warna']);
            
            $data[] = [
                'category'      => $category,
                'title'         => $titleStr,
                'price'         => $seed->numberBetween(1,100) * 1000,
                'description'  => $seed->text(),
                'stock'         => $seed->numberBetween(1,200),
                'free_shipping' => $seed->numberBetween(0,1),
                'rate'          => $seed->randomFloat(2,1,5),
            ];
        }

        DB::table('products')->insert($data);
    }
}
