<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
       $user = User::where('email','MWong@shang.hai.com')->first();

       if(!$user)
       {
           User::create([
               'name'=>"Maser Wong",
               'email'=>"MWong@shang.hai.com",
               'role'=>'admin',
               'password' =>  Hash::make('password'),

           ]);
       }
    }
}
