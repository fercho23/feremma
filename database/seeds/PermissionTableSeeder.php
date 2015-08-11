<?php

use FerEmma\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder {

    public function run() {
        DB::table('permissions')->truncate();

        Permission::create(array(//1
            'title'         =>'Crear Usuario',
            'slug'          =>'users/create',
            'description'   =>'Crea un usuario.'
        ));
        Permission::create(array(//2
            'title'         =>'Detalle Usuario',
            'slug'          =>'users/show',
            'description'   =>'Detalle de usuario.'
        ));
        Permission::create(array(//3
            'title'         =>'Editar Usuario',
            'slug'          =>'users/edit',
            'description'   =>'Edita un usuario.'
        ));
        Permission::create(array(//4
            'title'         =>'Eliminar Usuario',
            'slug'          =>'users/destroy',
            'description'   =>'Elimina un usuario.'
        ));
        Permission::create(array(//5
            'title'         =>'Listar Usuarios',
            'slug'          =>'users/index',
            'description'   =>'Lista de usuarios.'
        ));


        Permission::create(array(//6
            'title'         =>'Crear Cliente',
            'slug'          =>'clients/create',
            'description'   =>'Crea un cliente.'
        ));
        Permission::create(array(//7
            'title'         =>'Detalle Cliente',
            'slug'          =>'clients/show',
            'description'   =>'Detalle de cliente.'
        ));
        Permission::create(array(//8
            'title'         =>'Ver Editar Cliente',
            'slug'          =>'clients/edit',
            'description'   =>'Edita un cliente.'
        ));
        Permission::create(array(//9
            'title'         =>'Eliminar Cliente',
            'slug'          =>'clients/destroy',
            'description'   =>'Elimina un cliente.'
        ));
        Permission::create(array(//10
            'title'         =>'Listar Clientes',
            'slug'          =>'clients/index',
            'description'   =>'Lista de clientes.'
        ));


        Permission::create(array(//11
            'title'         =>'Crear Habitación',
            'slug'          =>'rooms/create',
            'description'   =>'Crea una habitación.'
        ));
        Permission::create(array(//12
            'title'         =>'Detalle Habitación',
            'slug'          =>'rooms/show',
            'description'   =>'Detalle de habitación.'
        ));
        Permission::create(array(//13
            'title'         =>'Editar Habitación',
            'slug'          =>'rooms/edit',
            'description'   =>'Edita una habitación.'
        ));
        Permission::create(array(//14
            'title'         =>'Eliminar Habitación',
            'slug'          =>'rooms/destroy',
            'description'   =>'Elimina una habitación.'
        ));
        Permission::create(array(//15
            'title'         =>'Listar Habitaciones',
            'slug'          =>'rooms/index',
            'description'   =>'Lista de habitaciones.'
        ));
        Permission::create(array(//16
            'title'         =>'Habilitar / Deshabilitar Habitación',
            'slug'          =>'rooms/toogle',
            'description'   =>'Habilita o Deshabilita habitaciones.'
        ));


        Permission::create(array(//17
            'title'         =>'Crear Servicio',
            'slug'          =>'services/create',
            'description'   =>'Crea un servicio.'
        ));
        Permission::create(array(//18
            'title'         =>'Detalle Servicio',
            'slug'          =>'services/show',
            'description'   =>'Detalle de servicio.'
        ));
        Permission::create(array(//19
            'title'         =>'Editar Servicio',
            'slug'          =>'services/edit',
            'description'   =>'Edita un servicio.'
        ));
        Permission::create(array(//20
            'title'         =>'Eliminar Servicio',
            'slug'          =>'services/destroy',
            'description'   =>'Elimina un servicio.'
        ));
        Permission::create(array(//21
            'title'         =>'Listar Servicios',
            'slug'          =>'services/index',
            'description'   =>'Lista de servicios.'
        ));


        Permission::create(array(//22
            'title'         =>'Crear Cargo',
            'slug'          =>'roles/create',
            'description'   =>'Crea un cargo.'
        ));
        Permission::create(array(//23
            'title'         =>'Detalle Cargo',
            'slug'          =>'roles/show',
            'description'   =>'Detalle de cargo.'
        ));
        Permission::create(array(//24
            'title'         =>'Editar Cargo',
            'slug'          =>'roles/edit',
            'description'   =>'Edita un cargo.'
        ));
        Permission::create(array(//25
            'title'         =>'Eliminar Cargo',
            'slug'          =>'roles/destroy',
            'description'   =>'Elimina un cargo.'
        ));
        Permission::create(array(//26
            'title'         =>'Listar Cargos',
            'slug'          =>'roles/index',
            'description'   =>'Lista de cargos.'
        ));


        Permission::create(array(//27
            'title'         =>'Crear Reserva',
            'slug'          =>'reservations/create',
            'description'   =>'Crea un cargo.'
        ));
        Permission::create(array(//28
            'title'         =>'Detalle Reserva',
            'slug'          =>'reservations/show',
            'description'   =>'Detalle de reserva.'
        ));
        Permission::create(array(//29
            'title'         =>'Editar Reserva',
            'slug'          =>'reservations/edit',
            'description'   =>'Edita una reserva.'
        ));
        Permission::create(array(//30
            'title'         =>'Eliminar Reserva',
            'slug'          =>'reservations/destroy',
            'description'   =>'Elimina uns reserva.'
        ));
        Permission::create(array(//31
            'title'         =>'Listar Reservas',
            'slug'          =>'reservations/index',
            'description'   =>'Lista de reservas.'
        ));
        Permission::create(array(//32
            'title'         =>'Estado Reserva',
            'slug'          =>'reservations/toogle',
            'description'   =>'Modifica estado reserva.'
        ));
        Permission::create(array(//33
            'title'         =>'Asignar Titular a Reserva',
            'slug'          =>'reservations/owner',
            'description'   =>'Asigna titular a reserva.'
        ));
        Permission::create(array(//34
            'title'         =>'Asignar Pasajero a Reserva',
            'slug'          =>'reservations/client',
            'description'   =>'Asigna cliente a reserva.'
        ));
        Permission::create(array(//35
            'title'         =>'Asignar Habitación a Reserva',
            'slug'          =>'reservations/room',
            'description'   =>'Asigna habitación a reserva.'
        ));
        Permission::create(array(//36
            'title'         =>'Asignar Servicio a Reserva',
            'slug'          =>'reservations/service',
            'description'   =>'Asigna servicio a reserva.'
        ));


        Permission::create(array(//37
            'title'         =>'Crear Tarea',
            'slug'          =>'tasks/create',
            'description'   =>'Crea una tarea.'
        ));
        Permission::create(array(//38
            'title'         =>'Detalle Tarea',
            'slug'          =>'tasks/show',
            'description'   =>'Detalle de tarea.'
        ));
        Permission::create(array(//39
            'title'         =>'Editar Tarea',
            'slug'          =>'tasks/edit',
            'description'   =>'Edita una tarea.'
        ));
        Permission::create(array(//40
            'title'         =>'Eliminar Tarea',
            'slug'          =>'tasks/destroy',
            'description'   =>'Elimina una tarea.'
        ));
        Permission::create(array(//41
            'title'         =>'Listar Tareas',
            'slug'          =>'tasks/index',
            'description'   =>'Lista de tareas.'
        ));
        Permission::create(array(//42
            'title'         =>'Tomar Tarea',
            'slug'          =>'tasks/take',
            'description'   =>'Toma una tareas.'
        ));
        Permission::create(array(//43
            'title'         =>'Mostrar Mis Tareas',
            'slug'          =>'tasks/mine',
            'description'   =>'Muestra mis tareas.'
        ));
        Permission::create(array(//44
            'title'         =>'Crear Mis Tareas',
            'slug'          =>'tasks/createMine',
            'description'   =>'Crear mis tareas.'
        ));


        Permission::create(array(//45
            'title'         =>'Ver Permisos',
            'slug'          =>'permissions/index',
            'description'   =>'Ver Permisos de todos los roles'
        ));


        Permission::create(array(//46
            'title'         =>'Crear Cama',
            'slug'          =>'beds/create',
            'description'   =>'Crea una cama.'
        ));
        Permission::create(array(//47
            'title'         =>'Detalle Cama',
            'slug'          =>'beds/show',
            'description'   =>'Detalle de cama.'
        ));
        Permission::create(array(//48
            'title'         =>'Editar Cama',
            'slug'          =>'beds/edit',
            'description'   =>'Edita una cama.'
        ));
        Permission::create(array(//49
            'title'         =>'Eliminar Cama',
            'slug'          =>'beds/destroy',
            'description'   =>'Elimina una cama.'
        ));
        Permission::create(array(//50
            'title'         =>'Listar Camas',
            'slug'          =>'beds/index',
            'description'   =>'Lista de Camas.'
        ));
        Permission::create(array(//51
            'title'         =>'Editar Camas Sin Cantidad de Personas',
            'slug'          =>'beds/updateBasic',
            'description'   =>'Editar una cam sin cantidad de personas.'
        ));


        Permission::create(array(//52
            'title'         =>'Crear Distribución',
            'slug'          =>'distributions/create',
            'description'   =>'Crea una distribución.'
        ));
        Permission::create(array(//53
            'title'         =>'Detalle Distribución',
            'slug'          =>'distributions/show',
            'description'   =>'Detalle de distribución.'
        ));
        Permission::create(array(//54
            'title'         =>'Editar Distribución',
            'slug'          =>'distributions/edit',
            'description'   =>'Edita una distribución.'
        ));
        Permission::create(array(//55
            'title'         =>'Eliminar Distribución',
            'slug'          =>'distributions/destroy',
            'description'   =>'Elimina una distribución.'
        ));
        Permission::create(array(//56
            'title'         =>'Listar Distribuciones',
            'slug'          =>'distributions/index',
            'description'   =>'Lista de distribuciones.'
        ));
        Permission::create(array(//57
            'title'         =>'Editar Distribuciones Sin Camas',
            'slug'          =>'distributions/updateBasic',
            'description'   =>'Editar una distribución sin sus camas.'
        ));


        Permission::create(array(//58
            'title'         =>'Ver Perfil',
            'slug'          =>'users/profile',
            'description'   =>'Datos de mi perfil.'
        ));

        Permission::create(array(//59
            'title'         =>'Habilita/Desabilita Habitacion',
            'slug'          =>'rooms/toggle',
            'description'   =>'Habilita/Desabilita Habitacion.'
        ));

    }
}