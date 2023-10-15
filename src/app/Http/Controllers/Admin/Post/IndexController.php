<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\View\View;

class IndexController extends BaseController
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $posts = Post::where('published', 1)->paginate(15);
        return view('admin.post.index', compact('posts'));
    }
}
