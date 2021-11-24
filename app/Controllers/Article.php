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
}