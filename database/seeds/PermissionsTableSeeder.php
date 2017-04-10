<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [

			[
				'name' => 'users',
				'display_name' => 'Users',
				'description' => 'Users',
			],
			[
				'name' => 'create-user',
				'display_name' => 'Create Users',
				'description' => 'Cretae Users',
			],
			[
				'name' => 'update-user',
				'display_name' => 'Update Users',
				'description' => 'Update Users',
			],
			[
				'name' => 'delete-user',
				'display_name' => 'Delete Users',
				'description' => 'Delete Users',
			],

		];

		foreach ($permission as $key => $value) {

			Permission::create($value);

		}
    }
}
