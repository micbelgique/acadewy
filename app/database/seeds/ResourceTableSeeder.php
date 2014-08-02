<?php

class ResourceTableSeeder extends Seeder {
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      Eloquent::unguard();

      DB::table('resources')->delete();

      $user = User::where('username', 'admin')->FirstOrFail();

      Resource::create(array(
         'user_id' => $user->id,
         'description' => 'Blopblop blipblip bloupbloup',
         'link' => 'http://www.glouglou.be',
         'level' => 0,
      ));

      Resource::create(array(
         'user_id' => $user->id,
         'description' => 'Blopblop blablap bloupbloup',
         'link' => 'http://www.blapblap.be',
         'level' => 1,
      ));
   }
}