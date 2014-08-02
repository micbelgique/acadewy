<?php

class CategoriesSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('categories')->delete();

                

        $communitieProgrammation = Communitie::where('name', 'Programmation')->FirstOrFail();
        $communitieCuisine = Communitie::where('name', 'Cuisine')->FirstOrFail();
        $communitieNature = Communitie::where('name', 'Nature')->FirstOrFail();

        Categorie::create(array(
        	'name' => 'Php',
                'parent_id' => '',
                'communitie_id' => $communitieProgrammation->id,
        	'description' => 'Catégorie Php'
        	));

        $categoriePhp = Categorie::where('name', 'Php')->FirstOrFail();

        Categorie::create(array(
        	'name' => 'Laravel',
        	'parent_id' => $categoriePhp->id,
                'communitie_id' => $communitieProgrammation->id,
        	'description' => 'Catégorie Laravel'
        	));

        Categorie::create(array(
                'name' => 'Java',
                'parent_id' => $categoriePhp->id,
                'communitie_id' => $communitieProgrammation->id,
                'description' => 'Catégorie Java'
                ));

        Categorie::create(array(
        	'name' => 'Omelette',
                'parent_id' => $categoriePhp->id,
                'communitie_id' => $communitieCuisine->id,
        	'description' => 'Catégorie Omelette'
        	));

        Categorie::create(array(
                'name' => 'Tarte tatin',
                'parent_id' => $categoriePhp->id,
                'communitie_id' => $communitieNature->id,
                'description' => 'Catégorie Bain de boue'
                ));
        }
}
