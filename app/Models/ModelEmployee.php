<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelEmployee extends Model
{
    protected $table = 'master_employee';
    protected $useTimeStamps = true;
    protected $allowedFields = ['id', 'employee_name', 'address', 'phone', 'email', 'gender', 'cv', 'created_at', 'updated_at'];

    public function getSearch($value)
    {
        return $this->db->query("SELECT *  FROM `master_employee` WHERE 
        `employee_name` LIKE '%" . $value . "%' OR 
        `address` LIKE  '%" . $value . "%' OR 
        `phone` LIKE  '%" . $value . "%' OR 
        `email` LIKE  '%" . $value . "%' ORDER BY `created_at` DESC")->getResult();
    }
}
