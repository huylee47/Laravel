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

    // Lấy danh sách sản phẩm
    public function indexProduct()
    {
        $products = $this->productService->getAllProducts();
        return response()->json($products);  // Trả về JSON
    }

    // Hiển thị sản phẩm theo ID
    public function getProductId($id)
    {
        $product = $this->productService->getProductId($id);

        if (!$product) {
            return response()->json(['error' => 'Sản phẩm không tồn tại'], 404);
        }

        return response()->json($product);  // Trả về JSON
    }

    // Tạo sản phẩm mới
    public function createProduct(ProductRequest $request)
    {
        $this->productService->createProduct($request);
        return response()->json([
            'message' => 'Sản phẩm đã được tạo thành công!'
        ], 201);  // Trả về JSON với mã 201 (Created)
    }

    // Cập nhật sản phẩm
    public function updateProduct($id, ProductRequest $request)
    {
        $product = $this->productService->getProductId($id);

        if (!$product) {
            return response()->json(['error' => 'Sản phẩm không tồn tại'], 404);
        }

        $this->productService->updateProduct($id, $request);

        return response()->json([
            'message' => 'Sản phẩm đã được cập nhật thành công!'
        ]);
    }

    // Xóa sản phẩm
    public function deleteProduct($id)
    {
        $product = $this->productService->getProductId($id);

        if (!$product) {
            return response()->json(['error' => 'Sản phẩm không tồn tại'], 404);
        }

        $this->productService->deleteProduct($id);

        return response()->json([
            'message' => 'Sản phẩm đã được xóa thành công!'
        ]);
    }
}
