<?php

use App\Models\Grade;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder {

	public function run()
	{
        DB::table('users')->delete();
		// grades
		User::create(array(
				'name' => 'mohammed siam',
				'email' => 'm@gmail.com',
                'password'=> Hash::make('123123123'),
			));
	}
}
