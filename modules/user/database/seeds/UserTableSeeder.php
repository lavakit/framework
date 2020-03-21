<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

/**
 * Class UsersTableSeeder
 */
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'                => 1,
            'first_name'        => 'Hoa',
            'last_name'         => 'Trinh Quoc',
            'full_name'         => 'Trinh Quoc Hoa',
            'email'             => 'tqhoa8th@gmail.com',
            'password'          => bcrypt('12345678'),
            'confirmed'         => true,
            'registered'        => true,
            'confirm_token'     => null,
            'remember_token'    => null,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
    }
}
