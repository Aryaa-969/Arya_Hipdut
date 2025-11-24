<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('multipleuploads', function (Blueprint $table) {
            $table->id();
            $table->string('file_path'); // lokasi file
            $table->string('file_name')->nullable();
            $table->string('ref_table', 100);     // nama tabel pemilik
            $table->unsignedBigInteger('ref_id'); // id data pemilik
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('multipleuploads');
    }
};
