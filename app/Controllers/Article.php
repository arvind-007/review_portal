<?php

namespace App\Controllers;

class Article extends BaseController
{
    public $articlemodel;
    public $categoriesmodel;
    public $session;
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

        $this->articlemodel = model('ArticlesModel');
        $this->categoriesmodel = model('CategoriesModel');
        $this->pager = \Config\Services::pager();
        $this->perPage = 10;
        helper('common');
    }

    public function index()
    {
        $cmodel = $this->categoriesmodel;
        $pager = $this->pager;
        $page = $this->request->getGet('page') > 2 ? $this->request->getGet('page') - 2 : 1;
        $perPage = $this->perPage;
        $total = $this->articlemodel->getCount();
        $pager->makeLinks($page, $perPage, $total);
        $data = [
            "categories" => $cmodel->getAll(),
            "session" => $this->session,
            "pager" => $this->pager,
            'page_number' => $this->request->getGet('page'),
        ];
        return view('dashboard/content/article/articles', $data);
    }

    public function addArticleView()
    {
        $cmodel = $this->categoriesmodel;
        $data = [
            "categories" => $cmodel->getAll(),
            "session" => $this->session,
        ];
        return view('dashboard/content/article/add_article', $data);
    }

    public function showArticles()
    {
        $perPage = $this->perPage;
        $offset = ($this->request->getGet('page') < 2) ? '1' : (($this->request->getGet('page') - 1) * $perPage) + 1;
        $articles = $this->articlemodel->getPaginate($perPage, $offset - 1);
        if ($articles) {
            echo json_encode([
                "status" => 1,
                "msg" => "articles fetch succesfully",
                "articles" => $articles,
            ]);
        } else {
            echo json_encode([
                "status" => 0,
                "msg" => "table is empty",
            ]);
        }
    }

    public function addArticle()
    {
        $amodel = $this->articlemodel;
        $data = [
            "title" => $this->request->getPost('title'),
            "tags" => $this->request->getPost('tags'),
            "category_id" => $this->request->getPost('category'),
            "body" => $this->request->getPost('body'),
            'created_at' => date('d-m-Y'),
            'updated_at' => date('d-m-Y'),
        ];
        $id = $amodel->insertData($data);
        echo json_encode(
            [
                "status" => 1,
                "msg" => "successfully insertion",
            ]
        );
    }

    public function showArticleData()
    {
        $amodel = $this->articlemodel;
        $id = $this->request->getPost('id');
        $articles = $amodel->getFieldsForJoin("category_id,title,tags,body,category", "categories c", "category_id = c.id", "articles.id = '$id'");
        if ($articles) {
            echo json_encode([
                "status" => 1,
                "msg" => "article data fetch succesfully",
                "articles" => $articles,
            ]);
        }
    }
    public function updateArticle()
    {
        $amodel = $this->articlemodel;
        $id = $this->request->getPost('id');
        $data = [
            "title" => $this->request->getPost('title'),
            "tags" => $this->request->getPost('tags'),
            "category_id" => $this->request->getPost('category'),
            "body" => $this->request->getPost('body'),
            'updated_at' => date('d/m/Y'),
        ];
        $amodel->updateRow($data, "id = '$id'");
        echo json_encode([
            "status" => 1,
            "msg" => "article updated succesfully",
        ]);
    }
    public function deleteArticle()
    {
        $amodel = $this->articlemodel;
        $id = $this->request->getPost('id');
        $amodel->deleteRow($id);
        echo json_encode([
            "status" => 1,
            "msg" => "article Deleted succesfully",
        ]);
    }
}