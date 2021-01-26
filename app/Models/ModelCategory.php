<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelCategory extends Model
{
    protected $tableName    = 'master_category';
    protected $useTimestamp = TRUE;
    protected $allowedField = ['id', 'category_name', 'created_at', 'updated_at'];
}
