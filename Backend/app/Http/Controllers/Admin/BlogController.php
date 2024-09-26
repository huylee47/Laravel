<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Services\admin\Blogservice;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blogService;

    public function __construct(Blogservice $blogService)
    {
        $this->blogService = $blogService;
    }

    public function indexBlog()
    {
        $blogs = $this->blogService->getAllBlogs();
        return response()->json($blogs);  
    }

    public function getBlogId($id)
    {
        $blog = $this->blogService->getBlogId($id);

        if (!$blog) {
            return response()->json(['error' => 'Blog not found'], 404);
        }

        return response()->json($blog);
    }

    public function createBlog(BlogRequest $request)
    {
        $blog = $this->blogService->createBlog($request);
        return response()->json([
            'status' => 'successs!',
            'newBlog' => $blog,
        ], 201); 
    }

    public function updateBlog($id, BlogRequest $request)
    {
        $blog = $this->blogService->getBlogId($id);

        if (!$blog) {
            return response()->json(['error' => 'Blog not found'], 404);
        }

        $this->blogService->updateBlog($id, $request);

        return response()->json([
            'status' => 'success',
            'updatedBlog' => $blog,
        ]);
    }

    public function deleteBlog($id)
    {
        $blog = $this->blogService->getBlogId($id);

        if (!$blog) {
            return response()->json(['error' => 'Blog not found'], 404);
        }

        $this->blogService->deleteBlog($id);

        return response()->json([
            'status' => 'success!',
            'deletedBlog' => $blog ,
        ]);
    }
}
