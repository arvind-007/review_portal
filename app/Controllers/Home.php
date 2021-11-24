<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }
    public function signUp()
    {
        return view('auth/signup');
    }

    public function login()
    {
        $uname = $this->input->post('name');
        $password = $this->input->post('password');
        $result= $this->Model->login($name,$password); // Login method you have to create
       if($result=='success')
       {
            echo json_encode([
                'status' => 'success',
                'message' => 'you are loged in'
            ]);
        } 
        else 
        {
            echo json_encode([
                'status' => 'failed'
            ]);
        }
    }
}