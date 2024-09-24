<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Services\admin\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $ProductService;
    
    public function __construct(ProductService $ProductService)
    {
        $this->ProductService = $ProductService;
    }
    public function indexProduct(){
        $Products = $this->ProductService->getAllProducts();
        return view('admin.Product.index', compact('Products'));
    }
    public function getProductId($id){
        $Product = $this->ProductService->getProductId($id);
        return view('admin.Product.show', compact('Product'));
    }
    public function createProduct(ProductRequest $request){
        $this->ProductService->createProduct($request);
    }
    public function updateProduct($id, ProductRequest $request){
        $this->ProductService->updateProduct($id, $request);
    }
    public function deleteProduct($id){
        $this->ProductService->deleteProduct($id);
    }
}
