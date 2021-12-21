<?php

namespace App\Controllers;

class Profile extends BaseController
{
    public $usermodel;
    public $profilemodel;
    public $articlemodel;
    public $session;
    public $encrypter;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        if (!$this->session->get("is_login")) {
            header("Location:" . base_url());
            exit;
        }
        $this->encrypter = \config\Services::encrypter();
        $this->usermodel = model('UserModel');
        $this->profilemodel = model('UserProfileModel');
        helper('common');
    }

    public function index()
    {

        return view('dashboard/content/profile', ["session" => $this->session]);
    }

    public function showProfile()
    {
        $model = $this->usermodel;
        $id = $this->session->get('user_details')['id'];
        $user = $model->getFieldsForJoin('users.mobile,users.email,up.first_name,up.last_name,up.dob,up.gender,up.address,up.profile_photo', 'users_profile up', 'users.id=up.user_id', "users.id=$id", 'left');
        echo json_encode([
            "status" => 1,
            "msg" => "successful",
            "user_details" => $user,
        ]);
    }

    public function updateProfile()
    {
        $model = $this->usermodel;
        $pmodel = $this->profilemodel;
        $id = $this->session->get('user_details')['id'];
        $img_name = $pmodel->getFields('users_profile.profile_photo', "user_id='$id'")['profile_photo'];

        $file = $this->request->getFile("profile");
        if ($file->isValid()) {            
            $ext = $file->getClientExtension();
            if($ext == "png" || $ext == "jpg"){
                $img_name = $file->getRandomName();
                $file->move('uploads/user_images/', $img_name);
                $data = [
                    'first_name' => $this->request->getPost('fname'),
                    'last_name' => $this->request->getPost('lname'),
                    'dob' => $this->request->getPost('dob'),
                    'gender' => $this->request->getPost('gender'),
                    'address' => $this->request->getPost('address'),
                    'profile_photo' => $img_name,
                    'updated_at' => date("d/m/Y"),
                ];
                $pmodel->updateRow($data, "user_id=$id");
                $user_detail = [
                    "id" => $id,
                    "name" => $this->request->getPost('fname') . " " . $this->request->getPost('lname'),
                    "photo" => base_url("uploads/user_images/" . $img_name),
                    file_exists(base_url("uploads/user_images/" . $img_name)) ? base_url("uploads/user_images/" . $img_name) : base_url("img/avatar.png"),
                ];
                $this->session->set("user_details", $user_detail);
                echo json_encode([
                    "status" => 1,
                    "msg" => "Profile updated successfully."
                ]);
            }else{
                echo json_encode([
                    "status" => 0,
                    "msg" => "Profile picture is invalid. Only PNG and JPG alloweded."
                ]);
            }
        }else{
            echo json_encode([
                "status" => 0,
                "msg" => "Profile picture is invalid."
            ]);            
        }
    }

    public function changePass()
    {
        $id = $this->session->get('user_details')['id'];
        $model = $this->usermodel;
        $password = md5($this->request->getPost('password'));
        $exist = $model->get("password = '$password' AND id='$id'");
        if ($exist) {
            $new_pass = md5($this->request->getPost('new_password'));
            $data = [
                'password' => $new_pass,
            ];
            $model->updateRow($data, "id='$id'");
            echo json_encode([
                "status" => 1,
                "msg" => "Successful",
            ]);
        } else {
            echo json_encode([
                "status" => 0,
                "msg" => "Please enter correct password",
            ]);
        }
    }

}