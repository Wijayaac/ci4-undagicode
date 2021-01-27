<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProduct extends Model
{
    protected $table            = 'master_product';
    protected $useTimestamps    = true;
    protected $allowedFields    = ['id', 'product_name', 'price', 'weight', 'category', 'tag', 'stock', 'description', 'image', 'seller', 'created_at', 'updated_at'];
}
