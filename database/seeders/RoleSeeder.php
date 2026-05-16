<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder{

public function run(): void {

 $roles = [
         
            'SuperAdmin',
            'Admin',
            'Member',
            'sales',
            'Manager',
 ];


foreach ($roles as $role) {
    
Role::firstOrCreate([
    'name' => $role
]);

}
 
}

}


?>