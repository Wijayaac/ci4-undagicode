<?php

namespace App\Controllers;

use \CodeIgniter\Controller;
use \App\Models\ModelBook;


class Book extends BaseController
{
    protected $modelBook;
    public function __construct()
    {
        $this->modelBook = new ModelBook();
    }

    public function index()
    {
        $data = [
            'books' => $this->modelBook->findAll(),
        ];

        return view('Book/Home', $data);
    }

    public function add()
    {
        return view('Book/Add');
    }

    public function save()
    {
        return redirect()->to('/book');
    }
    public function edit($id)
    {
        $data = [
            'book' => $this->modelBook->find($id)
        ];
        return view('Book/Edit', $data);
    }
    public function update()
    {
        return redirect()->to('/book');
    }

    public function delete($id)
    {
        $this->modelBook->delete($id);
        return redirect()->to('/book');
    }
}
