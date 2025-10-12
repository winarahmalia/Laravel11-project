<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('karyawan_id');
            $table->string('bulan',10);
            $table->decimal('gaji_pokok',10,2);
            $table->decimal('tunjangan',10,2)->default(0);
            $table->decimal('potongan',10,2)->default(0);
            $table->decimal('total_gaji', 10, 2);
            $table->timestamps();

            $table->foreign('karyawan_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        //
    }
};
