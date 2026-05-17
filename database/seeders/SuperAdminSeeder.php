<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class SuperAdminSeeder extends Seeder{

public function run():void {

DB::statement("

INSERT INTO users
(name , email , password , created_at, updated_at)

VALUES (

'Super Admin raju',
'superadminraju@gmail.com',
'".Hash::make('Raju.45@')."',
Now(),
Now()

)

");

$user = \App\Models\User::where('email', 'superadminraju@gmail.com')->first();

$user->assignRole('SuperAdmin');

}
}


?>