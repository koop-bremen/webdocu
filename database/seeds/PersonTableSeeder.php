<?php

use Illuminate\Database\Seeder;

use App\Person;

class PersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $persons = array('Amanda Musa', 'Jasmina Jakupovic', 'Robert Pelifanovic', 'Recherchegruppe', 'Sadbera A.',	'Familie M.', 'Radmila Anic', 'Daniela', 'Isabel', 'Martin', 'Karim', 'Dusan Jovanovic', 'Selamet', 'Hikmet', 'Kefaet', 'Burim', 'Lulzim Shaka', 'Shkurta', 'Sefkinas', 'Sebilje', 'Leonarda', 'Hisni Musa', 'Milaim', 'Osman Osmani', 'Iniciativa6', 'Aishe Shala', 'Bajramsha', 'Ragib', 'Sadije', 'Ibrahim', 'Junge in Prizren', 'Eli Gashi', 'Daniol', 'Islam', 'Adam', 'Sevignaz B.', 'Jan Sürig', 'Kushtrin Abdinetaj', 'Familie Shala', 'Alban M.', 'Rom aus Freiburg', 'Rom aus Norddeutschland', 'Voislav Stojanovski', 'Zwei Schwestern in Norddeutschland', 'Latifa Sikovska', 'Isen Asanovski', 'Cengiz', 'Gamze', 'Romano Jekipe', 'Dzafer*', 'Helena*', 'Rudko Kawczynski', 'Viola', );

    	foreach( $persons as $person ){

    		$p = new Person;
    		$p->name = $person;
    		$p->save();
    		
    	}
    }
}
