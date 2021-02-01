<?php

namespace App\Models;

use CodeIgniter\Model;

/*
    ! Controller class must extends Model for security reason
    TODO : Include namespace App\Models first then
    TODO : Include Model files using Use Codeigniter\Models
 */

class ModelHome extends Model
{
    /*
       ! @table variable must be filled with table name
    */

    protected $table            = 'main_menu';
}
