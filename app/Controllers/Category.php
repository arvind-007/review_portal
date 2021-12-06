<?php

namespace App\Controllers;

class Category extends BaseController
{
    public $categorymodel;
    public $session;
    public $encrypter;
    public $page;
    public $perPage;
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
        $this->pager = \Config\Services::pager();
        $this->perPage = 10;
    }

    public function index()
    {
        $pager = $this->pager;
        $page = $this->request->getGet('page') > 2 ? $this->request->getGet('page') : 1;
        $perPage = $this->perPage;
        $total = $this->categorymodel->getCount();
        $pager->makeLinks($page, $perPage, $total);
        $data = [
            "session" => $this->session,
            "pager" => $this->pager,
            'page_number' => $this->request->getGet('page'),
        ];
        return view('dashboard/content/category/categories', $data);
    }

    public function showCategories()
    {
        $perPage = $this->perPage;
        $offset = ($this->request->getGet('page') < 2) ? '1' : (($this->request->getGet('page') - 1) * $perPage) + 1;
        $categories = $this->categorymodel->getPaginate($perPage, $offset - 1);
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
            "msg" => "Catogory deleted succesfully!",
        ]);
    }

    public function insertCategory()
    {
        $cmodel = $this->categorymodel;
        $name = $this->request->getPost('name');
        $file = $this->request->getFile('image');
        if ($file->isValid()) {
            $img_name = $file->getRandomName();
            $file->move('uploads/category_images/', $img_name);

            $data = [
                'category' => $name,
                'image' => $img_name,
                'created_at' => date('d-m-Y'),
                'updated_at' => date('d-m-Y'),
            ];
            $cmodel->insertData($data);

            echo json_encode([
                "status" => 1,
                "msg" => "Category deleted succesfully!",
            ]);
        }
    }
    public function getCategory()
    {
        $cmodel = $this->categorymodel;
        $id = $this->request->getPost('id');
        $category = $cmodel->getFields('image,category', "id='$id'");
        echo json_encode([
            "status" => 1,
            "msg" => "Category fetch succesfully!",
            "details" => $category,
        ]);

    }

    public function updateCategory()
    {
        $cmodel = $this->categorymodel;
        $name = $this->request->getPost('name');
        $id = $this->request->getPost('uid');
        $file = $this->request->getFile('image');
        $img_name = $cmodel->getFields('image', "id='$id'");
        if ($file->isValid()) {
            $img_name = $file->getRandomName();
            $file->move('uploads/category_images/', $img_name);
        }
        $data = [
            'category' => $name,
            'image' => $img_name,
            'updated_at' => date('d-m-Y'),
        ];
        $cmodel->updateRow($data, "id='$id'");
        echo json_encode([
            "status" => 1,
            "msg" => "category updated succesfully!",
        ]);
    }

}