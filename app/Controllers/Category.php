<?php

namespace App\Controllers;

class Category extends BaseController
{
    public $categorymodel;
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
        $this->categorymodel = model('CategoriesModel');
        helper('common');
    }

    public function index()
    {
        return view('dashboard/content/category/categories', ["session" => $this->session]);
    }

    public function showCategories()
    {
        $categories = $this->categorymodel->getAll();
        echo json_encode([
            "status" => 1,
            "msg" => "categories fetch successfully!",
            "categories" => $categories,
        ]);
    }

    public function removeCategory()
    {
        $cmodel = $this->categorymodel;
        $id = $this->request->getPost('id');
        $cmodel->deleteRow($id);
        echo json_encode([
            "status" => 1,
            "msg" => "User deleted succesfully!",
        ]);
    }

}