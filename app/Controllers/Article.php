<?php

namespace App\Controllers;

class Article extends BaseController
{
    public $articlemodel;
    public function __construct()
    {
        $this->articlemodel = model('ArticlesModel');
        helper('common');
    }

    public function index()
    {
        $amodel = $this->articlemodel;
        $data = ["articles" => $amodel->getAll()];
        return view('dashboard/content/articles', $data);
    }
    public function showArticles()
    {
        $amodel = $this->articlemodel;
        $articles = $amodel->getFieldsForJoinAll('c.category,a.id,a.created_at,a.title', 'categories c', "c.id = a.category_id");
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
}