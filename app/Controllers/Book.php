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
        $id          = rand();
        $cover       = $this->request->getFile('bookCover');
        if ($cover->getError() === 4)
        {
            $imageName = 'untitled.png';
        }
        else
        {
            $imageName = $cover->getRandomName();
            $cover->move('uploads/', $imageName);
        }

        $name        = $this->request->getVar('bookName');
        $category    = $this->request->getVar('bookCategory');
        $writer      = $this->request->getVar('bookWriter');
        $publisher   = $this->request->getVar('bookPublisher');
        $year        = $this->request->getVar('yearCreated');

        $book        = [
            'id'            => $id,
            'book_name'     => $name,
            'id_category'   => $category,
            'writer'        => $writer,
            'publisher'     => $publisher,
            'year_created'  => $year,
            'book_cover'    => $imageName,
        ];

        if ($this->modelBook->insert($book))
        {
            return redirect()->to('/book');
        }
        else
        {
            echo "Insert book failed !";
        }

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

        $oldId      = $this->request->getVar('id');
        $oldData    = $this->modelProduct->getProduct($oldId);
        $oldImage   = $oldData->getResult('array')[0]['book_cover'];
        $imageFile  = $this->request->getFile('bookCover');


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

        $name        = $this->request->getVar('bookName');
        $category    = $this->request->getVar('bookCategory');
        $writer      = $this->request->getVar('bookWriter');
        $publisher   = $this->request->getVar('bookPublisher');
        $year        = $this->request->getVar('yearCreated');

        $book        = [
            'book_name'     => $name,
            'id_category'   => $category,
            'writer'        => $writer,
            'publisher'     => $publisher,
            'year_created'  => $year,
            'book_cover'    => $imageName,
        ];

        if ($this->modelBook->update($oldId, $book))
        {
            return redirect()->to('/book');
        }
        else
        {
            echo "Insert book failed !";
        }
        return redirect()->to('/book');
    }

    public function delete($id)
    {
        $this->modelBook->delete($id);
        return redirect()->to('/book');
    }
}
