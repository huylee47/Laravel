<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Blog;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $jsonFilePath = "./database/seeders/data.json";
        $jsonContent = file_get_contents($jsonFilePath);
        $dataArray = json_decode($jsonContent, true);
        foreach($dataArray['account'] as $row){
            Account::create([
                "username" => $row["username"],
                "password"=> $row["password"],
                "role" => $row["role"],

            ]);
        }
        foreach($dataArray['product'] as $row){
            Product::create([
                "name" => $row["name"],
                "price"=> $row["price"]
            ]);
        }
        foreach($dataArray['blog'] as $row){
            Blog::create([
                "title" => $row["title"],
                "content"=> $row["content"],
                "author"=> $row["author"]
            ]);
        }
    }
    }
    

