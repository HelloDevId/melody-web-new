<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Antrian;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Product;
use App\Models\Kategori;
use App\Models\Konsultasi;
use App\Models\Post;
use App\Models\Kulit;
use App\Models\Keluhan;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Role::create([
            'name' => 'admin',
        ]);

        Role::create([
            'name' => 'user',
        ]);

        Kulit::create([
            'name' => 'Kering',
        ]);

        Kulit::create([
            'name' => 'Berminyak',
        ]);

        Kulit::create([
            'name' => 'Normal',
        ]);

        Kulit::create([
            'name' => 'Kombinasi',
        ]);

        Keluhan::create([
            'name' => 'Jerawat',
        ]);

        Keluhan::create([
            'name' => 'Kulit Kusam',
        ]);

        Keluhan::create([
            'name' => 'Kulit Kering',
        ]);

        Keluhan::create([
            'name' => 'Kulit Berminyak',
        ]);

        Keluhan::create([
            'name' => 'Kulit Sensitif',
        ]);

        Keluhan::create([
            'name' => 'Kulit Normal',
        ]);

        Keluhan::create([
            'name' => 'Kulit Kombinasi',
        ]);

        Keluhan::create([
            'name' => 'Kulit Berjerawat',
        ]);

        Keluhan::create([
            'name' => 'Kulit Berkomedo',
        ]);

        Keluhan::create([
            'name' => 'Kulit Berflek',
        ]);

        Keluhan::create([
            'name' => 'Kulit Berkerut',
        ]);

        Keluhan::create([
            'name' => 'Kulit Berbintik',
        ]);

        Keluhan::create([
            'name' => 'Kulit Berbekas',
        ]);


        User::create([
            'name' => 'user',
            'image' => 'user2.jpeg',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),
            'jenis_kelamin' => 'L',
            'id_kulit' => 1,
            'tanggal_lahir' => '2000-01-01',
            'no_hp' => '081234567890',
            'alamat' => 'Jl. Raya',
            'id_role' => 2,
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'id_kulit' => null,
            'id_role' => 1,
        ]);

        Kategori::create([
            'name' => 'Skincare',
        ]);

        Kategori::create([
            'name' => 'Haircare',
        ]);

        Kategori::create([
            'name' => 'Bodycare',
        ]);

        Product::create([
            'name' => 'Product 1',
            'image' => 'product1.jpg',
            'price' => 100000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'jumlah_terjual' => 100,
            'id_kategori' => 1,
        ]);

        Product::create([
            'name' => 'Product 2',
            'image' => 'product2.jpg',
            'price' => 200000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'jumlah_terjual' => 200,
            'id_kategori' => 2,

        ]);

        Product::create([
            'name' => 'Product 3',
            'image' => 'product3.jpg',
            'price' => 300000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'jumlah_terjual' => 300,
            'id_kategori' => 3,

        ]);

        Product::create([
            'name' => 'Product 4',
            'image' => 'product4.jpg',
            'price' => 400000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'jumlah_terjual' => 400,
            'id_kategori' => 1,

        ]);

        Product::create([
            'name' => 'Product 5',
            'image' => 'product5.jpg',
            'price' => 500000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'jumlah_terjual' => 500,
            'id_kategori' => 2,

        ]);

        Product::create([
            'name' => 'Product 6',
            'image' => 'product6.jpg',
            'price' => 600000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'jumlah_terjual' => 600,
            'id_kategori' => 3,

        ]);

        Product::create([
            'name' => 'Product 7',
            'image' => 'product7.jpg',
            'price' => 700000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'jumlah_terjual' => 700,
            'id_kategori' => 1,

        ]);

        Product::create([
            'name' => 'Product 8',
            'image' => 'product8.jpg',
            'price' => 800000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'jumlah_terjual' => 800,
            'id_kategori' => 2,

        ]);

        Product::create([
            'name' => 'Product 9',
            'image' => 'product9.jpg',
            'price' => 900000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'jumlah_terjual' => 900,
            'id_kategori' => 3,

        ]);

        Product::create([
            'name' => 'Product 10',
            'image' => 'product10.jpg',
            'price' => 1000000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'jumlah_terjual' => 1000,
            'id_kategori' => 1,

        ]);

        Product::create([
            'name' => 'Product 11',
            'image' => 'product11.jpg',
            'price' => 1100000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'jumlah_terjual' => 1100,
            'id_kategori' => 2,

        ]);

        Product::create([
            'name' => 'Product 12',
            'image' => 'product12.jpg',
            'price' => 1200000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'jumlah_terjual' => 1200,
            'id_kategori' => 3,

        ]);

        Product::create([
            'name' => 'Product 13',
            'image' => 'product13.jpg',
            'price' => 1300000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'jumlah_terjual' => 1300,
            'id_kategori' => 1,

        ]);

        Product::create([
            'name' => 'Product 14',
            'image' => 'product14.jpg',
            'price' => 1400000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'jumlah_terjual' => 1400,
            'id_kategori' => 2,

        ]);

        Product::create([
            'name' => 'Product 15',
            'image' => 'product15.jpg',
            'price' => 1500000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'jumlah_terjual' => 1500,
            'id_kategori' => 3,
        ]);

        Product::create([
            'name' => 'Product 16',
            'image' => 'product16.jpg',
            'price' => 1600000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'jumlah_terjual' => 1600,
            'id_kategori' => 1,

        ]);

        Product::create([
            'name' => 'Product 17',
            'image' => 'product17.jpg',
            'price' => 1700000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'jumlah_terjual' => 1700,
            'id_kategori' => 2,

        ]);

        Product::create([
            'name' => 'Product 18',
            'image' => 'product18.jpg',
            'price' => 1800000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'jumlah_terjual' => 1800,
            'id_kategori' => 3,

        ]);

        Product::create([
            'name' => 'Product 19',
            'image' => 'product19.jpg',
            'price' => 1900000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'jumlah_terjual' => 1900,
            'id_kategori' => 1,

        ]);

        Product::create([
            'name' => 'Product 20',
            'image' => 'product20.jpg',
            'price' => 2000000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'jumlah_terjual' => 2000,
            'id_kategori' => 2,

        ]);

        Post::create([
            'title' => '8 Inspiring Ways to Wear Dresses in the Winter',
            'slug' => 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget dictum tortor. Donec dictum vitae sapien eu varius',
            'image' => 'blog1.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sit amet est vel orci luctus sollicitudin. Duis eleifend vestibulum justo, varius semper lacus condimentum dictum. Donec pulvinar a magna ut malesuada. In posuere felis diam, vel sodales metus accumsan in. Duis viverra dui eu pharetra pellentesque. Donec a eros leo. Quisque sed ligula vitae lorem efficitur faucibus. Praesent sit amet imperdiet ante. Nulla id tellus auctor, dictum libero a, malesuada nisi. Nulla in porta nibh, id vestibulum ipsum. Praesent dapibus tempus erat quis aliquet. Donec ac purus id sapien condimentum feugiat.',
            'id_user' => 1,
        ]);

        Post::create([
            'title' => 'The Great Big List of Men’s Gifts for the Holidays',
            'slug' => 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget dictum tortor. Donec dictum vitae sapien eu varius',
            'image' => 'blog2.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sit amet est vel orci luctus sollicitudin. Duis eleifend vestibulum justo, varius semper lacus condimentum dictum. Donec pulvinar a magna ut malesuada. In posuere felis diam, vel sodales metus accumsan in. Duis viverra dui eu pharetra pellentesque. Donec a eros leo. Quisque sed ligula vitae lorem efficitur faucibus. Praesent sit amet imperdiet ante. Nulla id tellus auctor, dictum libero a, malesuada nisi. Nulla in porta nibh, id vestibulum ipsum. Praesent dapibus tempus erat quis aliquet. Donec ac purus id sapien condimentum feugiat.',
            'id_user' => 1,
        ]);

        Post::create([
            'title' => '5 Winter-to-Spring Fashion Trends to Try Now',
            'slug' => 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget dictum tortor. Donec dictum vitae sapien eu varius',
            'image' => 'blog3.jpg',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sit amet est vel orci luctus sollicitudin. Duis eleifend vestibulum justo, varius semper lacus condimentum dictum. Donec pulvinar a magna ut malesuada. In posuere felis diam, vel sodales metus accumsan in. Duis viverra dui eu pharetra pellentesque. Donec a eros leo. Quisque sed ligula vitae lorem efficitur faucibus. Praesent sit amet imperdiet ante. Nulla id tellus auctor, dictum libero a, malesuada nisi. Nulla in porta nibh, id vestibulum ipsum. Praesent dapibus tempus erat quis aliquet. Donec ac purus id sapien condimentum feugiat.',
            'id_user' => 1,
        ]);

        Antrian::create([
            'id_user' => 1,
            'no_antrian' => 1,
            'tanggal' => date('Y-m-d'),
            'status' => 'Selesai',
            'id_keluhan' => 1,
            'detail_keluhan' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum keluhan.',
        ]);

        Konsultasi::create([
            'id_antrian' => 1,
            'hasil_konsultasi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum konsultasi.',
        ]);
    }
}