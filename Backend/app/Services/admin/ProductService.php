<?php
namespace App\Services\admin;

use App\Http\Requests\ProductRequest;
use App\Models\Products;

class ProductService {
    // get all products
    public function getAllProducts() {
        return Products::all();
    }
    // get product by id
    public function getProductId($id) {
        return Products::find($id);
    }
    // create new product
    public function createProduct(ProductRequest $request) {
        $newProduct = Products::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);
        return $newProduct;
    }
    // update product by id
    public function updateProduct($id, ProductRequest $request) {
        $product = Products::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);
        return $product;
    }
    // delete product by id
    public function deleteProduct($id) {
        $product = Products::findOrFail($id);
        $product->delete();
        return $product;
    }
}
?>
