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
        Schema::create('buku', function (Blueprint $table) {
            $table->string('isbn')->primary();
            $table->string('judul');
            $table->string('kategori');
            $table->string('tingkatan');
            $table->string('author');
            $table->text('deskripsi');
            $table->text('gambar');
            $table->text('file');
            $table->unsignedBigInteger('pustakawan_id');
//            $table->string('pustakawan');
            $table->timestamps();

            // foreign key
            $table->foreign('pustakawan_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
    }
};
