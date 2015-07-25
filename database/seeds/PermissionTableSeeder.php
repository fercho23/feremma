<?php

use FerEmma\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PermissionTableSeeder extends Seeder {

    public function run()
    {
        DB::table('permissions')->truncate();

        Permission::create(array(//1
            'permission_title'         =>'Crear Usuario',
            'permission_slug'          =>'users/create',
            'permission_description'   =>'Crea un usuario.'
            ));
        Permission::create(array(//2
            'permission_title'         =>'Detalle Usuario',
            'permission_slug'          =>'users/show',
            'permission_description'   =>'Detalle de usuario.'
            ));
        Permission::create(array(//3
            'permission_title'         =>'Editar Usuario',
            'permission_slug'          =>'users/edit',
            'permission_description'   =>'Edita un usuario.'
            ));
        Permission::create(array(//4
            'permission_title'         =>'Eliminar Usuario',
            'permission_slug'          =>'users/destroy',
            'permission_description'   =>'Elimina un usuario.'
            ));
        Permission::create(array(//5
            'permission_title'         =>'Listar Usuarios',
            'permission_slug'          =>'users/index',
            'permission_description'   =>'Lista de usuarios.'
            ));


        Permission::create(array(//6
            'permission_title'         =>'Crear Cliente',
            'permission_slug'          =>'clients/create',
            'permission_description'   =>'Crea un cliente.'
            ));
        Permission::create(array(//7
            'permission_title'         =>'Detalle Cliente',
            'permission_slug'          =>'clients/show',
            'permission_description'   =>'Detalle de cliente.'
            ));
        Permission::create(array(//8
            'permission_title'         =>'Ver Editar Cliente',
            'permission_slug'          =>'clients/edit',
            'permission_description'   =>'Edita un cliente.'
            ));
        Permission::create(array(//9
            'permission_title'         =>'Eliminar Cliente',
            'permission_slug'          =>'clients/destroy',
            'permission_description'   =>'Elimina un cliente.'
            ));
        Permission::create(array(//10
            'permission_title'         =>'Listar Clientes',
            'permission_slug'          =>'clients/index',
            'permission_description'   =>'Lista de clientes.'
            ));


        Permission::create(array(//11
            'permission_title'         =>'Crear Habitación',
            'permission_slug'          =>'rooms/create',
            'permission_description'   =>'Crea una habitación.'
            ));
        Permission::create(array(//12
            'permission_title'         =>'Detalle Habitación',
            'permission_slug'          =>'rooms/show',
            'permission_description'   =>'Detalle de habitación.'
            ));
        Permission::create(array(//13
            'permission_title'         =>'Editar Habitación',
            'permission_slug'          =>'rooms/edit',
            'permission_description'   =>'Edita una habitación.'
            ));
        Permission::create(array(//14
            'permission_title'         =>'Eliminar Habitación',
            'permission_slug'          =>'rooms/destroy',
            'permission_description'   =>'Elimina una habitación.'
            ));
        Permission::create(array(//15
            'permission_title'         =>'Listar Habitaciones',
            'permission_slug'          =>'rooms/index',
            'permission_description'   =>'Lista de habitaciones.'
            ));
        Permission::create(array(//16
            'permission_title'         =>'Habilitar / Deshabilitar Habitación',
            'permission_slug'          =>'rooms/toogle',
            'permission_description'   =>'Habilita o Deshabilita habitaciones.'
            ));


        Permission::create(array(//17
            'permission_title'         =>'Crear Servicio',
            'permission_slug'          =>'services/create',
            'permission_description'   =>'Crea un servicio.'
            ));
        Permission::create(array(//18
            'permission_title'         =>'Detalle Servicio',
            'permission_slug'          =>'services/show',
            'permission_description'   =>'Detalle de servicio.'
            ));
        Permission::create(array(//19
            'permission_title'         =>'Editar Servicio',
            'permission_slug'          =>'services/edit',
            'permission_description'   =>'Edita un servicio.'
            ));
        Permission::create(array(//20
            'permission_title'         =>'Eliminar Servicio',
            'permission_slug'          =>'services/destroy',
            'permission_description'   =>'Elimina un servicio.'
            ));
        Permission::create(array(//21
            'permission_title'         =>'Listar Servicios',
            'permission_slug'          =>'services/index',
            'permission_description'   =>'Lista de servicios.'
            ));


        Permission::create(array(//22
            'permission_title'         =>'Crear Cargo',
            'permission_slug'          =>'roles/create',
            'permission_description'   =>'Crea un cargo.'
            ));
        Permission::create(array(//23
            'permission_title'         =>'Detalle Cargo',
            'permission_slug'          =>'roles/show',
            'permission_description'   =>'Detalle de cargo.'
            ));
        Permission::create(array(//24
            'permission_title'         =>'Editar Cargo',
            'permission_slug'          =>'roles/edit',
            'permission_description'   =>'Edita un cargo.'
            ));
        Permission::create(array(//25
            'permission_title'         =>'Eliminar Cargo',
            'permission_slug'          =>'roles/destroy',
            'permission_description'   =>'Elimina un cargo.'
            ));
        Permission::create(array(//26
            'permission_title'         =>'Listar Cargos',
            'permission_slug'          =>'roles/index',
            'permission_description'   =>'Lista de cargos.'
            ));


        Permission::create(array(//27
            'permission_title'         =>'Crear Reserva',
            'permission_slug'          =>'reservations/create',
            'permission_description'   =>'Crea un cargo.'
            ));
        Permission::create(array(//28
            'permission_title'         =>'Detalle Reserva',
            'permission_slug'          =>'roles/show',
            'permission_description'   =>'Detalle de reserva.'
            ));
        Permission::create(array(//29
            'permission_title'         =>'Editar Reserva',
            'permission_slug'          =>'reservations/edit',
            'permission_description'   =>'Edita una reserva.'
            ));
        Permission::create(array(//30
            'permission_title'         =>'Eliminar Reserva',
            'permission_slug'          =>'reservations/destroy',
            'permission_description'   =>'Elimina uns reserva.'
            ));
        Permission::create(array(//31
            'permission_title'         =>'Listar Reservas',
            'permission_slug'          =>'reservations/index',
            'permission_description'   =>'Lista de reservas.'
            ));
        Permission::create(array(//32
            'permission_title'         =>'Estado Reserva',
            'permission_slug'          =>'reservations/toogle',
            'permission_description'   =>'Modifica estado reserva.'
            ));
        Permission::create(array(//33
            'permission_title'         =>'Asignar Titular a Reserva',
            'permission_slug'          =>'reservations/owner',
            'permission_description'   =>'Asigna titular a reserva.'
            ));
        Permission::create(array(//34
            'permission_title'         =>'Asignar Pasajero a Reserva',
            'permission_slug'          =>'reservations/client',
            'permission_description'   =>'Asigna cliente a reserva.'
            ));
        Permission::create(array(//35
            'permission_title'         =>'Asignar Habitación a Reserva',
            'permission_slug'          =>'reservations/room',
            'permission_description'   =>'Asigna habitación a reserva.'
            ));
        Permission::create(array(//36
            'permission_title'         =>'Asignar Servicio a Reserva',
            'permission_slug'          =>'reservations/service',
            'permission_description'   =>'Asigna servicio a reserva.'
            ));

        Permission::create(array(//37
            'permission_title'         =>'Crear Tarea',
            'permission_slug'          =>'tasks/create',
            'permission_description'   =>'Crea una tarea.'
            ));
        Permission::create(array(//38
            'permission_title'         =>'Detalle Tarea',
            'permission_slug'          =>'tasks/show',
            'permission_description'   =>'Detalle de tarea.'
            ));
        Permission::create(array(//39
            'permission_title'         =>'Editar Tarea',
            'permission_slug'          =>'tasks/edit',
            'permission_description'   =>'Edita una tarea.'
            ));
        Permission::create(array(//40
            'permission_title'         =>'Eliminar Tarea',
            'permission_slug'          =>'tasks/destroy',
            'permission_description'   =>'Elimina una tarea.'
            ));
        Permission::create(array(//41
            'permission_title'         =>'Listar Tareas',
            'permission_slug'          =>'tasks/index',
            'permission_description'   =>'Lista de tareas.'
            ));
        Permission::create(array(//42
            'permission_title'         =>'Tomar Tarea',
            'permission_slug'          =>'tasks/take',
            'permission_description'   =>'Toma una tareas.'
            ));
        Permission::create(array(//43
            'permission_title'         =>'Mostrar Mis Tareas',
            'permission_slug'          =>'tasks/mine',
            'permission_description'   =>'Muestra mis tareas.'
            ));
        Permission::create(array(//44
            'permission_title'         =>'Crear Mis Tareas',
            'permission_slug'          =>'tasks/create_mine',
            'permission_description'   =>'Crear mis tareas.'
            ));
    }

}