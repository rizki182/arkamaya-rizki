<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_m_client')->insert([
            [
                "client_name" => "NEC",
                "client_address" => "Jakarta",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ], 
            [
                "client_name" => "TAM",
                "client_address" => "Jakarta",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ], 
            [
                "client_name" => "TUA",
                "client_address" => "Bandung",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]
        ]);
    }
}
