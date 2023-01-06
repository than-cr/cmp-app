<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Jonathan',
            'lastName' => 'Castro',
            'motherLastName' => 'Ramirez',
            'phoneNumber' => '89945051',
            'email' => 'than.cr@outlook.com',
            'birthDate' => '1996-07-26',
            'district_id' => '257',
            'password' => Hash::make('Jc4str0_')
        ]);

        $role = Role::create(['name' => 'Super Admin']);
        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
