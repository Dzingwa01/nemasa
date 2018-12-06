<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $password = \Illuminate\Support\Facades\Hash::make('secret');
        $verification_time = \Carbon\Carbon::now();
        $super = User::create(['name'=>'Super','surname'=>'User','email'=>'admin@dialect.co.za'
            ,'contact_number'=>'076677777','email_verified_at'=>$verification_time,'password'=>$password]);

        $super_role = Role::where('name','app-admin')->first();
        $super->roles()->attach($super_role->id);

        $clerk = User::create(['name'=>'Clerk','surname'=>'User','email'=>'clerk@dialect.co.za'
            ,'contact_number'=>'076677777','email_verified_at'=>$verification_time,'password'=>$password]);

        $clerk_role = Role::where('name','clerk')->first();
        $clerk->roles()->attach($clerk_role->id);
    }
}
