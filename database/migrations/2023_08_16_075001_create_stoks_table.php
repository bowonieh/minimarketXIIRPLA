<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stok', function (Blueprint $table) {
            $table->integer('id_stok',true)
                    ->nullable(false);

            $table->integer('id_barang',false)
                    ->nullable(false)
                    ->index('idBarangStok');

            $table->integer('id_cabang',false)
                    ->index('idCabangStok')
                    ->nullable(false);
            $table->float('harga',10,2)
                    ->nullable(false);
            
            $table->integer('stok',false)
                    ->nullable(false)->default(0);
            $table->timestamps();
            //Foreign Key
            $table->foreign('id_barang')->on('barang')
                    ->references('id_barang')->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('id_cabang')->on('cabang')
                    ->references('id_cabang')->onDelete('cascade')
                    ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok');
    }
};
