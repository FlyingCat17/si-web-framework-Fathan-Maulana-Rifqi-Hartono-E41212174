<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seeder
        // Seeder adalah fitur dari laravel yang memungkinkan kita membuat data dummy pada database dengan menggunakan seeder. Sehingga kita tidak perlu memasukkan data dummy secara manual satu persatu.

        // Contoh dibawah ini adalah Seeder untuk tabel detail_profile
        DB::table('detail_profile')->insert([
            'address' => 'Jl. Raya Cipadung No. 9',
            'phone' => '081234567890',
            'birth' => '2000-01-01',
            'photo' => 'https://i.pinimg.com/originals/0f/6a/9a/0f6a9a1b6b0b0b0b0b0b0b0b0b0b0b0b.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Jalankan php artisan db:seed --class=DetailProfileSeeder untuk mengeksekusi seeder ini
    }
}
