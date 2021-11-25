<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public $session;
    public $usermodel;
    public $profilemodel;
    public function __construct()
    {
        $this->usermodel = model('usermodel');
        $this->profilemodel = model('userprofilemodel');
        helper('common');
        
        $this->session = \Config\Services::session();
        $this->session->start();

        $uri = service('uri');

        if($this->session->get("is_login") && !($uri->getTotalSegments() > 1 && $uri->getSegment(2) == 'logout')){
            header("Location:".base_url("profile"));
            exit;
        }
    }


    //Default function login
    public function index()
    {
        return view('auth/login');
    }

    
    //Ajax function for login
    public function login()
    {
        $model = $this->usermodel;
        if ($this->request->isAJAX()) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $user = $model->login($email, $password); // Login method you have to create

            if ($user) {
                $profile = $this->profilemodel->getUserProfile($user->id);
                //prd($profile);
                $user_detail = [
                    "id" =>  $user->id,
                    "name" => $profile->first_name." ".$profile->last_name,
                    "photo" => $profile->profile_photo
                ];

                $this->session->set("is_login", 1);
                $this->session->set("user_details", $user_detail);
                
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

    public function signup()
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

    
    function forget_password(){
        view("forget_password");
    }

    function send_recovery_email(){

    }


    function logout(){
        $this->session->set("is_login", 0);
        $this->session->set("user_details", []);

        header("Location:".base_url());
        exit;
    }
}