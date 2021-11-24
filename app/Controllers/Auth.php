<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public $usermodel;
    public $profilemodel;
    public function __construct()
    {
        $this->usermodel = model('usermodel');
        $this->profilemodel = model('userprofilemodel');
        helper('common');
    }

    public function index()
    {
        return view('auth/login');
    }

    public function signUp()
    {
        return view('auth/signup');
    }

    public function register()
    {
        $model = $this->usermodel;
        $pmodel = $this->profilemodel;
        $data = [
            "email" => $this->request->getPost('email'),
            "mobile" => $this->request->getPost('mobile'),
            "password" => md5($this->request->getPost('password')),
            'created_at' => date("d/m/Y"),
            'updated_at' => date("d/m/Y"),
        ];
        $id = $model->insertData($data);
        $data1 = [
            "user_id" => $id,
            "first_name" => $this->request->getPost('fname'),
            "last_name" => $this->request->getPost('lname'),
            'created_at' => date("d/m/Y"),
            'updated_at' => date("d/m/Y"),
        ];
        $pmodel->insertData($data1);
        echo json_encode([
            "status" => 1,
            "msg" => "succesfully insertion",
        ]);
    }

    public function emailExist()
    {
        $email = $this->request->getPost('email');
        $model = $this->usermodel;
        $exist = $model->get("email='$email'");
        if (isset($_SESSION['user_details']['uid']) && $_SESSION['user_details']['uid']) {
            $id = $_SESSION['user_details']['uid'];
            $exist = $model->get("id !='$id' && email='$email'");
        }
        if ($exist) {
            echo json_encode([
                "status" => 1,
                "msg" => "Email already exist",
            ]);
        } else {
            echo json_encode([
                "status" => 0,
                "msg" => "Email not exist",
            ]);
        }
    }

    public function mobileExist()
    {
        $mobile = $this->request->getPost('mobile');
        $model = $this->usermodel;
        $exist = $model->get("mobile='$mobile'");
        if ($exist) {
            echo json_encode([
                "status" => 1,
                "msg" => "Email already exist",
            ]);
        } else {
            echo json_encode([
                "status" => 0,
                "msg" => "Email not exist",
            ]);
        }
    }

    public function login()
    {
        $model = $this->usermodel;
        if ($this->request->isAJAX()) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $result = $model->login($email, $password); // Login method you have to create

            if ($result) {
                echo json_encode([
                    'status' => 1,
                    'message' => 'Login success',
                ]);
            } else {
                echo json_encode([
                    'status' => 0,
                    'message' => 'Login failed',
                ]);
            }
        } else {
            die("Invalid request");
        }
    }
}