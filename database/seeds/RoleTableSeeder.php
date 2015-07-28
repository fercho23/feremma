<?php

use FerEmma\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->truncate();

        $role = Role::create(array(//1
                    'description'   => '',
                    'name'          =>'Super Usuario',
                    'slug'          =>'super_user'
                    ));
        $role->permissions()->sync([1, 2, 3, 4, 5,
                                    6, 7, 8, 9, 10,
                                    11, 12, 13, 14, 15, 16,
                                    17, 18, 19, 20, 21,
                                    22, 23, 24, 25, 26,
                                    27, 28, 29, 30, 31, 32, 33, 34, 35, 36,
                                    37, 38, 39, 40, 41, 42, 43, 44, 45
                                    ]);

        $role = Role::create(array(//2
                    'description'   => '',
                    'name'          =>'Director',
                    'slug'          =>'director'
                    ));
        $role->permissions()->sync([1, 2, 3, 4, 5,
                                    6, 7, 8, 9, 10,
                                    11, 12, 13, 14, 15, 16,
                                    17, 18, 19, 20, 21,
                                    22, 23, 24, 25, 26,
                                    27, 28, 29, 30, 31, 32, 33, 34, 35, 36,
                                    37, 38, 39, 40, 41, 42, 43, 44, 45
                                    ]);


        $role = Role::create(array(//3
                    'description'   => '',
                    'name'          =>'Recepcion y Conserjeria',
                    'slug'          =>'reception_janitor'
                    ));
        $role->permissions()->sync([6, 7, 8, 10,
                                    12, 15,
                                    18, 21,
                                    23, 26,
                                    27, 28, 29, 31, 32, 33, 34, 35, 36,
                                    37, 38, 39, 40, 41, 42, 43, 44, 45
                                    ]);

        $role = Role::create(array(//4
                    'description'   => '',
                    'name'          =>'Pisos',
                    'slug'          =>'cleaning'
                    ));
        $role->permissions()->sync([12, 15,
                                    37, 38, 39, 40, 41, 42, 43, 44, 45
                                    ]);

        $role = Role::create(array(//5
                    'description'   => '',
                    'name'          =>'Mantenimiento, servicios técnicos y seguridad:',
                    'slug'          =>'maintenance'
                    ));
        $role->permissions()->sync([12, 15,
                                    37, 38, 39, 40, 41, 42, 43, 44, 45
                                    ]);

        $role = Role::create(array(//6
                    'description'   => '',
                    'name'          =>'Cliente',
                    'slug'          =>'client'
                    ));
        $role->permissions()->sync([12, 15,
                                    18, 21,
                                    27, 28, 33, 34, 35, 36
                                    ]);


    }

}
