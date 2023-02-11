<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_m_project', function (Blueprint $table) {
            $table->id("project_id");
            $table->string("project_name", 100);
            $table->unsignedBigInteger("client_id");
            $table->date("project_start");
            $table->date("project_end");
            $table->char("project_status", 15);
            $table->timestamps();
            $table->foreign("client_id")->references("client_id")->on("tb_m_client");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_m_project');
    }
};
