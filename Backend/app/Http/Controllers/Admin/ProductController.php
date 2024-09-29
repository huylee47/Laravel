<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Services\admin\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function indexProduct()
    {
        $products = $this->productService->getAllProducts();
        return response()->json($products);  
    }

    public function getProductId($id)
    {
        $product = $this->productService->getProductId($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($product); 
    }

    public function createProduct(ProductRequest $request)
    {
        $newProduct = $this->productService->createProduct($request);
        return response()->json([
            'status' => 'success',
            'newProduct' => $newProduct

        ], 201); 
    }

    public function updateProduct($id, ProductRequest $request)
    {
        $product = $this->productService->getProductId($id);
        if (!$product){
            return response()->json([
                'status' => 'Product not found',
        ], 404);

        }
        $newProduct = $this->productService->updateProduct($id, $request);

        return response()->json([
            'status' => 'success',
            'updatedProduct' => $newProduct
        ]);
    }

    public function deleteProduct($id)
    {
        $product = $this->productService->getProductId($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $this->productService->deleteProduct($id);

        return response()->json([
            'status' => 'success',
            'deletedProduct' => $product
        ]);
    }
}
