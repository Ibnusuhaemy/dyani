<?php

use Illuminate\Database\Seeder;

class produkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("produk")->insert([
        	[
        		"nama" => "banner",
        		"harga_satuan" => 2000,
        		"deskripsi" => "deskripsi singkat banner",
        		"created_by" => "1",
        	],
        	[
        		"nama" => "nota",
        		"harga_satuan" => 2000,
        		"deskripsi" => "deskripsi singkat nota",
        		"created_by" => "1",
        	],
        	[
        		"nama" => "undangan",
        		"harga_satuan" => 2000,
        		"deskripsi" => "deskripsi singkat undangan",
        		"created_by" => "1",
        	],
        	[
        		"nama" => "sticker print",
        		"harga_satuan" => 2000,
        		"deskripsi" => "deskripsi singkat sticker print",
        		"created_by" => "1",
        	],
        	[
        		"nama" => "kartu nama",
        		"harga_satuan" => 2000,
        		"deskripsi" => "deskripsi singkat kartu nama",
        		"created_by" => "1",
        	],
        	[
        		"nama" => "brosur",
        		"harga_satuan" => 2000,
        		"deskripsi" => "deskripsi singkat brosur",
        		"created_by" => "1",
        	],
        	[
        		"nama" => "sticker sablon",
        		"harga_satuan" => 2000,
        		"deskripsi" => "deskripsi singkat sticker sablon",
        		"created_by" => "1",
        	],
        	[
        		"nama" => "buku yaasin",
        		"harga_satuan" => 2000,
        		"deskripsi" => "deskripsi singkat buku yaasin",
        		"created_by" => "1",
        	],
        	[
        		"nama" => "umbul-umbul kain",
        		"harga_satuan" => 2000,
        		"deskripsi" => "deskripsi singkat umbul-umbul kain",
        		"created_by" => "1",
        	],
        	[
        		"nama" => "id card",
        		"harga_satuan" => 2000,
        		"deskripsi" => "deskripsi singkat id card",
        		"created_by" => "1",
        	],
        	[
        		"nama" => "kalender",
        		"harga_satuan" => 2000,
        		"deskripsi" => "deskripsi singkat kalender",
        		"created_by" => "1",
        	],
        	[
        		"nama" => "nama dada",
        		"harga_satuan" => 2000,
        		"deskripsi" => "deskripsi singkat nama dada",
        		"created_by" => "1",
        	],
        	[
        		"nama" => "sablon plastik/tas/kaos",
        		"harga_satuan" => 2000,
        		"deskripsi" => "deskripsi singkat sablon plastik/tas/kaos",
        		"created_by" => "1",
        	],
        	[
        		"nama" => "stempel",
        		"harga_satuan" => 2000,
        		"deskripsi" => "deskripsi singkat stempel",
        		"created_by" => "1",
        	],
        	[
        		"nama" => "neon box (papan nama)",
        		"harga_satuan" => 2000,
        		"deskripsi" => "deskripsi singkat neon box (papan nama)",
        		"created_by" => "1",
        	],
        	
        ]);
    }
}
