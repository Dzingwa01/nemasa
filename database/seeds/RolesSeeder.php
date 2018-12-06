<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $super_admin = [
            'super-delete' => true,
            'super-add' => true,
            'super-update' => true,
            'super-view' => true,
        ];

        $office_clerk = [
            'clerk-delete' => true,
            'clerk-add' => true,
            'clerk-update' => true,
            'clerk-view' => true,
        ];

        $super_user = Role::create([
            'name' => 'app-admin',
            'display_name'=>'App Admin',
            'permissions' =>$super_admin,
            'guard_name'=>'web'
        ]);

        $clerk_user = Role::create([
            'name' => 'clerk',
            'display_name'=>'Clerk',
            'permissions' =>$office_clerk,
            'guard_name'=>'web'
        ]);
    }
}
