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
        return $builder->get()->getResultArray();
    }

}