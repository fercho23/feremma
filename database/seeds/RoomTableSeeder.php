<?php

use FerEmma\Room;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RoomTableSeeder extends Seeder {

	public function run()
	{
		DB::table('rooms')->delete();

		Room::create(
			array(
				'description'    => 'Suite Presidencial, con sauna, jacuzzi, frigobar, smart tv 3d, aire acondicionado y un negro que te abanica.',
				'name'     => 'Suite Eva Peron',
				'types_beds'  => 'King Size',
				'total_beds'     => '2',
				'location'      => 'Primer Piso Hab. 10',
				'plan'  => 'No Disponible',
				'available'  => '1',
			)
		);

		Room::create(
			array(
				'description'    => 'El espacio para el huésped es reducido hasta un bloque modular de plástico o de fibra de vidrio de apenas 2 metros de longitud, 1 metro de alto y 1,25 metros de ancho, siendo este suficiente espacio como para dormir. Las instalaciones incluyen una televisión, una consola y conexión inalámbrica a internet. El equipaje se almacena en unas taquillas, que se encuentran fuera del hotel. La privacidad se ve asegurada mediante el uso de una cortina o una puerta de fibra de vidrio en el extremo abierto de la cápsula. Los cuartos de baño son comunes.',
				'name'     => 'Cápsula',
				'types_beds'  => 'Small single',
				'total_beds'     => '1',
				'location'      => 'Primer Subsuelo Hab. 4',
				'plan'  => 'No Disponible',
				'available'  => '1',
			)
		);
	}

}
