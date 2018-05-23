<?php

use Illuminate\Database\Seeder;

use App\Author;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = array('Allegra Schneider', 'Jean-Philipp Baeck',	'Kathrin Herold', 'Sascha Brandenburg', 'Kenan Emini',	'Jan Sürig', 'Femi Abazi', 'Andrea Vogel', 'Torsten Schlusche', 'Ein Rom aus Norddeutchland', 'Karin Waringo',	'Marc Millies', 'Dörte Boxberg', 'Selamet Prizreni', 'Gundula Oerter', 'Pseudonym (Malte, Ali, Jean)', 'Malte Stieber', 'Esat Behrami', 'Roma Antidiscrimination Network', 'Roma Center Göttingen', 'Radmila Anic', 'Domitille Boulon', 'Barbara Dubick', 'Catherine van Cutsem', 'Myriam Thomas', 'Ivana Domazet', 'Martina Mauer', 'diverse', 'unbekannt');

    	foreach( $authors as $author ){

    		$a = new Author;
    		$a->name = $author;
    		$a->save();
    		
    	}

    }
}
