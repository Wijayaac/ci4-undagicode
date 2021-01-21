<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProduct extends Model
{
    protected $table            = 'master_product';
    protected $useTimestamps    = true;
    protected $allowedFields    = ['id', 'text', 'checkbox', 'date', 'email', 'image', 'textbox', 'price', 'password', 'radio', 'url'];

    public function getAllProduct()
    {
        $query = "SELECT * FROM master_product ";
        return $this->db->query($query);
    }
    public function insertProduct($data)
    {
        $query = "INSERT INTO master_product ('id', 'text', 'checkbox', 'date', 'email', 'image','textbox','price','password','radio','url' ) VALUES($data)";
        // $query = "INSERT INTO master_product ('id', 'text', 'checkbox', 'date', 'email', 'image','textbox','price','password','radio','url' ) VALUES(
        //     '" . $data["id"] . "',
        //     '" . $data["text"] . "',
        //     '" . $data["checkbox"] . "',
        //     '" . $data["date"] . "',
        //     '" . $data["email"] . "',
        //     '" . $data["image"] . "',
        //     '" . $data["textbox"] . "',
        //     '" . $data["price"] . "',
        //     '" . $data["password"] . "',
        //     '" . $data["radio"] . "',
        //     '" . $data["url"] . "'
        //     )";
        if ($this->db->query($query))
        {
            return "Success";
        }
    }
    public function getProduct($id)
    {
        $query = "SELECT * FROM master_product WHERE `id` = " . $id . " ";
        return $this->db->query($query);
    }
}
