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

    // Lấy danh sách blog
    public function indexBlog()
    {
        $blogs = $this->blogService->getAllBlogs();
        return response()->json($blogs);  // Trả về JSON
    }

    // Hiển thị blog theo ID
    public function getBlogId($id)
    {
        $blog = $this->blogService->getBlogId($id);

        if (!$blog) {
            return response()->json(['error' => 'Blog không tồn tại'], 404);
        }

        return response()->json($blog);  // Trả về JSON
    }

    // Tạo blog mới
    public function createBlog(BlogRequest $request)
    {
        $this->blogService->createBlog($request);
        return response()->json([
            'message' => 'Blog đã được tạo thành công!'
        ], 201);  // Trả về JSON với mã 201 (Created)
    }

    // Cập nhật blog
    public function updateBlog($id, BlogRequest $request)
    {
        $blog = $this->blogService->getBlogId($id);

        if (!$blog) {
            return response()->json(['error' => 'Blog không tồn tại'], 404);
        }

        $this->blogService->updateBlog($id, $request);

        return response()->json([
            'message' => 'Blog đã được cập nhật thành công!'
        ]);
    }

    // Xóa blog
    public function deleteBlog($id)
    {
        $blog = $this->blogService->getBlogId($id);

        if (!$blog) {
            return response()->json(['error' => 'Blog không tồn tại'], 404);
        }

        $this->blogService->deleteBlog($id);

        return response()->json([
            'message' => 'Blog đã được xóa thành công!'
        ]);
    }
}
