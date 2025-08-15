<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KategoriProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    $kategori = \App\Models\Kategori::create(['nama' => 'Elektronik', 'slug' => 'elektronik']);
    \App\Models\Produk::create([
        'nama'       => 'Smartphone X',
        'slug'       => 'smartphone-x',
        'id_kategori'=> $kategori->id,
        'harga'      => 2500000,
        'stok'       => 10,
        'deskripsi'  => 'Hp Android terbaru',
        'gambar'     => 'smartphone.jpg',
    ]);
}
}
