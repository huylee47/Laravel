<?php
namespace App\Services;

use App\Http\Requests\BlogRequest;
use App\Models\Blogs;

class Blogservice{
    public function index(){
        $blogs = Blogs::all();
        return $blogs;
    }
    public function getblogId($id){
        return Blogs::where('id',$id)->first();
    }
    public function createblog(BlogRequest $request){
        Blogs::create([
            'title' =>$request->title,
            'content' =>$request->content,
            'author' =>$request->author,
        ]);
    }
    public function updateblog($id,BlogRequest $request){
        $blog = Blogs::find($id);
        $blog->title =$request->title;
        $blog->content = $request->content;
        $blog->author = $request->author;
        $blog->save();
    }
    public function deleteblog($id){
        $blog = Blogs::find($id);
        $blog->delete();
    }
}
?>