<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected $trgName = 'trgCabangStok';
    public function up(): void
    {
        //DROP Trigger First
        DB::unprepared('DROP TRIGGER IF EXISTS '.$this->trgName);
        DB::unprepared(
            'CREATE TRIGGER '.$this->trgName.' AFTER INSERT ON cabang
            FOR EACH ROW
            BEGIN
                INSERT INTO stok (id_barang,id_cabang,harga,stok)
                SELECT id_barang, new.id_cabang, 0,0 FROM barang;
            END'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        DB::unprepared('DROP TRIGGER IF EXISTS '.$this->trgName);
    }
};
