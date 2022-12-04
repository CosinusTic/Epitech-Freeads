<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 
class AdsSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++)
        {
            DB::table('ads')->insert([
                'title' => Str::random(12),
                'description' => Str::random(25),
                'category' => Str::random(1), 
                'image_URL' => 'https://' . Str::random(30) . '.com',
                'price' => Str::random(4), 
                'location' => Str::random(20)
            ]); 
        }
        
    }
}