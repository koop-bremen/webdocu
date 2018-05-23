<?php

use Illuminate\Database\Seeder;

use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$words = array('Hatecrime',	'Polizei',	'Gesundheit', 'Bildung', 'Abschiebung',	'Wohnen',	'Essen', 'Fluchtwege', 'Arbeit', 'Verfolgung (NS)', 'Registierung',	'Kfor/ Krieg', 'Doppelbestrafung', 'Freiwillige Ausreise / Ura2', 'Politische Kämpfe', 'Offizielle Politik', 'Jura', 'Geschlechterverhältnis');

    	foreach( $words as $word ){

    		$tag = new Tag;
    		$tag->name = $word;
    		$tag->slug = str_slug($word);
    		$tag->save();
    		
    	}

    }
}
