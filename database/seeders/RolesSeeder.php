<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::upsert([
            [
                'name' => 'superAdmin',
                'label' => 'Super Admin',
                'description' => 'Super Admin can manage anything',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'admin',
                'label' => 'Admin',
                'description' => 'Owner and could manage all data related to the inventory',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'basicUser',
                'label' => 'Basic User',
                'description' => 'User level authorization can basic tasks',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'customer',
                'label' => 'Customer',
                'description' => 'User who registered just for purchasing the services',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ], ['name'], ['label','description','updated_at']);
    }
}
