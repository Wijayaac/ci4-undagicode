<?php


namespace App\Controllers;

use \App\Models\ModelProduct;

/*
    ! Controller class must extends BaseController for security reason
    TODO : Include namespace App\Controllers first then
    TODO : Include Model files using Use \App\Models\[ModelName]
 */

class Product extends BaseController
{
    /*
        TODO : Add protected variable when using model for more than 1 method/function
        TODO : And create construct method for inherit Model Class
    */
    protected $modelProduct;
    public function __construct()
    {
        $this->modelProduct = new ModelProduct();
    }
    /*
        * Index method that first loaded when access a controller from URL
        ex: http://localhost:8080/product/
        * this example loaded index method in product controller
    */
    public function index()
    {
        // @pager Variable for creating pagination
        // *Using CodeIgniter built-in method

        $pager = \Config\Services::pager();

        // *getData from model using @pager method 
        // @paginate method parameter (@number of item showing first, template for showing pagination)
        // @pager method use for pointing into another data

        $data = [
            'products' => $this->modelProduct->paginate(1, 'bootstrap'),
            'pager'    => $this->modelProduct->pager,
        ];

        // *return view method which is render the Views page
        //  also passing the data we get before

        return view('Product/Home', $data);
    }
    /*
        * search method for searching data base on what's user input
    */
    public function search()
    {
        // @search get data from input post request

        $search     = $this->request->getVar('search');

        // @data get data from model class
        // * use getSearch method with parameter(input value @search)

        $data       = [
            'product' => $this->modelProduct->getSearch($search),
        ];

        // *return view method which is render the Views page
        //  also passing the data we get before

        return view('Product/Search', $data);
    }
    /*
        * add method for sending Add form Modal to user
    */
    public function add()
    {
        // *return view method which is render the Views page

        return view('Product/Add');
    }
    /*
        * save method for adding data into database
    */
    public function save()
    {
        // @imageFile get image file from user input

        $imageFile =    $this->request->getFile('productImage');

        // *check if image isEmpty or not
        // TODO : if empty give default filename
        // TODO : if not empty move files into /uploads directory
        // TODO : and give random name into the files.

        if ($imageFile->getError() == 4)
        {
            $imageName = 'untitled.png';
        }
        else
        {
            $imageName = $imageFile->getRandomName();
            $imageFile->move('uploads/', $imageName);
        }

        // @data get data from user input and 
        // *adding into an array

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

        // *Check if @data can added into database
        // using insert method built-in CodeIgniter
        // @param insert method (data that we want insert onto database array type)
        //  TODO : if @data added redirect into index method / Home Page
        // TODO : if @data can't added show an error message

        if ($this->modelProduct->insert($data))
        {
            return redirect()->to('/');
        }
        else
        {
            echo "Fail";
        }

        // *return a method for redirect into index method / Home Page
        // using redirect method built-in CodeIgniter

        return redirect()->to('/');
    }
    /*
        * delete method for deleting data base on @id param
    */
    public function delete($id)
    {
        // @dataImage get image file from database, by its id 

        $dataImage = $this->modelProduct->find($id);

        // * Check if data can be deleted also delete the image
        // * and check if image is not untitled.png so delete it from /uploads directory
        // * vice versa
        // TODO if data can'n be deleted show an error

        if ($this->modelProduct->delete($id))
        {
            if ($dataImage['image'] !== 'untitled.png')
            {
                unlink('uploads/' . $dataImage['image']);
            }
            return redirect()->to('/');
        }
        else
        {
            echo "Error";
        }

        // *return a method for redirect into index method / Home Page
        // using redirect method built-in CodeIgniter

        return redirect()->to('/');
    }
    /*
        * edit method for sending Edit form Modal to user
    */
    public function edit($id)
    {
        // @data get from database using find method
        // @id params in find Method is id from spesific data

        $data = [
            'product' => $this->modelProduct->find($id),
        ];

        // *return view method which is render the Views page

        return view('Product/Edit', $data);
    }
    /*
        * update method for updating data into database
    */
    public function update()
    {

        // @oldId, @imageFile get from user input form
        // @oldData, @oldImage get from database data
        // * we get all of these data to compare, it so we can update it on database

        $oldId      = $this->request->getVar('id');
        $oldData    = $this->modelProduct->find($oldId);
        $oldImage   = $oldData['image'];
        $imageFile  = $this->request->getFile('productImage');

        // *compare image data old and new one
        // TODO : if there is no image inserted, so the image not updated
        // TODO : if there is an image inserted, and the image before is not 'untitled.png' 
        // so delete that image from /uploads directory
        // TODO : if there is an image inserted, and the image before is 'untitled.png',
        // just move the new image into /uploads directory

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

        // @data get data from user input and 
        // *adding into an array

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

        // *Check if @data can added into database
        // using update method built-in CodeIgniter
        // @params update method(the id of specific data, new data array type)
        //  TODO : if @data added redirect into index method / Home Page
        // TODO : if @data can't added show an error message

        if ($this->modelProduct->update($oldId, $data))
        {
            return redirect()->to('/');
        }
        else
        {
            echo "Failed";
        }

        // *return a method for redirect into index method / Home Page
        // using redirect method built-in CodeIgniter

        return redirect()->to('/');
    }
    /*
        * print method for printing data from database
    */
    public function print()
    {
        // @data get from database using findAll method
        // *using findAll method built-in CodeIgniter

        $data = [
            'products' => $this->modelProduct->findAll(),
        ];

        // *return view method which is render the Views page and passing @data

        return view('Product/Print', $data);
    }
    /*
        * print method for printing data from database
    */
    public function export()
    {
        // @data get from database using findAll method
        // *using findAll method built-in CodeIgniter

        $data = [
            'products' => $this->modelProduct->findAll(),
        ];

        // *return view method which is render the Views page and passing @data

        return view('Product/Export', $data);
    }
}
