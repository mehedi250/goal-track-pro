<?php

namespace Database\Seeders;

use App\Contracts\Services\UserServiceInterface;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password'=> Hash::make('admin'),
            'joining_date' => date("Y-m-d"),
            'exit_date' => null,
            'role' => User::ROLE_ADMIN,
            'status'=> User::STATUS_ACTIVE,
        ];

        app(UserServiceInterface::class)->create($params);
    }
}
