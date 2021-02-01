<?php


namespace App\Controllers;

use App\Models\ModelHome;


/*
    ! Controller class must extends BaseController for security reason
    TODO : Include namespace App\Controllers first then
 */

class Home extends BaseController
{
    /*
        TODO : Add protected variable when using model for more than 1 method/function
        TODO : And create construct method for inherit Model Class
    */
    protected $modelHome;
    public function __construct()
    {
        $this->modelHome = new ModelHome();
    }
    /*
        * Index method that first loaded when access a controller from URL
        ex: http://localhost:8080/product/
        * this example loaded index method in product controller
    */
    public function index()
    {
        // Get data from menu table, and pass into Home Views(index page)
        $data = [
            'menu' => $this->modelHome->findAll(),
        ];

        return view('Home', $data);
    }
}
