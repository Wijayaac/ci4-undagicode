if (!$this->validate([
'productName' => [
'rules' => 'is_unique[master_product.product_name]',
'errors' => [
'is_unique' => ''
]
],
])) {
session()->setFlashdata('message', 'Please input another product');
return redirect()->to('/product/index');
}
if (!$this->validate([
'productPrice' => [
'rules' => 'integer',
'errors' => [
'integer' => ''
]
],
])) {
session()->setFlashdata('message', 'Input just number ( 0 - 9 )');
return redirect()->to('/product/index');
}
if (!$this->validate([
'productWeight' => [
'rules' => 'integer',
'errors' => [
'integer' => 'Input just number ( 0 - 9 )'
]
],
])) {
session()->setFlashdata('message', 'Input just number ( 0 - 9 )');
return redirect()->to('/product/index');
}
if (!$this->validate([
'productCategory' => [
'rules' => 'in_list[women,men,kid]',
'errors' => [
'in_list' => 'please select eg: women'
]
],
])) {
session()->setFlashdata('message', 'please select eg: women');
return redirect()->to('/product/index');
}
if (!$this->validate([
'productTag' => [
'rules' => 'max_length[20]',
'errors' => [
'max_length' => ''
]
],
])) {
session()->setFlashdata('message', 'Description is to long remove some text');
return redirect()->to('/product/index');
}
if (!$this->validate([
'productStock' => [
'rules' => 'integer',
'errors' => [
'integer' => 'Please insert number (0 - 9)'
]
],
])) {
session()->setFlashdata('message', 'Please insert number (0 - 9)');
return redirect()->to('/product/index');
}
if (!$this->validate([
'productDescription' => [
'rules' => 'max_length[20]',
'errors' => [
'max_length' => 'Description is to long remove some text'
]
],
])) {
session()->setFlashdata('message', 'Description is to long remove some text');
return redirect()->to('/product/index');
}
if (!$this->validate([
'productImage' => [
'rules' => 'max_size[productImage,1024]|is_image[productImage]|mime_in[productImage,image/jpeg,image/png,image/jpg]',
'errors' => [
'max_size' => 'Image too big, please resize it',
'is_image' => 'Please insert an image (jpg/png)',
'mime_in' => 'Please insert an image (jpg/png)',
]
],
])) {
session()->setFlashdata('message', 'Please insert an image (jpg/png) / Image too big, please resize it ');
return redirect()->to('/product/index');
}
if (!$this->validate([
'productSeller' => [
'rules' => 'required',
'errors' => [
'required' => 'Please choose 1 seller'
]
],
])) {