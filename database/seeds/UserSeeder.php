<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'nombre' => 'root',
          'email' => 'root@root.com',
          'username' => 'root',
          'password' => Hash::make('root'),
          'created_at' => now(),
          'updated_at' => now(),
        ]);

        User::create([
          'nombre' => 'Haro Orozco',
          'email' => 'haro.yo51@hotmail.com',
          'username' => 'HaroOrozco',
          'password' => Hash::make('secret'),
        ]);

        User::create([
          'nombre' => 'Adan Piceno',
          'email' => 'adan@hotmail.com',
          'username' => 'Metalgdl15',
          'password' => Hash::make('secret'),
        ]);

        User::create([
          'nombre' => 'Guadalupe Ayala',
          'email' => 'lupita@hotmail.com',
          'username' => 'iamlupita',
          'password' => Hash::make('secret'),
        ]);
    }
}
