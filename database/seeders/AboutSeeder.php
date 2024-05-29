<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('abouts')->insert([
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Porro aspernatur iusto labore est necessitatibus quibusdam tempore vitae, ratione illum nobis, culpa laudantium reiciendis iure animi ducimus exercitationem! Distinctio, quidem sunt!',
            'image_path' => 'images/user.png',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
