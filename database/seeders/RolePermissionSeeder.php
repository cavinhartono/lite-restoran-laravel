<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        try {
            $superuser1 = User::create([
                'name' => 'Superuser Cakep',
                'email' => 'superuser@gmail.com',
                'password' => Hash::make('superuser28'),
            ]);

            $admin1 = User::create([
                'name' => 'Admin Ganteng',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin1428'),
            ]);

            $customer1 = User::create([
                'name' => 'Alif Cepmek',
                'email' => 'alif@gmail.com',
                'password' => Hash::make('nanyaalif'),
            ]);

            $customer2 = User::create([
                'name' => 'Cavin Hartono Putra',
                'email' => 'cavin@gmail.com',
                'password' => Hash::make('cavin123'),
            ]);

            $customer3 = User::create([
                'name' => 'John Doe',
                'email' => 'johndoe@gmail.com',
                'password' => Hash::make('johndoe1933'),
            ]);
            Permission::create(['name' => 'view-user']);
            Permission::create(['name' => 'create-user']);
            Permission::create(['name' => 'edit-user']);
            Permission::create(['name' => 'delete-user']);
            Permission::create(['name' => 'view-role']);
            Permission::create(['name' => 'edit-role']);
            Permission::create(['name' => 'view-food']);
            Permission::create(['name' => 'create-food']);
            Permission::create(['name' => 'edit-food']);
            Permission::create(['name' => 'delete-food']);
            Permission::create(['name' => 'publish-food']);
            Permission::create(['name' => 'unpublish-food']);

            $superuser = Role::create(['name' => 'superuser']);
            $admin = Role::create(['name' => 'admin']);
            $customer = Role::create(['name' => 'customer']);

            $superuser->givePermissionTo([
                'view-user',
                'create-user',
                'edit-user',
                'delete-user',
                'view-role',
                'edit-role',
                'view-food',
                'create-food',
                'edit-food',
                'delete-food',
                'publish-food',
                'unpublish-food',
            ]);

            $admin->givePermissionTo([
                'view-user',
                'edit-user',
                'view-food',
                'create-food',
                'edit-food',
                'delete-food',
            ]);

            $customer->givePermissionTo('view-food');

            $superuser1->assignRole('superuser');
            $admin1->assignRole('admin');
            $customer1->assignRole('customer');
            $customer2->assignRole('customer');
            $customer3->assignRole('customer');
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }
}
