<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name','superAdmin')->first();
        User::upsert([
             [
                 'name'                => 'Pratik Limbu',
                 'email'                     => 'pratiklimbu@gmail.com',
                 'email_verified_at'         => now(),
                 'password'                  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                 'role_id'                   => $role->id,
                 'remember_token'            => Str::random(10),
             ],
            [
                'name'                => 'Saroj',
                'email'                     => 'thesarojstha@gmail.com',
                'email_verified_at'         => now(),
                'password'                  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role_id'                   => $role->id,
                'remember_token'            => Str::random(10),
            ],
            [
                'name'                => 'Pratik Normal',
                'email'                     => 'pratiklimbu1@gmail.com',
                'email_verified_at'         => now(),
                'password'                  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role_id'                   => 3,
                'remember_token'            => Str::random(10),
            ],
        ],['email'],[]);
        UserFactory::new()->count(47)->make();

    }
}
