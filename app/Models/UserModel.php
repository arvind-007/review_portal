<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    public $db;
    public $builder;

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table('users u');
    }

    // funtion to get rows on the basis of condition
    public function get($where)
    {
        $builder = $this->builder;
        $builder->select('*');
        $builder->where($where);
        return $builder->get()->getResultArray();
    }

    //function to get all row in the table
    public function getAll()
    {
        $builder = $this->builder;
        $builder->select("*");
        $builder->where('deleted_at is NULL');
        return $builder->get()->getResultArray();
    }

    // function to get fields of rows on the basis of the condition
    public function getFieldsForJoin($column, $otherTable, $cond, $where, $type = null)
    {
        $builder = $this->builder;
        $builder->select($column);
        $builder->where($where);
        $builder->where('u.deleted_at is NULL');
        if ($type) {
            $builder->join($otherTable, $cond, $type);
        } else {
            $builder->join($otherTable, $cond);
        }

        return $builder->get()->getResultArray();
    }

    // function to insert data in the table
    public function insertData($data)
    {
        $builder = $this->builder;
        $builder->insert($data);
        return $this->db->insertID();
    }

    // function to update any row
    public function updateRow($data, $where)
    {
        $builder = $this->builder;
        $builder->set($data);
        $builder->where($where);
        $builder->update();
    }

}