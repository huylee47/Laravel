<?php

namespace Database\Seeders;

use App\Models\Accounts;
use App\Models\Blogs;
use App\Models\Products;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        foreach($dataArray['accounts'] as $row){
            Accounts::create([
                "username" => $row["username"],
                "password"=> Hash::make($row["password"]),
                "role" => $row["role"],

            ]);
        }
        foreach($dataArray['products'] as $row){
            Products::create([
                "name" => $row["name"],
                "price"=> $row["price"]
            ]);
        }
        foreach($dataArray['blogs'] as $row){
            Blogs::create([
                "title" => $row["title"],
                "content"=> $row["content"],
                "author"=> $row["author"]
            ]);
        }
    }
    }
    

