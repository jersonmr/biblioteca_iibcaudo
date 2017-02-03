<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'dni' => '17538221',
            'treatment' => 'Licdo.',
            'name' => 'Jerson',
            'last_name' => 'Moreno',
            'email' => 'jmoreno@udo.edu.ve',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);
        //factory(User::class, 49)->create();
    }
}
