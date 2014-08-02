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

      $user1 = User::where('username', 'didier.toussaint')->FirstOrFail();
      $user2 = User::where('username', 'marc.ducobu')->FirstOrFail();

      Resource::create(array(
         'user_id' => $user1->id,
         'description' => 'Blopblop blipblip bloupbloup',
         'link' => 'http://www.glouglou.be',
         'level' => 0,
         'title' => 'Title 2'
      ));

      Resource::create(array(
         'user_id' => $user2->id,
         'description' => 'Blopblop blablap bloupbloup',
         'link' => 'http://www.blapblap.be',
         'level' => 1,
         'title' => 'Title 1'
      ));
   }
}