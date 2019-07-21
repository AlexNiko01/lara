<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 21.07.19
 * Time: 19:30
 */

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\User;

class UserService
{
    public function create(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
