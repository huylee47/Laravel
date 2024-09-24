<?php
namespace App\Services;
use App\Models\Products;

class ProductService{
    public function index(){
        $product = Products::all();
        return $product;
    }
    public function getProductId($id){
        return Products::where('id',$id)->first();
    }
    public function createProduct($username,$password,$role){
        Products::create([
            'username' => $username,
            'password' => $password,
            'role' => $role,
        ]);
    }
    public function updateProduct($id,$username,$password,$role){
        $product = Products::find($id);
        $product->username = $username;
        $product->password = $password;
        $product->role = $role;
        $product->save();
    }
    public function deleteProduct($id){
        $product = Products::find($id);
        $product->delete();
    }
}
?>