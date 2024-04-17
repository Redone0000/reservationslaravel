<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\User;

class RoleUserSeeder extends Seeder
{
/**     
 *Run the database seeds.
 */
  public function run(): void{
    //Empty the table first
    DB::statement('SET FOREIGN_KEY_CHECKS=0');
    DB::table('role_user')->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS=1');


        //Data

        $userRoles = [
            [
                'user_login' => 'bob',
                'user_role' => 'admin',
            ],
            [
                'user_login' => 'anna',
                'user_role' => 'member',
            ],
        ];

        foreach($userRoles as &$userRole) {
            $user = User::where('login', $userRole['user_login'])->first();

            $role = Role::where('role', $userRole['user_role'])->first();

            unset($userRole['user_login']);
            unset($userRole['user_role']);
            $userRole['user_id'] = $user->id;
            $userRole['role_id'] = $role->id;

        }

        unset($userRole);

        DB::table('role_user')->insert($userRoles);
    }
}