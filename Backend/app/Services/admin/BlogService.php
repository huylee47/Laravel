<?php
namespace App\Services\admin;

use App\Http\Requests\BlogRequest;
use App\Models\Blogs;

class BlogService {
    public function getAllBlogs() {
        return Blogs::all();
    }

    public function getBlogId($id) {
        return Blogs::find($id);
    }

    public function createBlog(BlogRequest $request) {
        $newBlog = Blogs::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
        ]);
        return $newBlog;
    }

    public function updateBlog($id, BlogRequest $request) {
        $blog = Blogs::findOrFail($id);
        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
        ]);
        return $blog;
    }

    public function deleteBlog($id) {
        $blog = Blogs::findOrFail($id);
        $blog->delete();
        return $blog;
    }
}
?>
