<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeedre extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Dr. Mawar',
            'username' => 'mawar',
            'password' => bcrypt('mawar'),
        ]);
    }
}
