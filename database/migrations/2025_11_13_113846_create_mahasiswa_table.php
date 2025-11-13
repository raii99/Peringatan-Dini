<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Gunakan if not exists untuk menghindari error
        if (!Schema::hasTable('mahasiswas')) {
            Schema::create('mahasiswas', function (Blueprint $table) {
                $table->string('nim')->primary();
                $table->string('name');
                $table->string('email')->unique();
                $table->string('prodi'); // perbaiki dari 'prodl' menjadi 'prodi'
                $table->year('angkat');
                $table->decimal('ipk', 3, 2);
                $table->string('status');
                $table->text('alamat');
                $table->string('no_telepon');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
};