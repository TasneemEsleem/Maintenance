<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

// $allPermission= Permission::where('guard_name','admin')->get();
// Role::create([
//     'name'=>'Super-Admin',
//     'guard_name'=>'admin'
// ])->givePermissionTo($allPermission);
        Admin::create([
            'name' => 'Test',
            'email' =>'baraa@gmail.com',
            'email_verified_at' => now(),
            'image'=>'hh/ff.jpg',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),]);
            Admin::first()->assignRole(1);



        // Permission::create(['name'=> 'Create-Spare-Part','guard_name'=> 'user' ]);
        // Permission::create(['name'=> 'Read-Spare-Parts','guard_name'=> 'user' ]);
        // Permission::create(['name'=> 'repair-Spare-Parts','guard_name'=> 'user' ]);


    }
}
