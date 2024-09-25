<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Services\admin\Blogservice;
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
        return view('admin.blog.edit', compact('Blog'));
    }
    public function createBlogView(){
        return view('admin.blog.add');
    }
    public function createBlog(BlogRequest $request){
        $this->BlogService->createBlog($request);
        return redirect()->route('admin.Blog.index');
    }
    public function updateBlogView($id){
        $Blog = $this->BlogService->getblogId($id);
        return view('admin.blog.edit', compact('Blog'));
    }
    public function updateBlog($id, BlogRequest $request){
        $this->BlogService->updateBlog($id, $request);
        return redirect()->route('admin.Blog.index');


    }
    public function deleteBlog($id){
        $this->BlogService->deleteBlog($id);
        return redirect()->route('admin.Blog.index');

    }
}
