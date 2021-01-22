<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProduct extends Model
{
    protected $table            = 'master_product';
    protected $useTimestamps    = false;
    protected $allowedFields    = ['id', 'text', 'checkbox', 'date', 'email', 'image', 'textbox', 'price', 'password', 'radio', 'url'];

    public function getAllProduct()
    {
        $query = "SELECT * FROM master_product ";
        return $this->db->query($query);
    }
    public function getProduct($id)
    {
        $query = "SELECT * FROM master_product WHERE `id` = " . $id . " ";
        return $this->db->query($query);
    }
}
