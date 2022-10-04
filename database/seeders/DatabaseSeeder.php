<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $faker=Faker::create();

        foreach(range(1,100) as $key=>$value){
            DB::table('blogs')->insert([
                'name'=>$faker->text,
                'email'=>$faker->email,
                'salary'=>rand(30000,50000)
            ]);
        }
    }
}
