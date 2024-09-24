<?php
namespace App\Services\admin;

use App\Http\Requests\BlogRequest;
use App\Models\Blogs;

class Blogservice{
    public function getAllBlogs(){
        $blogs = Blogs::all();
        return $blogs;
    }
    public function getBlogId($id){
        return Blogs::where('id',$id)->first();
    }
    public function createBlog(BlogRequest $request){
        Blogs::create([
            'title' =>$request->title,
            'content' =>$request->content,
            'author' =>$request->author,
        ]);
    }
    public function updateBlog($id,BlogRequest $request){
        $blog = Blogs::find($id);
        $blog->title =$request->title;
        $blog->content = $request->content;
        $blog->author = $request->author;
        $blog->save();
    }
    public function deleteBlog($id){
        $blog = Blogs::find($id);
        $blog->delete();
    }
}
?>