<?php

use App\Controllers;
use App\Controllers\BaseController;
use App\Models\ModelRent;


class Transaction extends BaseController
{
    protected $modelRent;

    public function __construct()
    {
        $this->modelRent = new ModelRent();
    }

    public function index()
    {
        $data = [
            'rent' => $this->modelRent->findAll(),
        ];

        return view('Transaction/Home', $data);
    }

    public function add()
    {
        return view('Transaction/Add');
    }
    public function save()
    {
        $id     = rand();
        $book   = $this->request->getVar('bookId');
        $tenant = $this->request->getVar('userId');

        $data = [
            'id'    => $id,
            'book_id' => $book,
            'user_id' => $tenant,
        ];

        if ($this->modelRent->insert($data))
        {
            return redirect()->to('/transaction');
        }
        else
        {
            echo 'Error Input data';
        }
    }

    public function edit($id)
    {
        $data = [
            'rent' => $this->modelRent->find($id)
        ];

        return view('Transaction/Edit', $data);
    }

    public function update()
    {
        $id     = $this->request->getVar('id');

        $book   = $this->request->getVar('book_id');
        $tenant = $this->request->getVar('user_id');

        $data = [
            'book_id' => $book,
            'user_id' => $tenant,
        ];
        if ($this->modelRent->update($id, $data))
        {
            return redirect()->to('/transaction');
        }
        else
        {
            echo "Update data transaction failed";
        }
        return 'Fail delete data transaction';
    }
    public function delete($id)
    {
        if ($this->modelRent->delete($id))
        {
            return redirect()->to('/transaction');
        }
        else
        {
            echo 'Fail delete data transaction';
        }

        return 'Fail delete data transaction';
    }
    public function print()
    {
        $data = [
            'transaction' => $this->modelRent->findAll()
        ];

        return view('Transaction/Print', $data);
    }
}
