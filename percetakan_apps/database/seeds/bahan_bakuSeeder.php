<?php

use Illuminate\Database\Seeder;

class bahan_bakuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bahan_baku')->insert([
        	[
        		"nama" => "bahan baku 1",
        		"qty" => 5,
        		"harga_beli_satuan" => 5000,
        		"harga_jual_satuan" => 5100,
        		"satuan" => "kg",
        	],
        	[
        		"nama" => "HVS",
        		"qty" => 5,
        		"harga_beli_satuan" => 5000,
        		"harga_jual_satuan" => 5100,
        		"satuan" => "lembar",
        	],
        	[
        		"nama" => "Karton",
        		"qty" => 5,
        		"harga_beli_satuan" => 5000,
        		"harga_jual_satuan" => 5100,
        		"satuan" => "lembar",
        	],
        	[
        		"nama" => "Plastik",
        		"qty" => 10,
        		"harga_beli_satuan" => 5000,
        		"harga_jual_satuan" => 5100,
        		"satuan" => "lembar",
        	],
        	[
        		"nama" => "bahan baku 2",
        		"qty" => 5,
        		"harga_beli_satuan" => 5000,
        		"harga_jual_satuan" => 5100,
        		"satuan" => "kg",
        	],
        	[
        		"nama" => "bahan baku 3",
        		"qty" => 5,
        		"harga_beli_satuan" => 5000,
        		"harga_jual_satuan" => 5100,
        		"satuan" => "kg",
        	]

        ]);
    }
}
