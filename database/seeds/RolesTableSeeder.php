<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [

			[
				'name' => 'admin',
				'display_name' => 'Administrator',
				'description' => 'Administrator',
			],

			[
				'name' => 'user',
				'display_name' => 'User',
				'description' => 'User',
			],

			[
				'name' => 'owner',
				'display_name' => 'Owner',
				'description' => 'Owner',
			],

			[
				'name' => 'default',
				'display_name' => 'Default',
				'description' => 'Default',
			],

		];

		foreach ($role as $key => $value) {

			Role::create($value);

		}
    }
}
