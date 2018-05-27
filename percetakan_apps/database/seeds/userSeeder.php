<?php

use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
        	["name" => "admin",
        	"email" => "admin@illiyin.co",
        	"password" => bcrypt("123456"),
        	"type" => "admin"],
        	["name" => "cs1",
        	"email" => "cs@illiyin.co",
        	"password" => bcrypt("123456"),
        	"type" => "cs"],
        	["name" => "produksi1",
        	"email" => "produksi1@illiyin.co",
        	"password" => bcrypt("123456"),
        	"type" => "produksi"],
        	["name" => "produksi2",
        	"email" => "produksi2@illiyin.co",
        	"password" => bcrypt("123456"),
        	"type" => "produksi"],        	
        	["name" => "supervisor",
        	"email" => "supervisor@illiyin.co",
        	"password" => bcrypt("123456"),
        	"type" => "supervisor"],
        	["name" => "desainer1",
        	"email" => "desainer1@illiyin.co",
        	"password" => bcrypt("123456"),
        	"type" => "desainer"],

    ]);
    }
}
