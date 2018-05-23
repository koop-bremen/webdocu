<?php

use Illuminate\Database\Seeder;

use App\Place;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $places = array(
        	[
        	    "name" => "Hamburg",
			    "latitude" => "53.55",
			    "longitude" => "9.99"

			],
			[

			    "name" => "Shtip",
			    "latitude" => "41.75",
			    "longitude" => "22.2"

			],
			[

			    "name" => "Bremen",
			    "latitude" => "53.08",
			    "longitude" => "8.8"

			],
			[

			    "name" => "Winsen",
			    "latitude" => "53.36",
			    "longitude" => "10.21"

			],
			[

			    "name" => "Kosovo Polje",
			    "latitude" => "42.64",
			    "longitude" => "21.09"

			],
			[

			    "name" => "Belgrade",
			    "latitude" => "44.79",
			    "longitude" => "20.45"

			],
			[

			    "name" => "Bujanovac",
			    "latitude" => "42.46",
			    "longitude" => "21.77"

			],
			[

			    "name" => "Kijevo",
			    "latitude" => "44.1",
			    "longitude" => "21.08"

			],
			[

			    "name" => "Prizren",
			    "latitude" => "42.22",
			    "longitude" => "20.74"

			],
			[

			    "name" => "Niš",
			    "latitude" => "43.32",
			    "longitude" => "21.9"

			],
			[

			    "name" => "Pirot",
			    "latitude" => "43.16",
			    "longitude" => "22.59"

			],
			[

			    "name" => "Mâcon",
			    "latitude" => "46.31",
			    "longitude" => "4.83"

			],
			[

			    "name" => "Erfurt",
			    "latitude" => "50.98",
			    "longitude" => "11.03"

			],
			[

			    "name" => "Essen",
			    "latitude" => "51.46",
			    "longitude" => "7.01"

			],
			[

			    "name" => "Prishtina",
			    "latitude" => "42.66",
			    "longitude" => "21.17"

			],
			[

			    "name" => "Peja",
			    "latitude" => "42.66",
			    "longitude" => "20.29"

			],
			[

			    "name" => "Mitrovica",
			    "latitude" => "42.89",
			    "longitude" => "20.87"

			]
        );

        foreach($places as $place){

        	$p = new Place;
    		$p->name = $place['name'];
    		$p->latitude = $place['latitude'];
    		$p->longitude = $place['longitude'];
    		$p->save();

        }
    }
}
