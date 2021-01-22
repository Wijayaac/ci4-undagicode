<?php

namespace App\Controllers;

use \CodeIgniter\Controller;
use \App\Models\ModelProduct;

class Product extends BaseController
{
    protected $modelProduct;
    public function __construct()
    {
        $this->modelProduct = new ModelProduct();
    }
    public function index()
    {
        $data = [
            'product' => $this->modelProduct->getAllProduct()
        ];
        return view('Home', $data);
    }
    public function add()
    {
        return view('Add');
    }
    public function save()
    {
        $data = [
            'id'         => $this->request->getVar('id'),
            'text'       => $this->request->getVar('text'),
            'checkbox'   => $this->request->getVar('checkbox'),
            'date'       => $this->request->getVar('date'),
            'email'      => $this->request->getVar('email'),
            'image'      => $this->request->getVar('image'),
            'textbox'    => $this->request->getVar('textbox'),
            'price'      => $this->request->getVar('price'),
            'password'   => $this->request->getVar('password'),
            'radio'      => $this->request->getVar('radio'),
            'url'        => $this->request->getVar('url'),
        ];
        // var_dump($data);
        if ($this->modelProduct->insert($data))
        {
            return redirect()->to('/');
        }
        else
        {
            echo "Fail";
        }
    }
    public function delete($id)
    {
        if ($this->modelProduct->delete($id))
        {

            return redirect()->to('/');
        }
        else
        {
            echo "Fail";
        }
    }
    public function edit($id)
    {
        $data = [
            'product' => $this->modelProduct->getProduct($id),
        ];
        return view('Edit', $data);
    }
    public function update($id)
    {
        $data = [
            'text'       => $this->request->getVar('text'),
            'checkbox'   => $this->request->getVar('checkbox'),
            'date'       => $this->request->getVar('date'),
            'email'      => $this->request->getVar('email'),
            'image'      => $this->request->getVar('image'),
            'textbox'    => $this->request->getVar('textbox'),
            'price'      => $this->request->getVar('price'),
            'password'   => $this->request->getVar('password'),
            'radio'      => $this->request->getVar('radio'),
            'url'        => $this->request->getVar('url'),
        ];

        if ($this->modelProduct->update($id, $data))
        {
            return redirect()->to('/');
        }
        else
        {
            echo "Failed";
        }
    }
}
