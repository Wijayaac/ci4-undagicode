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
            'products' => $this->modelProduct->paginate(4, 'bootstrap'),
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
        $isValid = $this->validate([
            'productName'   => [
                'rules'  =>  'is_unique[master_product.product_name]',
                'errors' =>  [
                    'is_unique' => 'Please insert another product'
                ],
            ],
            'productPrice' => [
                'rules'  => 'integer',
                'errors' => [
                    'integer' => 'Please input just number'
                ],
            ],
            'productWeight' => [
                'rules' => 'integer',
                'errors' => [
                    'ineteger' => 'Please input just number'
                ]
            ],
            'productTag' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please input at least one tag'
                ]
            ],
            'productStock' => [
                'rules' => 'integer',
                'errors' => ['integer' => 'Please input just number']
            ],
            'productDescription' => [
                'rules' => 'required|max_length[1000]',
                'errors' => [
                    'required'   => 'Please input description',
                    'max_length' => 'Maximum 1000 character'
                ]
            ],
            'productImage' => [
                'rules' => 'max_size[productImage,1024]|is_image[productImage]|mime_in[productImage,image/jpeg,image/png,image/jpg]',
                'errors' => [
                    'max_size' => 'Maximum upload 1024 KB',
                    'is_image' => 'Please input an Image (jpg/png)',
                    'mime_in'  => 'Please input an Image (jpg/png)',
                ]
            ],
            'productSeller' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please choose 1 seller'
                ]
            ]
        ]);

        $productId          = $this->request->getVar('id');
        $productName        = $this->request->getVar('productName');
        $productPrice       = $this->request->getVar('productPrice');
        $productWeight      = $this->request->getVar('productWeight');
        $productCategory    = $this->request->getVar('productCategory');
        $productStock       = $this->request->getVar('productStock');
        $productTag         = $this->request->getVar('productTag');
        $productDescription = $this->request->getVar('productDescription');
        $productSeller      = $this->request->getVar('productSeller');

        if ($isValid) {
            // @imageFile get image file from user input

            $imageFile =    $this->request->getFile('productImage');


            // *check if image isEmpty or not
            // TODO : if empty give default filename
            // TODO : if not empty move files into /uploads directory
            // TODO : and give random name into the files.
            if ($imageFile->getError() == 4) {
                $imageName = 'untitled.png';
            } else {
                $imageName = $imageFile->getRandomName();
                $imageFile->move('uploads/', $imageName);
            }

            // @data get data from user input and 
            // *adding into an array

            $data = [
                'id'            => $productId,
                'product_name'  => $productName,
                'price'         => $productPrice,
                'weight'        => $productWeight,
                'category'      => $productCategory,
                'tag'           => $productTag,
                'stock'         => $productStock,
                'description'   => $productDescription,
                'image'         => $imageName,
                'seller'        => $productSeller,

            ];

            // *Check if @data can added into database
            // using insert method built-in CodeIgniter
            // @param insert method (data that we want insert onto database array type)
            //  TODO : if @data added redirect into index method / Home Page
            // TODO : if @data can't added show an error message
            $this->modelProduct->insert($data);
            if ($this->dbAffectedRows() == 1) {
                $response = [
                    'result'   => 1,
                    'message'   => "Product has been added"
                ];
            } else {
                $response = [
                    'result'   => 2,
                    'message'   => "Product has not been added"
                ];
            }
        } else {
            $response = [
                'result'   => 3,
                'message'   => [
                    'errorName'         => $this->validator->getError('productName'),
                    'errorPrice'        => $this->validator->getError('productPrice'),
                    'errorWeight'       => $this->validator->getError('productWeight'),
                    'errorCategory'     => $this->validator->getError('productCategory'),
                    'errorTag'          => $this->validator->getError('productTag'),
                    'errorStock'        => $this->validator->getError('productStock'),
                    'errorDescription'  => $this->validator->getError('productDescription'),
                    'errorImage'        => $this->validator->getError('productImage'),
                    'errorSeller'       => $this->validator->getError('productSeller'),
                ],
                'data'                  => [
                    'id'            => $productId,
                    'product_name'  => $productName,
                    'price'         => $productPrice,
                    'weight'        => $productWeight,
                    'category'      => $productCategory,
                    'tag'           => $productTag,
                    'stock'         => $productStock,
                    'description'   => $productDescription,
                    'seller'        => $productSeller,

                ]
            ];
        }

        return $this->response->setJSON($response);
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

        if ($this->modelProduct->delete($id)) {
            if ($dataImage['image'] !== 'untitled.png') {
                unlink('uploads/' . $dataImage['image']);
            }
            return redirect()->to('/product');
        } else {
            echo "Error";
        }

        // *return a method for redirect into index method / Home Page
        // using redirect method built-in CodeIgniter

        return redirect()->to('/product');
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
        // @oldId, @imageFile, @newProduct get from user input form
        // @oldData, @oldImage, @oldName get from database data
        // * we get all of these data to compare, it so we can update it on database


        $isValid = $this->validate([
            'productPrice' => [
                'rules'  => 'integer',
                'errors' => [
                    'integer' => 'Please input just number'
                ],
            ],
            'productWeight' => [
                'rules' => 'integer',
                'errors' => [
                    'ineteger' => 'Please input just number'
                ]
            ],
            'productTag' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please input at least one tag'
                ]
            ],
            'productStock' => [
                'rules' => 'integer',
                'errors' => ['integer' => 'Please input just number']
            ],
            'productDescription' => [
                'rules' => 'required|max_length[1000]',
                'errors' => [
                    'required'   => 'Please input description',
                    'max_length' => 'Maximum 1000 character'
                ]
            ],
            'productImage' => [
                'rules' => 'max_size[productImage,1024]|is_image[productImage]|mime_in[productImage,image/jpeg,image/png,image/jpg]',
                'errors' => [
                    'max_size' => 'Maximum upload 1024 KB',
                    'is_image' => 'Please input an Image (jpg/png)',
                    'mime_in'  => 'Please input an Image (jpg/png)',
                ]
            ],
            'productSeller' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please choose 1 seller'
                ]
            ]
        ]);
        $productId          = $this->request->getVar('id');
        $productName        = $this->request->getVar('productName');
        $productPrice       = $this->request->getVar('productPrice');
        $productWeight      = $this->request->getVar('productWeight');
        $productCategory    = $this->request->getVar('productCategory');
        $productStock       = $this->request->getVar('productStock');
        $productTag         = $this->request->getVar('productTag');
        $productDescription = $this->request->getVar('productDescription');
        $productSeller      = $this->request->getVar('productSeller');

        $oldData        = $this->modelProduct->find($productId);
        $oldImage       = $oldData[0]['image'];
        var_dump($oldImage);
        var_dump($isValid);
        if ($isValid) {
            var_dump("ini valid");

            // *compare image data old and new one
            // TODO : if there is no image inserted, so the image not updated
            // TODO : if there is an image inserted, and the image before is not 'untitled.png' 
            // so delete that image from /uploads directory
            // TODO : if there is an image inserted, and the image before is 'untitled.png',
            // just move the new image into /uploads directory
            $imageFile  = $this->request->getFile('productImage');

            if ($imageFile->getError() === 4) {
                $imageName = $oldImage;
            } elseif ($oldImage != 'untitled.png') {
                unlink('uploads/' . $oldImage);

                $imageName = $imageFile->getRandomName();
                $imageFile->move('uploads/', $imageName);
            } else {
                $imageName = $imageFile->getRandomName();
                $imageFile->move('uploads/', $imageName);
            }

            // @data get data from user input and 
            // *adding into an array

            $data = [
                'product_name'  => $this->request->getVar('productName'),
                'price'         =>  $this->request->getVar('productPrice'),
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
            $this->modelProduct->update($productId, $data);
            var_dump($this->dbAffectedRows());
            if ($this->dbAffectedRows() == 1) {
                $response = [
                    'result'   => 1,
                    'message'   => "Product has been updated"
                ];
            } else {
                $response = [
                    'result'   => 2,
                    'message'   => "Product has not been updated"
                ];
            }
        } else {
            var_dump("ini ga valid");
            $response = [
                'result'   => 3,
                'message'   => [
                    'errorName'         => $this->validator->getError('productName'),
                    'errorPrice'        => $this->validator->getError('productPrice'),
                    'errorWeight'       => $this->validator->getError('productWeight'),
                    'errorCategory'     => $this->validator->getError('productCategory'),
                    'errorTag'          => $this->validator->getError('productTag'),
                    'errorStock'        => $this->validator->getError('productStock'),
                    'errorDescription'  => $this->validator->getError('productDescription'),
                    'errorImage'        => $this->validator->getError('productImage'),
                    'errorSeller'       => $this->validator->getError('productSeller'),
                ],
                'data'                  => [
                    'product_name'  => $productName,
                    'price'         => $productPrice,
                    'weight'        => $productWeight,
                    'category'      => $productCategory,
                    'tag'           => $productTag,
                    'stock'         => $productStock,
                    'description'   => $productDescription,
                    'seller'        => $productSeller,

                ]
            ];
        }
        // return json_encode(var_dump($this->dbAffectedRows()));
        return $this->response->setJSON($response);
    }
    public function validation()
    {

        $productId          = $this->request->getVar('id');
        $productName        = $this->request->getVar('productName');
        $productPrice       = $this->request->getVar('productPrice');
        $productWeight      = $this->request->getVar('productWeight');
        $productCategory    = $this->request->getVar('productCategory');
        $productStock       = $this->request->getVar('productStock');
        $productTag         = $this->request->getVar('productTag');
        $productDescription = $this->request->getVar('productDescription');
        $productSeller      = $this->request->getVar('productSeller');

        $oldData        = $this->modelProduct->find($productId);
        $oldImage       = $oldData['image'];
        // *compare image data old and new one
        // TODO : if there is no image inserted, so the image not updated
        // TODO : if there is an image inserted, and the image before is not 'untitled.png' 
        // so delete that image from /uploads directory
        // TODO : if there is an image inserted, and the image before is 'untitled.png',
        // just move the new image into /uploads directory
        $imageFile  = $this->request->getFile('productImage');

        if ($imageFile->getError() === 4) {
            $imageName = $oldImage;
        } elseif ($oldImage != 'untitled.png') {
            unlink('uploads/' . $oldImage);

            $imageName = $imageFile->getRandomName();
            $imageFile->move('uploads/', $imageName);
        } else {
            $imageName = $imageFile->getRandomName();
            $imageFile->move('uploads/', $imageName);
        }

        // @data get data from user input and 
        // *adding into an array

        $data = [
            'product_name'  => $productName,
            'price'         => $productPrice,
            'weight'        => $productWeight,
            'category'      => $productCategory,
            'tag'           => $productTag,
            'stock'         => $productStock,
            'description'   => $productDescription,
            'image'         => $imageName,
            'seller'        => $productSeller,

        ];

        // *Check if @data can added into database
        // using insert method built-in CodeIgniter
        // @param insert method (data that we want insert onto database array type)
        //  TODO : if @data added redirect into index method / Home Page
        // TODO : if @data can't added show an error message
        $this->modelProduct->update($productId, $data);
        // var_dump($this->dbAffectedRows());
        if ($this->dbAffectedRows() == 1) {
            $response = [
                'result'   => 1,
                'message'   => "Product has been updated"
            ];
        } else {
            $response = [
                'result'   => 2,
                'message'   => "Product has not been updated"
            ];
        }
        // return json_encode(var_dump($this->dbAffectedRows()));
        return $this->response->setJSON($response);
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
