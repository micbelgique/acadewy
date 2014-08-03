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

        


        Categorie::create(array(
                'name' => 'Programmation',
                'description' => 'Catégorie Programmation'
                ));

        Categorie::create(array(
                'name' => 'Cuisine',
                'description' => 'Catégorie Programmation'
                ));

        Categorie::create(array(
                'name' => 'Nature',
                'description' => 'Catégorie Programmation'
                ));


        $categorieProgrammation = Categorie::where('name', 'Programmation')->FirstOrFail();
        $categorieCuisine = Categorie::where('name', 'Cuisine')->FirstOrFail();
        $categorieNature = Categorie::where('name', 'Nature')->FirstOrFail();

        Categorie::create(array(
        	'name' => 'Php',
                'parent_id' => $categorieProgrammation->id,
        	'description' => 'Catégorie Php'
        	));

        $categoriePhp = Categorie::where('name', 'Php')->FirstOrFail();

        Categorie::create(array(
        	'name' => 'Laravel',
        	'parent_id' => $categoriePhp->id,
        	'description' => 'Catégorie Laravel'
        	));

        Categorie::create(array(
                'name' => 'Java',
                'parent_id' => $categoriePhp->id,
                'description' => 'Catégorie Java'
                ));

        $categorieLaravel = Categorie::where('name', 'Laravel')->FirstOrFail();

        Categorie::create(array(
                'name' => 'Cookies',
                'parent_id' => $categorieLaravel->id,
                'description' => 'Nom nom nom'
                ));

        Categorie::create(array(
        	'name' => 'Omelette',
                'parent_id' => $categorieCuisine->id,
        	'description' => 'Catégorie Omelette'
        	));

        Categorie::create(array(
                'name' => 'Soin',
                'parent_id' => $categorieNature->id,
                'description' => 'Catégorie Bain de boue'
                ));
        }
}
