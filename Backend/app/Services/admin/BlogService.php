<?php
namespace App\Services\admin;

use App\Http\Requests\BlogRequest;
use App\Models\Blogs;

class BlogService {
    // Get all blog services
    public function getAllBlogs() {
        return Blogs::all();
    }
    // Get blog by ID service
    public function getBlogId($id) {
        return Blogs::find($id);
    }
    // Create blog service
    public function createBlog(BlogRequest $request) {
        $newBlog = Blogs::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
        ]);
        return $newBlog;
    }
    // Update blog service
    public function updateBlog($id, BlogRequest $request) {
        $blog = Blogs::findOrFail($id);
        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
        ]);
        return $blog;
    }
    // Delete blog service 
    public function deleteBlog($id) {
        $blog = Blogs::findOrFail($id);
        $blog->delete();
        return $blog;
    }
}
?>
