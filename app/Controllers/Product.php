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
            'products' => $this->modelProduct->getAllProduct()
        ];
        return view('Product/Home', $data);
    }
    public function add()
    {
        return view('Product/Add');
    }
    public function save()
    {
        $imageFile =    $this->request->getFile('image');
        if ($imageFile->getError() == 4)
        {
            $imageName = 'untitled.png';
        }
        else
        {
            $imageName = $imageFile->getRandomName();
            $imageFile->move('uploads/', $imageName);
        }

        $data = [
            'id'         => $this->request->getVar('id'),
            'text'       => $this->request->getVar('text'),
            'checkbox'   => $this->request->getVar('checkbox'),
            'date'       => $this->request->getVar('date'),
            'email'      => $this->request->getVar('email'),
            'image'      => $imageName,
            'textbox'    => $this->request->getVar('textbox'),
            'price'      => $this->request->getVar('price'),
            'password'   => md5($this->request->getVar('password')),
            'radio'      => $this->request->getVar('radio'),
            'url'        => $this->request->getVar('url'),
        ];

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
        $dataImage = $this->modelProduct->getProduct($id)->getResult('array');
        if ($this->modelProduct->delete($id))
        {
            unlink('uploads/' . $dataImage[0]['image']);
            return redirect()->to('/');
        }
        else
        {
            echo "Error";
        }
    }
    public function edit($id)
    {
        $data = [
            'product' => $this->modelProduct->getProduct($id),
        ];
        return view('Product/Edit', $data);
    }
    public function update()
    {
        // get old data so we can compare with new data
        $oldId      = $this->request->getVar('id');
        $oldData    = $this->modelProduct->getProduct($oldId);
        $oldImage   = $oldData->getResult('array')[0]['image'];
        $imageFile  = $this->request->getFile('image');


        // compare image data old and new one
        if ($imageFile->getError() === 4)
        {
            $imageName = $oldImage;
        }
        elseif ($oldImage != 'untitled.png')
        {
            unlink('uploads/    ' . $oldImage);

            $imageName = $imageFile->getRandomName();
            $imageFile->move('uploads/', $imageName);
        }
        else
        {
            $imageName = $imageFile->getRandomName();
            $imageFile->move('uploads/', $imageName);
        }

        $data = [
            'text'       => $this->request->getVar('text'),
            'checkbox'   => $this->request->getVar('checkbox'),
            'date'       => $this->request->getVar('date'),
            'email'      => $this->request->getVar('email'),
            'image'      => $imageName,
            'textbox'    => $this->request->getVar('textbox'),
            'price'      => $this->request->getVar('price'),
            'password'   => md5($this->request->getVar('password')),
            'radio'      => $this->request->getVar('radio'),
            'url'        => $this->request->getVar('url'),
        ];

        if ($this->modelProduct->update($oldId, $data))
        {
            return redirect()->to('/');
        }
        else
        {
            echo "Failed";
        }
    }
    public function print()
    {
        $data['product'] = $this->modelProduct->getAllProduct();
        return view('Product/Print', $data);
    }
}
