<?php

namespace App\Controllers;

class Tag extends BaseController
{
    public $tagmodel;
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
        $this->tagmodel = model('TagsModel');
        $this->pager = \Config\Services::pager();
        $this->perPage = 10;
        helper('common');
    }

    public function index()
    {
        $pager = $this->pager;
        $page = $this->request->getGet('page') > 2 ? $this->request->getGet('page') - 2 : 1;
        $perPage = $this->perPage;
        $total = $this->tagmodel->getCount();
        $pager->makeLinks($page, $perPage, $total);
        $data = [
            "session" => $this->session,
            "pager" => $this->pager,
            'page_number' => $this->request->getGet('page'),
        ];

        return view('dashboard/content/tag/tags', $data);
    }

    public function showTags()
    {
        $perPage = $this->perPage;
        $offset = ($this->request->getGet('page') < 2) ? '1' : (($this->request->getGet('page') - 1) * $perPage) + 1;
        $tags = $this->tagmodel->getPaginate($perPage, $offset - 1);
        echo json_encode([
            "status" => 1,
            "msg" => "tags fetch successfully!",
            "tags" => $tags,
        ]);
    }

    public function removeTag()
    {
        $tmodel = $this->tagmodel;
        $id = $this->request->getPost('id');
        $tmodel->deleteRow($id);
        echo json_encode([
            "status" => 1,
            "msg" => "tag deleted succesfully!",
        ]);
    }
    public function insertTag()
    {
        $tmodel = $this->tagmodel;
        $name = $this->request->getPost('name');
        $data = [
            "tag" => $name,
            "created_at" => date('d-m-Y'),
            "updated_at" => date('d-m-Y'),
        ];
        $tmodel->insertData($data);
        echo json_encode([
            "status" => 1,
            "msg" => "tag added succesfully!",
        ]);
    }

    public function getTag()
    {
        $tmodel = $this->tagmodel;
        $id = $this->request->getPost('id');
        $name = $tmodel->getFields('tag', "id='$id'")['tag'];
        echo json_encode([
            "status" => 1,
            "msg" => "Tag detail fetch succesfully!",
            "name" => $name,
        ]);
    }

    public function updatetag()
    {
        $tmodel = $this->tagmodel;
        $name = $this->request->getPost('name');
        $id = $this->request->getPost('uid');
        $data = [
            'tag' => $name,
            'updated_at' => date('d-m-Y'),
        ];
        $tmodel->updateRow($data, "id='$id'");
        echo json_encode([
            "status" => 1,
            "msg" => "Tag updated succesfully!",
        ]);
    }
}