<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public $session;
    public $usermodel;
    public $profilemodel;
    public $encrypter;
    public function __construct()
    {
        $this->encrypter = \config\Services::encrypter();
        $this->usermodel = model('usermodel');
        $this->profilemodel = model('userprofilemodel');
        helper('common');

        $this->session = \Config\Services::session();
        $this->session->start();

        $uri = service('uri');

        if ($this->session->get("is_login") && !($uri->getTotalSegments() > 1 && $uri->getSegment(2) == 'logout')) {
            header("Location:" . base_url("profile"));
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
                switch ($user->status) {
                    case 0:
                        echo json_encode([
                            'status' => 0,
                            'message' => 'Your account is not activated yet. <br>Please check your email.',
                        ]);
                        break;
                    case 1:
                        $profile = $this->profilemodel->getUserProfile($user->id);
                        //prd($profile);
                        $user_detail = [
                            "id" => $user->id,
                            "name" => ucwords($profile->first_name . " " . $profile->last_name),
                            "photo" => file_exists(base_url("uploads/user_images/" . $profile->profile_photo)) ? base_url("uploads/user_images/" . $profile->profile_photo) : base_url("img/avatar.png"),
                        ];

                        $this->session->set("is_login", 1);
                        $this->session->set("user_details", $user_detail);

                        echo json_encode([
                            'status' => 1,
                            'message' => 'Login success',
                        ]);
                        break;
                    case 2:
                        echo json_encode([
                            'status' => 0,
                            'message' => 'Your account has been suspended. <br>Please contact service provider.',
                        ]);
                        break;
                }
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
        // $this->sendVerificationEmail(base64_encode($id), base64_encode($this->request->getPost('email')));
        $this->sendVerificationEmail($id, $this->request->getPost('email'));
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

    public function forget_password()
    {
        view("forget_password");
    }

    public function logout()
    {
        $this->session->set("is_login", 0);
        $this->session->set("user_details", []);

        header("Location:" . base_url());
        exit;
    }

    public function sendVerificationEmail($id, $mail)
    {
        $uid = url_base64_encode($this->encrypter->encrypt($id));
        $time = url_base64_encode(time());
        $url = base_url("/auth/verify?uid=" . $uid . "&t=" . $time);

        $email = \Config\Services::email();

        $email->setFrom('manishpatodiya025@gmail.com', 'document code');
        $email->setTo($mail);
        $email->setSubject('Email verification');

        $email->setMessage("<!DOCTYPE html>
        <html lang='en'>

        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Document</title>
        </head>

        <body>
            <pre>Your account is not yet activated. To activate your account <a href='$url'>click here</a>
        </body>
        </html>");
        $email->send();
    }

    public function verify()
    {
        $enc = url_base64_decode($this->request->getGet('uid'));
        $uid = $this->encrypter->decrypt($enc);
        $time = url_base64_decode($this->request->getGet('t'));
        $diff = time() - $time;
        if ($diff > ACTIVATION_EXPIRE_TIME) {
            echo "Your activation link has been expired.";
        } else {
            $success = $this->usermodel->activateUser($uid);
            if ($success) {
                echo "Your account has been activated.";
            } else {
                echo "Failed to activate your account. May be your link has been expired.";
            }
        }
    }
}