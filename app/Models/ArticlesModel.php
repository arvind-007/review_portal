<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticlesModel extends Model
{
    public $db;
    public $builder;

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table('articles');
    }

    // funtion to get rows on the basis of condition
    public function getFields($column, $where)
    {
        $builder = $this->builder;
        $builder->select($column);
        $builder->where($where);
        $builder->where('deleted_at is NULL');
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

    // function to get fields for join all rows
    public function getFieldsForJoinAll($column, $otherTable, $cond, $type = null)
    {
        $builder = $this->builder;
        $builder->select($column);
        $builder->where('articles.deleted_at is NULL');
        if ($type) {
            $builder->join($otherTable, $cond, $type);
        } else {
            $builder->join($otherTable, $cond);
        }

        return $builder->get()->getResultArray();
    }

    // function to get fields for join all rows
    public function getFieldsForJoin($column, $otherTable, $cond, $where, $type = null)
    {
        $builder = $this->builder;
        $builder->select($column);
        $builder->where('articles.deleted_at is NULL');
        $builder->where($where);
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

    public function deleteRow($id)
    {
        $builder = $this->builder;
        $builder->set(['deleted_at' => date('d/m/Y')]);
        $builder->where('id', $id);
        $builder->update();
    }

    public function getCount()
    {
        $builder = $this->builder;
        $builder->where('deleted_at is NULL');
        return $builder->countAllResults();
    }

    public function getPaginate($limit, $offset)
    {
        $builder = $this->builder;
        $builder->select('category,articles.id,articles.created_at,title');
        $builder->join('categories c', "c.id = category_id");
        $builder->where('articles.deleted_at is NULL');
        $builder->limit($limit, $offset);
        return $builder->get()->getResultArray();
    }
}