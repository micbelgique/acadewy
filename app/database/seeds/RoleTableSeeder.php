<?php

class RoleTableSeeder extends Seeder {
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      Eloquent::unguard();

      DB::table('roles')->delete();

      
      Role::create(array(
         'name' => 'admin'
      ));

   }
}