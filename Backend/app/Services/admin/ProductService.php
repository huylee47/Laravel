<?php
namespace App\Services\admin;

use App\Http\Requests\ProductRequest;
use App\Models\Products;

class ProductService{
    public function getAllProducts(){
        $product = Products::all();
        return $product;
    }
    public function getProductId($id){
        return Products::where('id',$id)->first();
    }
    public function createProduct(ProductRequest $request){
        Products::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);
    }
    public function updateProduct($id,ProductRequest $request){
        $product = Products::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
    }
    
    public function deleteProduct($id){
        $product = Products::find($id);
        $product->delete();
    }
}
?>