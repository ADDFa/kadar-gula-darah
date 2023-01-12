<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert($this->getUsers());
    }

    private function getUsers(): array
    {
        // [name, email]
        $usersList = [
            [
                'Adha Dont Differatama',
                'fratamaadha18@gmail.com',
                'admin'
            ],

            [
                'lola sia dari',
                'lolasiadari716@gmail.com',
                'admin'
            ]
        ];

        $users = [];

        foreach ($usersList as $user) {
            array_push($users, $this->setUser($user[0], $user[1], $user[2]));
        }

        return $users;
    }

    private function setUser(string $name, string $email, string $role): array
    {
        return [
            'name'      => $name,
            'email'     => $email,
            'password'  => password_hash('password', PASSWORD_DEFAULT),
            'role'      => $role
        ];
    }
}
