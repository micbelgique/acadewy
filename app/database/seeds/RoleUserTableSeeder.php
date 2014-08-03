<?php

class RoleUserTableSeeder extends Seeder {
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      Eloquent::unguard();

      DB::table('role_user')->delete();

      $user = User::where('username', 'didier.toussaint')->FirstOrFail();
      $role = Role::where('name', 'admin')->first();

      $user->assignRole($role);
   }
}