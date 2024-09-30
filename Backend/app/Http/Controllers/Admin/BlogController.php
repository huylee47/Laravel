<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Services\admin\Blogservice;

class BlogController extends Controller
{
    private $blogService;

    public function __construct(Blogservice $blogService)
    {
        $this->blogService = $blogService;
    }
    // get all blog posts
    public function indexBlog()
    {
        $blogs = $this->blogService->getAllBlogs();
        return response()->json($blogs);
    }
    // get blog post by id
    public function getBlogId($id)
    {
        $blog = $this->blogService->getBlogId($id);

        if (!$blog) {
            return response()->json(['error' => 'Blog not found'], 404);
        }

        return response()->json($blog);
    }
    // create new blog post
    public function createBlog(BlogRequest $request)
    {
        $blog = $this->blogService->createBlog($request);
        return response()->json([
            'status' => 'successs!',
            'newBlog' => $blog,
        ], 201);
    }
    // update blog post by id
    public function updateBlog($id, BlogRequest $request)
    {
        $blog = $this->blogService->getBlogId($id);

        if (!$blog) {
            return response()->json(['error' => 'Blog not found'], 404);
        }

        $newBlog = $this->blogService->updateBlog($id, $request);

        return response()->json([
            'status' => 'success',
            'updatedBlog' => $newBlog,
        ]);
    }
    // delete blog post by id
    public function deleteBlog($id)
    {
        $blog = $this->blogService->getBlogId($id);

        if (!$blog) {
            return response()->json(['error' => 'Blog not found'], 404);
        }
        $this->blogService->deleteBlog($id);
        return response()->json([
            'status' => 'success!',
            'deletedBlog' => $blog,
        ]);
    }
}
