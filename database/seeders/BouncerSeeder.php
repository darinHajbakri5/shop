<?php

namespace Database\Seeders;

use Bouncer;
use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bouncer::role()->firstOrCreate([
            'name' => 'seller',
            'title' => 'Seller',
        ]);

        Bouncer::role()->firstOrCreate([
            'name' => 'customer',
            'title' => 'Customer',
        ]);

        Bouncer::role()->firstOrCreate([
            'name' => 'admin',
            'title' => 'Admin',
        ]);


        Bouncer::ability()->firstOrCreate([
            'name' => 'CREATE_STORE',
            'title' => 'Create Store',
        ]);

        Bouncer::ability()->firstOrcreate([
            'name'=> 'EDIT_STORE',
            'title'=> 'edit store',
        ]);
        Bouncer::ability()->firstOrcreate([
            'name'=> 'DELETE_STORE',
            'title'=> 'delete store',
        ]);
        Bouncer::ability()->firstOrcreate([
            'name'=> 'MANAGE_STORE',
            'title'=> 'manage store',
        ]);
        Bouncer::ability()->firstOrcreate([
            'name'=> 'CUSTOMER_LIST',
            'title'=> 'customer list',
        ]);
        Bouncer::ability()->firstOrcreate([
            'name'=> 'CUSTOMER_EDIT',
            'title'=> 'customer edit',
        ]);
        Bouncer::ability()->firstOrcreate([
            'name'=> 'CUSTOMER_DELETE',
            'title'=> 'customer delete',
        ]);
        Bouncer::ability()->firstOrcreate([
            'name'=> 'CREATE_CUSTOMER',
            'title'=> 'create customer',
        ]);

        //customer create,edit,update,delete,show
        Bouncer::ability()->firstOrcreate([
            'name'=> 'SELLER_LIST',
            'title'=> 'seller list',
        ]);
        Bouncer::ability()->firstOrcreate([
            'name'=> 'CREATE_SELLER',
            'title'=> 'create seller',
        ]);


        Bouncer::ability()->firstOrcreate([
            'name'=> 'EDIT_SELLER',
            'title'=> 'edit seller',
        ]);

        Bouncer::ability()->firstOrcreate([
            'name'=> 'DELETE_STORE',
            'title'=> 'delete store',
        ]);


        Bouncer::ability()->firstOrcreate([
            'name'=> 'CUSTOMER_LIST',
            'title'=> 'customer list',
        ]);

        Bouncer::ability()->firstOrcreate([
            'name'=> 'CUSTOMER_EDIT',
            'title'=> 'customer edit',
        ]);
        Bouncer::ability()->firstOrcreate([
            'name'=> 'CUSTOMER_DELETE',
            'title'=> 'customer delete',
        ]);
        //products
        Bouncer::ability()->firstOrcreate([
            'name'=> 'CREATE_PRODUCT',
            'title'=> 'create product',
        ]);
        Bouncer::ability()->firstOrcreate([
            'name'=> 'UPDATE_PRODUCT',
            'title'=> 'update product',
        ]);
        Bouncer::ability()->firstOrcreate([
            'name'=> 'DELETE_PRODUCT',
            'title'=> 'delete product',
        ]);
        Bouncer::ability()->firstOrcreate([
            'name'=> 'DELETE_PRODUCT',
            'title'=> 'delete product',
        ]);





    //seller
    Bouncer::allow('seller')->to('CREATE_STORE');
    Bouncer::allow('seller')->to('EDIT_STORE');
    Bouncer::allow('seller')->to('DELETE_STORE');
    Bouncer::allow('seller')->to('MANAGE_STORE');
    //customer list premission
    Bouncer::allow('seller')->to('CUSTOMER_LIST');
    Bouncer::allow('seller')->to('CUSTOMER_EDIT');
    Bouncer::allow('seller')->to('CUSTOMER_DELETE');
    Bouncer::allow('seller')->to('CREATE_CUSTOMER');
    //product premision
    Bouncer::allow('seller')->to('CREATE_PRODUCT');
    Bouncer::allow('seller')->to('UPDATE_PRODUCT');
    Bouncer::allow('seller')->to('DELETE_PRODUCT');


    //admin:
    //store premission
    Bouncer::allow('admin')->to('CREATE_STORE');
    Bouncer::allow('admin')->to('EDIT_STORE');
    Bouncer::allow('admin')->to('DELETE_STORE');
    Bouncer::allow('seller')->to('MANAGE_STORE');
    //customer list premission
    Bouncer::allow('admin')->to('CUSTOMER_LIST');
    Bouncer::allow('admin')->to('CUSTOMER_EDIT');
    Bouncer::allow('admin')->to('CUSTOMER_DELETE');
    Bouncer::allow('admin')->to('CREATE_CUSTOMER');
    Bouncer::allow('admin')->to('MANAGE_STORE');
    //seller list premission
    Bouncer::allow('admin')->to('SELLER_LIST');
    Bouncer::allow('admin')->to('EDIT_SELLER');
    Bouncer::allow('admin')->to('CREATE_SELLER');
    Bouncer::allow('admin')->to('DELETE_STORE');
    //product premision
    Bouncer::allow('admin')->to('CREATE_PRODUCT');
    Bouncer::allow('admin')->to('UPDATE_PRODUCT');
    Bouncer::allow('admin')->to('DELETE_PRODUCT');


     // Assign roles to users
    $adminRole = Bouncer::role()->where('name', 'admin')->first();
    $sellerRole = Bouncer::role()->where('name', 'seller')->first();
    $customerRole = Bouncer::role()->where('name', 'customer')->first();


     $adminUsers = User::where('role', 'admin')->get();
     foreach ($adminUsers as $user) {
         Bouncer::assign($adminRole)->to($user);
        }

    $sellerUsers = User::where('role', 'seller')->get();
      foreach ($sellerUsers as $user) {
         Bouncer::assign($sellerRole)->to($user);
        }

     $customerUsers = User::where('role', 'customer')->get();
     foreach ($customerUsers as $user) {
         Bouncer::assign($customerRole)->to($user);
        }
    }
}










