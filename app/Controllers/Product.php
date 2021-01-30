<?php

namespace App\Controllers;

use \App\Models\ModelProduct;
use Config\Database;

class Product extends BaseController
{
    protected $modelProduct;
    public function __construct()
    {
        $this->modelProduct = new ModelProduct();
    }
    public function index()
    {
        $pager = \Config\Services::pager();
        $data = [
            'products' => $this->modelProduct->paginate(1, 'bootstrap'),
            'pager'    => $this->modelProduct->pager,
        ];
        // return var_dump($data['products']);
        return view('Product/Home', $data);
    }
    public function search()
    {
        $search     = $this->request->getVar('search');
        $data       = [
            'product' => $this->modelProduct->getSearch($search),
        ];
        return view('Product/Search', $data);
    }
    public function add()
    {
        return view('Product/Add');
    }
    public function save()
    {
        $imageFile =    $this->request->getFile('productImage');
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
            'id'            => $this->request->getVar('id'),
            'product_name'  => $this->request->getVar('productName'),
            'price'         => $this->request->getVar('productPrice'),
            'weight'        => $this->request->getVar('productWeight'),
            'category'      => $this->request->getVar('productCategory'),
            'tag'           => $this->request->getVar('productTag'),
            'stock'         => $this->request->getVar('productStock'),
            'description'   => $this->request->getVar('productDescription'),
            'image'         => $imageName,
            'seller'        => $this->request->getVar('productSeller'),

        ];

        if ($this->modelProduct->insert($data))
        {
            return redirect()->to('/');
        }
        else
        {
            echo "Fail";
        }
        return redirect()->to('/');
    }
    public function delete($id)
    {
        $dataImage = $this->modelProduct->find($id);

        if ($this->modelProduct->delete($id))
        {
            unlink('uploads/' . $dataImage['image']);
            return redirect()->to('/');
        }
        else
        {
            echo "Error";
        }
        return redirect()->to('/');
    }
    public function edit($id)
    {
        $data = [
            'product' => $this->modelProduct->find($id),
        ];
        return view('Product/Edit', $data);
    }
    public function update()
    {
        // get old data so we can compare with new data
        $oldId      = $this->request->getVar('id');
        $oldData    = $this->modelProduct->find($oldId);
        $oldImage   = $oldData['image'];
        $imageFile  = $this->request->getFile('productImage');

        // compare image data old and new one
        if ($imageFile->getError() === 4)
        {
            $imageName = $oldImage;
        }
        elseif ($oldImage != 'untitled.png')
        {
            unlink('uploads/' . $oldImage);

            $imageName = $imageFile->getRandomName();
            $imageFile->move('uploads/', $imageName);
        }
        else
        {
            $imageName = $imageFile->getRandomName();
            $imageFile->move('uploads/', $imageName);
        }

        $data = [
            'product_name'  => $this->request->getVar('productName'),
            'price'         => $this->request->getVar('productPrice'),
            'weight'        => $this->request->getVar('productWeight'),
            'category'      => $this->request->getVar('productCategory'),
            'tag'           => $this->request->getVar('productTag'),
            'stock'         => $this->request->getVar('productStock'),
            'description'   => $this->request->getVar('productDescription'),
            'image'         => $imageName,
            'seller'        => $this->request->getVar('productSeller'),
        ];

        if ($this->modelProduct->update($oldId, $data))
        {
            return redirect()->to('/');
        }
        else
        {
            echo "Failed";
        }
        return redirect()->to('/');
    }
    public function print()
    {
        $data = [
            'products' => $this->modelProduct->findAll(),
        ];
        return view('Product/Print', $data);
    }
    public function export()
    {
        $data = [
            'products' => $this->modelProduct->findAll(),
        ];
        // var_dump($data);
        return view('Product/Export', $data);
    }
}
