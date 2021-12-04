<?php

namespace App\Controllers;

class Users extends BaseController
{
    public $usermodel;
    public $profilemodel;
    public $session;
    public $pager;
    public $perPage;
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
        $this->pager = \Config\Services::pager();
        $this->perPage = 10;
        helper('common');
    }

    public function index()
    {
        $pager = $this->pager;
        $page = $this->request->getGet('page') > 2 ? $this->request->getGet('page') - 2 : 1;
        $perPage = $this->perPage;
        $total = $this->usermodel->getCount();
        $pager->makeLinks($page, $perPage, $total);
        $data = [
            "session" => $this->session,
            "pager" => $this->pager,
            'page_number' => $this->request->getGet('page'),
        ];

        return view('dashboard/content/users/users', $data);
    }

    public function showUsers()
    {
        $perPage = $this->perPage;
        $offset = ($this->request->getGet('page') < 2) ? '1' : (($this->request->getGet('page') - 1) * $perPage) + 1;
        $users = $this->usermodel->getPaginate($perPage, $offset - 1);
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