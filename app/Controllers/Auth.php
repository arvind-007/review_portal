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
            "email" => $_POST['email'],
            "mobile" => $_POST['mobile'],
            "password" => md5($_POST['password']),
            'created_at' => date("d/m/Y"),
            'updated_at' => date("d/m/Y"),
        ];
        $id = $model->insertData($data);
        $data1 = [
            "user_id" => $id,
            "first_name" => $_POST['fname'],
            "last_name" => $_POST['lname'],
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
        $email = $_POST['email'];
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
        $mobile = $_POST['mobile'];
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
}