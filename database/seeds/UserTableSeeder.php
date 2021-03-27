<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'dot1',
                'phone'=> '098752346',
                'address'=> 'PY',
                'address_ship' => 'PY',
                'password' => bcrypt('12345'),
                'email' => 'pesssi0147852@gmail.com',
                'city' => 'VN',
                'country' => 'VN',
            ]
           
        ];
        DB::table('customers')->insert($data);
    }
}
