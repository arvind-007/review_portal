<?php

namespace App\Controllers;

class Users extends BaseController
{
    public $usermodel;
    public $profilemodel;
    public $session;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        if (!$this->session->get("is_login")) {
            header("Location:" . base_url());
            exit;
        }
        $this->usermodel = model('UserModel');
        $this->profilemodel = model('UserProfileModel');
        helper('common');
    }

    public function index()
    {
        return view('dashboard/content/users/users', ["session" => $this->session]);
    }

    public function showUsers()
    {
        $umodel = $this->usermodel;
        $users = $umodel->getFieldsForJoin('users.id,mobile,email,status,first_name,last_name,profile_photo', 'users_profile up', 'users.id=up.user_id');
        echo json_encode([
            "status" => 1,
            'msg' => "Users details fetch successfully!",
            "users" => $users,
        ]);
    }

    public function suspendUser()
    {
        $umodel = $this->usermodel;
        $id = $this->request->getPost('id');
        $data = [
            'status' => 2,
        ];
        $umodel->updateRow($data, "id = '$id'");
        echo json_encode([
            "status" => 1,
            "msg" => "User suspend succesfully!",
        ]);
    }

    public function deleteUser()
    {
        $umodel = $this->usermodel;
        $upmodel = $this->profilemodel;
        $id = $this->request->getPost('id');
        $umodel->deleteRow($id);
        $upmodel->deleteRow($id);
        echo json_encode([
            "status" => 1,
            "msg" => "User deleted succesfully!",
        ]);
    }
}