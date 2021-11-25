<?php

namespace App\Controllers;

class Article extends BaseController
{
    public $articlemodel;
    public $categoriesmodel;
    public function __construct()
    {
        $this->articlemodel = model('ArticlesModel');
        $this->categoriesmodel = model('CategoriesModel');
        helper('common');
    }

    public function index()
    {
        $cmodel = $this->categoriesmodel;
        $data = ["categories" => $cmodel->getAll()];
        return view('dashboard/content/articles', $data);
    }
    public function article()
    {
        return view('dashboard/content/add_articles');
    }
    public function showArticles()
    {
        $amodel = $this->articlemodel;
        $articles = $amodel->getFieldsForJoinAll('category,articles.id,created_at,title', 'categories c', "c.id = category_id");
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
    public function addArticles()
    {
        $amodel = $this->articlemodel;
        $data = [
            "title" => $this->request->getPost('title'),
            "tags" => $this->request->getPost('tags'),
            "category_id" => $this->request->getPost('category'),
            "body" => $this->request->getPost('textbox'),
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
        $articles = $amodel->getFields("category_id,title,tags,body", "id = '$id'");
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
    public function categories()
    {
        $cmodel = $this->categoriesmodel;
        $categories = $cmodel->getAll();
        $article;
        while ($categories) {
            $article = $categories;
        }
        echo json_encode(
            [
                'categories' => $article,
            ]
        );
    }}