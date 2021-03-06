<?php

namespace App\Controllers;

class Dashboard extends BaseController
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
        $this->articlemodel = model('ArticlesModel');
        helper('common');
    }

    public function index()
    {
        $users = $this->usermodel->getCount();
        $articles = $this->articlemodel->getCount();
        $data = [
            "session" => $this->session,
            "articlescount" => $articles,
            "userscount" => $users,
        ];
        return view('dashboard/content/dashboard', $data);
    }
}