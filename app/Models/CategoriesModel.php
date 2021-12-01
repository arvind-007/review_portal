<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriesModel extends Model
{
    public $db;
    public $builder;

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table('categories');
    }

    // function to get rows on the basis of condition
    public function getAll()
    {
        $builder = $this->builder;
        $builder->select("*");
        $builder->where('deleted_at is NULL');
        return $builder->get()->getResultArray();
    }

    public function insertData($data)
    {
        $builder = $this->builder;
        $builder->insert($data);
    }

    // function that update any row
    public function updateRow($data, $where)
    {
        $builder = $this->builder;
        $builder->set($data);
        $builder->where($where);
        $builder->update();
    }

    public function deleteRow($id)
    {
        $builder = $this->builder;
        $builder->set(['deleted_at' => date('d/m/Y')]);
        $builder->where('id', $id);
        $builder->update();
    }

}