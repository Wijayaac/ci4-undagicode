<?php

use App\Controllers\BaseController;
use App\Model\ModelCategory;
use CodeIgniter\Model;

class Category extends BaseController
{
    protected $modelCategory;
    public function __construct()
    {
        $this->modelCategory = new ModelCategory();
    }

    public function index()
    {
        $data = [
            'category' => $this->modelCategory->findAll(),
        ];

        return view('Book/Home', $data);
    }
    public function add()
    {
        return view('Category/Add');
    }

    public function save()
    {
        $id     = $this->request->getVar('id');
        $name   = $this->request->getVar('categoryName');

        $data = [
            'id'            => $id,
            'category_name' => $name
        ];

        if ($this->modelCategory->insert($data))
        {
            return redirect()->to('/category');
        }
        else
        {
            echo "Failed insert data category";
        }
        return "Failed insert data category";
    }
    public function edit($id)
    {
        $data = [
            'category' => $this->modelCategory->find($id)
        ];

        return view('Category/Edit', $data);
    }
    public function update()
    {
        $id          = $this->request->getVar('id');
        $name        = $this->request->getVar('categoryName');
        $data = [
            'category_name' => $name,
        ];

        if ($this->modelCategory->update($id, $data))
        {
            return redirect()->to('/book');
        }
        else
        {
            echo "Failed update data category";
        }
        return "Failed update data category";
    }
    public function delete($id)
    {
        if ($this->modelCategory->delete($id))
        {
            return  redirect()->to('/book');
        }
        else
        {
            echo "Failed delete data category";
        }
        return "Failed delete data category";
    }
}
