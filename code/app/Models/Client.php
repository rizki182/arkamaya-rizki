<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // meta
    // ----------------------------------------------------
    protected $table = "tb_m_client";
    protected $primaryKey = "client_id";

    // CRUD functions
    // ----------------------------------------------------
    // get client for combo box
    public static function combobox(){
        // get all client
        $clients = Client::get();

        return $clients;
    }

}
