<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Services\Blogservice;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    private $BlogService;
    
    public function __construct(Blogservice $BlogService)
    {
        $this->BlogService = $BlogService;
    }
    public function indexBlog(){
        $Blogs = $this->BlogService->getAllBlogs();
        return view('admin.Blog.index', compact('Blogs'));
    }
    public function getBlogId($id){
        $Blog = $this->BlogService->getblogId($id);
        return view('admin.Blog.show', compact('Blog'));
    }
    public function createBlog(BlogRequest $request){
        $this->BlogService->createBlog($request);
    }
    public function updateBlog($id, BlogRequest $request){
        $this->BlogService->updateBlog($id, $request);
    }
    public function deleteBlog($id){
        $this->BlogService->deleteBlog($id);
    }
}
