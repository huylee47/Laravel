<?php
namespace App\Services\admin;

use App\Http\Requests\ProductRequest;
use App\Models\Products;

class ProductService {
    public function getAllProducts() {
        return Products::all();
    }

    public function getProductId($id) {
        return Products::find($id);
    }

    public function createProduct(ProductRequest $request) {
        $newProduct = Products::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);
        return $newProduct;
    }

    public function updateProduct($id, ProductRequest $request) {
        $product = Products::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);
        return $product;
    }

    public function deleteProduct($id) {
        $product = Products::findOrFail($id);
        $product->delete();
        return $product;
    }
}
?>
