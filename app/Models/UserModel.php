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
        $this->builder = $this->db->table('users');
    }

    // funtion to get rows on the basis of condition
    public function get($where)
    {
        $builder = $this->builder;
        $builder->select('*');
        $builder->where($where);
        $builder->where('deleted_at is NULL');
        return $builder->get()->getResultArray();
    }

    public function getFeilds($select, $where = "")
    {
        $builder = $this->builder;
        $builder->select($select);
        if ($where) {
            $builder->where($where);
        }
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

    // function to get fields for join rows on the basis of the condition
    public function getFieldsForJoin($column, $otherTable, $cond, $where = '', $type = null)
    {
        $builder = $this->builder;
        $builder->select($column);
        if ($where) {
            $builder->where($where);
        }
        $builder->where('users.deleted_at is NULL');
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

    public function login($uname, $pwd)
    {
        $pwd = md5($pwd);
        $this->builder->where("(email='$uname' || mobile='$uname')");
        $this->builder->where("password", $pwd);

        $result = $this->builder->get()->getRow();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function activateUser($uid = false)
    {
        if ($uid) {
            $builder = $this->builder;
            $builder->set("status", 1);
            $builder->where("id", $uid);
            $builder->update();
            return true;
        } else {
            return false;
        }
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
        $builder->select('users.id,mobile,email,status,first_name,last_name,profile_photo');
        $builder->join('users_profile up', 'up.user_id=users.id', 'left');
        $builder->where('users.deleted_at is NULL');
        $builder->limit($limit, $offset);
        return $builder->get()->getResultArray();
    }

}