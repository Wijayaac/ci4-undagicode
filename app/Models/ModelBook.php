<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBook extends Model
{
    protected $table        = 'master_book';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['id', 'book_name', 'id_category', 'writer', 'publisher', 'year_created', 'created_at', 'updated_at'];
}
