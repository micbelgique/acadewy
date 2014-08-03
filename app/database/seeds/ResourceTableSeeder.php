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

      $cat_Laravel = Categorie::where('name', 'Laravel')->FirstOrFail();
      $cat_Php = Categorie::where('name', 'Php')->FirstOrFail();
      $cat_Omelette = Categorie::where('name', 'Omelette')->FirstOrFail();

      Resource::create(array(
         'user_id' => $user1->id,
         'title' => 'PHP Documentation',
         'description' => 'A great go-to resource for PHP',
         'link' => 'http://php.net/docs.php',
         'level' => 2,
         'categorie_id' => $cat_Php->id
      ));

      Resource::create(array(
         'user_id' => $user2->id,
         'title' => 'Laravel Quickstart',
         'description' => 'With this short guide, you "should" get your Laravel application up and running in only a few minutes',
         'link' => 'http://laravel.com/docs/quick',
         'level' => 1,
         'categorie_id' => $cat_Laravel->id
      ));

      Resource::create(array(
         'user_id' => $user1->id,
         'title' => 'Laracasts - Laravel video tutorials',
         'description' => 'For the developers who prefer watching step-by-step videos rather than reading long, confusing tutorials.',
         'link' => 'https://laracasts.com',
         'level' => 1,
         'categorie_id' => $cat_Laravel->id
      ));

      Resource::create(array(
         'user_id' => $user2->id,
         'title' => 'How to crack an egg - video',
         'description' => 'Cracking eggs is the first step for many recipes. Yet, some people have trouble cracking eggs. This video will help you improve your egg-cracking skills',
         'link' => 'http://www.youtube.com/watch?v=Is5qnn2mjuM',
         'level' => 1,
         'categorie_id' => $cat_Omelette->id
      ));
   }
}