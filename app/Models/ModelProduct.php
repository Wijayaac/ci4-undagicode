<?php

namespace App\Models;

use CodeIgniter\Model;

/*
    ! Controller class must extends Model for security reason
    TODO : Include namespace App\Models first then
    TODO : Include Model files using Use Codeigniter\Models
 */

class ModelProduct extends Model
{
    /*
       ! @table variable must be filled with table name
       ? @useTimestamps is optional, where Codeigniter provide a method for insert created time and updated time into database default : false,
       ! @allowedFields must filled with field name from actual table in database
       * @allowedFields is give CodeIgniter access for running CRUD on that field 
    */
    protected $table            = 'master_product';
    protected $useTimestamps    = true;
    protected $allowedFields    = ['id', 'product_name', 'price', 'weight', 'category', 'tag', 'stock', 'description', 'image', 'seller', 'created_at', 'updated_at'];

    /*
        * getSearch method for searching a specific data base on @value param
        @value get data from user input on search field
    */
    public function getSearch($value)
    {
        // TODO : Check if @value is not empty string, and then get the data
        // TODO : Check if @value is empty string, and then get all data 
        return $this->db->query("SELECT *  FROM `master_product` WHERE 
        `product_name` LIKE '%" . $value . "%' OR 
        `description` LIKE  '%" . $value . "%' OR 
        `stock` LIKE  '%" . $value . "%' ORDER BY `created_at` DESC")->getResult();
    }
}
