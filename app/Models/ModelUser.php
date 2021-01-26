<?php

namespace App\Models;

use \CodeIgniter\Model;

class ModelUser extends Model
{
    protected $tableName     = 'master_user';
    protected $useTimestamp  = TRUE;
    protected $allowedFields = ['id', 'username', 'email', 'created_at', 'updated_ats'];
}
