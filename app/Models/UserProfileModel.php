<?php

namespace App\Models;

use CodeIgniter\Model;

class UserProfileModel extends Model
{
    public $db;
    public $builder;

    // constructor that insitialize the global db and builder
    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table('users_profile up');
    }

    // function to get rows on the basis of condition
    public function getFields($column, $where)
    {
        $builder = $this->builder;
        $builder->select($column);
        $builder->where($where);
        $builder->where('deleted_at is NULL');
        return $builder->get()->getResultArray();
    }

    //function to insert data in the table
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

}