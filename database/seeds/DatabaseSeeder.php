<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Model::unguard();
        $this->call('PermissionTableSeeder');
        $this->call('RoleTableSeeder');
        $this->call('TaskTableSeeder');
        $this->call('UserTableSeeder');
        $this->call('RoomTableSeeder');
        $this->call('ServiceTableSeeder');
        $this->call('ReservationTableSeeder');
        $this->call('BedTableSeeder');
    }

}
