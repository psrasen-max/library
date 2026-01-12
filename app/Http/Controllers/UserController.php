<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use function Laravel\Prompts\form;

class UserController
{
    
    
    
    public function form(User $user)
    {
        $data = [

            'user'=>$user
        ];
    }
    
    
  
    public function create(Request $request)
    {

        $user = New User();

        return $this->form($user);
    }

    public function update(Request $request)
    {

    }

    public function insert(Request $request)
    {

    }

    public function delete(Request $request)
    {

    }

    public function validation(Request $request)
    {

    }

    public function save(Request $request)
    {
        
    }

}
