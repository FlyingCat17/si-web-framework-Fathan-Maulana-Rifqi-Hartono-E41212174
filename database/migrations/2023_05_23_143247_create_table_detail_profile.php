<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /**
         * Migrations
         * Fitur yang digunakan untuk mengelola struktur database secara terstruktur dan mudah diatur. Dalam konteks Laravel, migration adalah cara untuk membuat, mengubah, dan menghapus tabel serta kolom dalam database Anda dengan menggunakan kode PHP daripada mengubah struktur database secara manual.
         * 
         * contoh dibawah ini akan membuat satu table yaitu table detail_profile yang berisikan column-clumn sebagai berikut
         */
        
        Schema::create('detail_profile', function (Blueprint $table) { // <== pendefinisian nama table
            // Dibawah ini akan diisikan oleh beberapa nama kolom table beserta ketentuan nya
            $table->id();
            $table->string('address');
            $table->string('phone');
            $table->date('birth');
            $table->string('photo');
            $table->timestamps();

            // kemudian jalankan php artisan migrate untuk mengeksekusi migration ini
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_detail_profile');
    }
};
