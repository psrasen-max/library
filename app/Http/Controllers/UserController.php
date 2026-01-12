<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController
{
    public function form(User $user): array
    {

        $data = [
            'user' => $user,
        ];

        return $data;
    }

    public function create(Request $request): array
    {
        $user = new User;

        return $this->form($user);
    }

    public function update(Request $request) {}

    public function insert(Request $request) {}

    public function delete(Request $request) {}

    public function validation(Request $request) {}

    public function save(Request $request) {}
}
