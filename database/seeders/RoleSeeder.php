<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*======================================
                        ROLES
        ========================================*/

        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Seller']);

        /*======================================
                        PERMISSIONS
        ========================================*/

        //Dashoard
        Permission::create(['name' => 'admin.index',
                            'description' => 'View Dashboard'])->assignRole($role1,$role2);

        //User
        Permission::create(['name' => 'users.view',
                            'description' => 'View User'])->assignRole($role1);
        Permission::create(['name' => 'users.add',
                            'description' => 'Create User'])->assignRole($role1);
        Permission::create(['name' => 'users.edit',
                            'description' => 'Edit User'])->assignRole($role1);
        Permission::create(['name' => 'users.delete',
                            'description' => 'Delete User'])->assignRole($role1);

        //Settings
        Permission::create(['name' => 'company.view',
                            'description' => 'View Company'])->assignRole($role1);
        Permission::create(['name' => 'location.view',
                            'description' => 'View Location'])->assignRole($role1);
        Permission::create(['name' => 'theme.view',
                            'description' => 'View Theme'])->assignRole($role1);
        Permission::create(['name' => 'invoice.view',
                            'description' => 'View Invoice'])->assignRole($role1);
        Permission::create(['name' => 'roles.view',
                            'description' => 'View Roles'])->assignRole($role1);
        Permission::create(['name' => 'roles.delete',
                            'description' => 'Delete Roles'])->assignRole($role1);

        //Supplier
        Permission::create(['name' => 'supplier.view',
                            'description' => 'View Supplier'])->assignRole($role1);
        Permission::create(['name' => 'suppliers.add',
                            'description' => 'Create Supplier'])->assignRole($role1);
        Permission::create(['name' => 'suppliers.edit',
                            'description' => 'Edit Supplier'])->assignRole($role1);
        Permission::create(['name' => 'suppliers.delete',
                            'description' => 'Delete Supplier'])->assignRole($role1);
        Permission::create(['name' => 'suppliers.profile',
                            'description' => 'Profile Supplier'])->assignRole($role1);

        //Client
        Permission::create(['name' => 'client.view',
                            'description' => 'View Client'])->assignRole($role1, $role2);
        Permission::create(['name' => 'clients.add',
                            'description' => 'Create Client'])->assignRole($role1, $role2);
        Permission::create(['name' => 'clients.edit',
                            'description' => 'Edit Client'])->assignRole($role1, $role2);
        Permission::create(['name' => 'clients.delete',
                            'description' => 'Delete Client'])->assignRole($role1, $role2);

        //Categories
        Permission::create(['name' => 'categories.view',
                            'description' => 'View Categories'])->assignRole($role1);
        Permission::create(['name' => 'categories.add',
                            'description' => 'Create Category'])->assignRole($role1);
        Permission::create(['name' => 'categories.edit',
                            'description' => 'Edit Category'])->assignRole($role1);
        Permission::create(['name' => 'categories.delete',
                            'description' => 'Delete Category'])->assignRole($role1);

        //Brands
        Permission::create(['name' => 'brands.view',
                            'description' => 'View Brands'])->assignRole($role1);
        Permission::create(['name' => 'brands.add',
                            'description' => 'Create Brand'])->assignRole($role1);
        Permission::create(['name' => 'brands.edit',
                            'description' => 'Edit Brand'])->assignRole($role1);
        Permission::create(['name' => 'brands.delete',
                            'description' => 'Delete Brand'])->assignRole($role1);

        //Units
        Permission::create(['name' => 'units.view',
                            'description' => 'View Units'])->assignRole($role1);
        Permission::create(['name' => 'units.add',
                            'description' => 'Create Unit'])->assignRole($role1);
        Permission::create(['name' => 'units.edit',
                            'description' => 'Edit Unit'])->assignRole($role1);
        Permission::create(['name' => 'units.delete',
                            'description' => 'Delete Unit'])->assignRole($role1);

        //Products
        Permission::create(['name' => 'product.view',
                            'description' => 'View Products'])->assignRole($role1);
        Permission::create(['name' => 'product.add',
                            'description' => 'Create Product'])->assignRole($role1);
        Permission::create(['name' => 'product.edit',
                            'description' => 'Edit Products'])->assignRole($role1);
        Permission::create(['name' => 'product.delete',
                            'description' => 'Delete Products'])->assignRole($role1);
        Permission::create(['name' => 'product.details',
                            'description' => 'Details Products'])->assignRole($role1);
        Permission::create(['name' => 'product.pdf',
                            'description' => 'Download PDF Products'])->assignRole($role1);

        //Purchases
        Permission::create(['name' => 'purchases.view',
                            'description' => 'View Purchases'])->assignRole($role1);
        Permission::create(['name' => 'purchases.add',
                            'description' => 'Create Purchase'])->assignRole($role1);
        Permission::create(['name' => 'purchases.change_status',
                            'description' => 'Change Status Purchase'])->assignRole($role1);
        Permission::create(['name' => 'purchases.details',
                            'description' => 'Details Purchase'])->assignRole($role1);
        Permission::create(['name' => 'purchases.pdf',
                            'description' => 'Download PDF Purchase'])->assignRole($role1);

    }
}
