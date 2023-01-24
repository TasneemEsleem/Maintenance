<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class permissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name'=> 'Create-Role','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Read-Roles','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Update-Role','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Delete-Role','guard_name'=> 'admin' ]);


        Permission::create(['name'=> 'Create-User','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Read-Users','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Update-User','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Delete-User','guard_name'=> 'admin' ]);


        Permission::create(['name'=> 'Create-Admin','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Read-Admins','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Update-Admin','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Delete-Admin','guard_name'=> 'admin' ]);



        Permission::create(['name'=> 'Create-Country','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Read-Countries','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Update-Country','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Delete-Country','guard_name'=> 'admin' ]);






        Permission::create(['name'=> 'Create-City','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Read-Cities','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Update-City','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Delete-City','guard_name'=> 'admin' ]);

        Permission::create(['name'=> 'Create-Category','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Read-Categories','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Update-Category','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Delete-Category','guard_name'=> 'admin' ]);



        Permission::create(['name'=> 'Create-Brand','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Read-Brands','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Update-Brand','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Delete-Brand','guard_name'=> 'admin' ]);



        Permission::create(['name'=> 'Create-Spare-Part','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Read-Spare-Parts','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Update-Spare-Part','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Delete-Spare-Part','guard_name'=> 'admin' ]);


        Permission::create(['name'=> 'Create-Model','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Read-Models','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Update-Model','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Delete-Model','guard_name'=> 'admin' ]);

        Permission::create(['name'=> 'Read-Permissions','guard_name'=> 'admin' ]);




        Permission::create(['name'=> 'Create-Language','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Read-Languages','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Update-Language','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Delete-Language','guard_name'=> 'admin' ]);




    


        Permission::create(['name'=> 'Create-Problem','guard_name'=> 'user' ]);
        Permission::create(['name'=> 'Read-Problems','guard_name'=> 'user' ]);
        Permission::create(['name'=> 'Update-Problem','guard_name'=> 'user' ]);
        Permission::create(['name'=> 'Delete-Problem','guard_name'=> 'user' ]);


        Permission::create(['name'=> 'Create-Repair','guard_name'=> 'user' ]);
        Permission::create(['name'=> 'Read-Repair','guard_name'=> 'user' ]);
        Permission::create(['name'=> 'Update-Repair','guard_name'=> 'user' ]);
        Permission::create(['name'=> 'Delete-Repair','guard_name'=> 'user' ]);

        Permission::create(['name'=> 'Create-Repair-Problem','guard_name'=> 'user' ]);
        Permission::create(['name'=> 'Read-Repair-Problems','guard_name'=> 'user' ]);
        Permission::create(['name'=> 'Update-Repair-Problem','guard_name'=> 'user' ]);
        Permission::create(['name'=> 'Delete-Repair-Problem','guard_name'=> 'user' ]);


        Permission::create(['name'=> 'Create-Problem-status','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Read-Problems-status','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Update-Problem-status','guard_name'=> 'admin' ]);
        Permission::create(['name'=> 'Delete-Problem-status','guard_name'=> 'admin' ]);




        Permission::create(['name'=> 'Create-user-model','guard_name'=> 'user' ]);
        Permission::create(['name'=> 'Read-user-models','guard_name'=> 'user' ]);













    }
}
