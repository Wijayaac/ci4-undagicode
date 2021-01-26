<?php

namespace App\Models;

use \CodeIgniter\Model;

class ModelRent extends Model
{
    protected $tableName    = 'master_rent';
    protected $useTimestamp = TRUE;
    protected $allowedField = ['id', 'book_id', 'user_id', 'created_at', 'updated_at'];
}
