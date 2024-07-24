<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles =[
            [
                'name' =>'SuperAdmin',
                'status' =>'1',
            ],
            [
                'name' =>'Icmr',
                'status' =>'1',
            ],
            [
                'name' =>'ImporterExporter',
                'status' =>'1',
            ],
            [
                'name' =>'ApprovalsCommitteeOfficer',
                'status' =>'1',
            ]
            ];

            foreach ($roles as $key => $role) {
                Role::create($role);
            }
    }
}
