<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Admin Ninno';
        $user->email = 'ninno@hayago.id';
        $user->password = Hash::make('Devlaper2020_');
        $user->role = 'admin';
        $user->save();

        $user = new User();
        $user->name = 'Ninno';
        $user->email = 'khusnul@gmail.id';
        $user->password = Hash::make('Devlaper2020_');
        $user->role = 'user';
        $user->save();
    }
}
