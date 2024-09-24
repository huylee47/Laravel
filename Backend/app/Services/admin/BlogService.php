<?php
namespace App\Services;
use App\Models\Blogs;

class Blogservice{
    public function index(){
        $blogs = Blogs::all();
        return $blogs;
    }
    public function getblogId($id){
        return Blogs::where('id',$id)->first();
    }
    public function createblog($title,$content,$author){
        Blogs::create([
            'title' => $title,
            'content' => $content,
            'author' => $author,
        ]);
    }
    public function updateblog($id,$title,$content,$author){
        $blog = Blogs::find($id);
        $blog->title = $title;
        $blog->content = $content;
        $blog->author = $author;
        $blog->save();
    }
    public function deleteblog($id){
        $blog = Blogs::find($id);
        $blog->delete();
    }
}
?>